# Despliegue con Docker - Geo Creaciones en Madera

## Requisitos
- Docker y Docker Compose
- Bash (Git Bash / WSL / Linux) para `./scripts/deploy.sh`

## Despliegue automático (recomendado)

```bash
chmod +x scripts/deploy.sh   # solo la primera vez en Linux/macOS
./scripts/deploy.sh
```

El script:
1. Activa **modo mantenimiento** (`artisan down` → vista `errors/503`)
2. Reconstruye la imagen (**PHP 8.2.35+** parcheado + assets Vite)
3. Levanta el contenedor
4. Comprueba `/up` y la página principal
5. Desactiva mantenimiento (`artisan up`)

Variables opcionales:

| Variable | Default | Descripción |
|----------|---------|-------------|
| `APP_PORT` | `8080` | Puerto mapeado en `docker-compose.yml` |
| `APP_URL` | `http://127.0.0.1:8080` | URL base para health check |
| `DEPLOY_SECRET` | `geosas-deploy` | Bypass mantenimiento: `/?deploy-secret=...` |

## Páginas de error y mantenimiento

| Archivo | Uso |
|---------|-----|
| `resources/views/errors/503.blade.php` | Mantenimiento Laravel |
| `resources/views/errors/404.blade.php` | No encontrado |
| `resources/views/errors/500.blade.php` | Error del servidor |
| `public/maintenance.html` | HTML estático (proxy del host si el contenedor está caído) |

Activar mantenimiento manualmente:

```bash
docker compose exec app php artisan down --render=errors.503 --retry=60
docker compose exec app php artisan up
```

## Verificar PHP (PHP2Shell)

```bash
docker compose exec app php -v
```

Debe ser **8.2.35** o superior en la rama 8.2.

## `.env` en producción

```env
APP_NAME="Geo Creaciones en Madera"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://tudominio.com
APP_KEY=base64:...

GEO_WHATSAPP_NUMBER=573026948132
GEO_ADDRESS="Cra 16 52-26, Bogotá, Colombia - Sector Galerías"
GEO_EMAIL=geosasbogota@gmail.com

# GA4 (visitas y clics a WhatsApp). Vacío en local.
GOOGLE_ANALYTICS_ID=G-XXXXXXXXXX

DB_CONNECTION=sqlite
SESSION_DRIVER=file
CACHE_STORE=file
QUEUE_CONNECTION=sync
```

## Comandos útiles

```bash
docker compose logs -f
docker compose down
docker compose build --no-cache && docker compose up -d
```

## Mantenimiento en el proxy (opcional)

Si delante del contenedor hay Nginx/Caddy, puedes servir `public/maintenance.html` cuando el upstream no responda durante el rebuild.
