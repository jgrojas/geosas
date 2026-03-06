# Despliegue con Docker - Geo Creaciones en Madera

## Requisitos
- Docker y Docker Compose instalados en el servidor

## Pasos para subir al servidor

### 1. Subir los archivos
Copia todo el proyecto al servidor (por Git, FTP, etc.).

### 2. Configurar variables de entorno
Crea o edita el archivo `.env` en el servidor:

```env
APP_NAME="Geo Creaciones en Madera"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://tudominio.com
APP_KEY=base64:tu_clave_generada

# Geo Creaciones
GEO_WHATSAPP_NUMBER=573026948132
GEO_WHATSAPP_MESSAGE="Hola, me gustaría consultar sobre sus servicios de corte láser en MDF."
GEO_ADDRESS="Cra 16 52-26, Bogotá, Colombia - Sector Galerías"
GEO_EMAIL=geosasbogota@gmail.com

DB_CONNECTION=sqlite
SESSION_DRIVER=file
CACHE_STORE=file
QUEUE_CONNECTION=sync
```

Genera la clave con: `php artisan key:generate --show`

### 3. Construir y ejecutar
```bash
docker compose build --no-cache
docker compose up -d
```

La app estará en **http://localhost:80** (o el puerto que configures).

### 4. Para producción con dominio
- Configura un proxy inverso (Nginx o Caddy) que apunte al puerto 80 del contenedor
- O cambia el puerto en `docker-compose.yml`: `"8080:80"` si el 80 está ocupado

## Comandos útiles
```bash
# Ver logs
docker compose logs -f

# Detener
docker compose down

# Reconstruir después de cambios
docker compose build --no-cache && docker compose up -d
```
