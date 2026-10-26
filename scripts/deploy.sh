#!/usr/bin/env bash
#
# Despliegue Geo Creaciones (Docker)
# Uso: ./scripts/deploy.sh
#
set -euo pipefail

ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
cd "$ROOT"

COMPOSE="${COMPOSE:-docker compose}"
SERVICE="${SERVICE:-app}"
CONTAINER="${CONTAINER:-geosas-app}"

# Puerto publicado (por defecto 8080, ver docker-compose.yml)
APP_PORT="${APP_PORT:-8080}"
APP_URL="${APP_URL:-http://127.0.0.1:${APP_PORT}}"
HEALTH_URL="${HEALTH_URL:-${APP_URL}/up}"
HOME_URL="${HOME_URL:-${APP_URL}/}"

MAINTENANCE_RENDER="${MAINTENANCE_RENDER:-errors.503}"
MAX_HEALTH_ATTEMPTS="${MAX_HEALTH_ATTEMPTS:-30}"
HEALTH_SLEEP="${HEALTH_SLEEP:-2}"

log() { printf '\n→ %s\n' "$*"; }
warn() { printf '\n⚠ %s\n' "$*" >&2; }

run_artisan() {
    if $COMPOSE ps --status running "$SERVICE" 2>/dev/null | grep -q "$SERVICE"; then
        $COMPOSE exec -T "$SERVICE" php artisan "$@"
    else
        warn "Contenedor no en ejecución; se omite: php artisan $*"
        return 1
    fi
}

maintenance_on() {
    log "Activar modo mantenimiento"
    local args=(down --retry=60 --refresh=15 --secret="${DEPLOY_SECRET:-geosas-deploy}")

    if $COMPOSE ps --status running "$SERVICE" 2>/dev/null | grep -q "$SERVICE"; then
        if $COMPOSE exec -T "$SERVICE" test -f /var/www/html/resources/views/errors/503.blade.php 2>/dev/null; then
            args+=(--render="$MAINTENANCE_RENDER")
        else
            warn "Vista ${MAINTENANCE_RENDER} no está en la imagen actual; se usa pantalla de mantenimiento por defecto"
        fi
    fi

    run_artisan "${args[@]}" || warn "No se pudo activar mantenimiento (¿primer despliegue?)"
}

maintenance_off() {
    log "Desactivar modo mantenimiento"
    run_artisan up || warn "artisan up falló; revisa el contenedor"
}

wait_for_health() {
    log "Comprobar salud en ${HEALTH_URL}"
    local i=1
    while [ "$i" -le "$MAX_HEALTH_ATTEMPTS" ]; do
        if curl -sf --max-time 5 "$HEALTH_URL" >/dev/null 2>&1; then
            log "Health OK (intento ${i})"
            return 0
        fi
        sleep "$HEALTH_SLEEP"
        i=$((i + 1))
    done
    warn "Health check no respondió a tiempo"
    return 1
}

log "Inicio despliegue en ${ROOT}"

if [ -d .git ] && command -v git >/dev/null 2>&1; then
    log "Actualizar código (git pull)"
    git pull --ff-only || warn "git pull falló; continúo con el código local"
fi

maintenance_on || true

log "Construir imagen (PHP parcheado + assets)"
$COMPOSE build --no-cache

log "Levantar contenedor"
$COMPOSE up -d

wait_for_health || true

log "Optimizar cachés Laravel"
run_artisan config:cache 2>/dev/null || true
run_artisan view:cache 2>/dev/null || true

maintenance_off

log "Comprobar página principal"
if curl -sf --max-time 10 -o /dev/null -w "HTTP %{http_code}\n" "$HOME_URL"; then
    log "Despliegue completado: ${HOME_URL}"
else
    warn "La home no respondió como se esperaba; revisa: $COMPOSE logs -f"
    exit 1
fi

log "Versión PHP en contenedor (debe ser >= 8.2.35 por PHP2Shell):"
$COMPOSE exec -T "$SERVICE" php -v 2>/dev/null | head -1 || true
