#!/bin/sh
set -e

cd /var/www/html

# Crear SQLite si no existe
if [ "$DB_CONNECTION" = "sqlite" ] || [ -z "$DB_CONNECTION" ]; then
    touch database/database.sqlite 2>/dev/null || true
    php artisan migrate --force 2>/dev/null || true
fi

# Optimizar Laravel para producción
php artisan config:cache
php artisan route:cache
php artisan view:cache

exec "$@"
