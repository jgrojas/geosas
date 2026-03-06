# ============================================
# Stage 1: Build frontend assets
# ============================================
FROM node:20-alpine AS frontend

WORKDIR /app

COPY package.json package-lock.json* ./
RUN npm ci

COPY vite.config.js ./
COPY resources ./resources
COPY public ./public

RUN npm run build

# ============================================
# Stage 2: PHP + Nginx application
# ============================================
FROM php:8.2-fpm-alpine

# Instalar nginx y supervisord
RUN apk add --no-cache \
    nginx \
    supervisor \
    libpng-dev \
    libzip-dev \
    sqlite-dev \
    icu-dev \
    oniguruma-dev \
    linux-headers \
    $PHPIZE_DEPS

# Extensiones PHP
RUN docker-php-ext-install \
    pdo_sqlite \
    zip \
    exif \
    pcntl \
    bcmath \
    intl

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copiar composer
COPY composer.json composer.lock* ./

# Instalar dependencias (sin dev para producción)
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist

# Copiar código de la aplicación
COPY . .

# Copiar assets compilados desde stage 1
COPY --from=frontend /app/public/build ./public/build

# Completar autoload
RUN composer dump-autoload --optimize

# Configuración Nginx (reemplazar main config para evitar conflicto en Alpine)
COPY docker/nginx.conf /etc/nginx/nginx.conf
RUN mkdir -p /run/nginx /var/log/nginx

# Supervisord
COPY docker/supervisord.conf /etc/supervisord.conf

# Entrypoint (convertir CRLF a LF para Windows)
COPY docker/entrypoint.sh /entrypoint.sh
RUN sed -i 's/\r$//' /entrypoint.sh && chmod +x /entrypoint.sh
ENTRYPOINT ["/entrypoint.sh"]

# Permisos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache \
    && mkdir -p /var/www/html/database && chown www-data:www-data /var/www/html/database

EXPOSE 80

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
