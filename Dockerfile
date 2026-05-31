# Stage 0: PHP + Composer
FROM php:8.2-fpm

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    unzip \
    git \
    zip \
    curl \
    libpq-dev \
    zlib1g-dev \
    pkg-config \
    libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip pdo pdo_pgsql

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set workdir
WORKDIR /app

# Copiar proyecto
COPY . /app

# Instalar dependencias de PHP sin ejecutar scripts que dependan de DB
RUN composer install --no-dev --optimize-autoloader --no-scripts --no-interaction


# Configurar permisos
RUN chown -R www-data:www-data /app \
    && chmod -R 755 /app/storage /app/bootstrap/cache

# Exponer puerto
EXPOSE 8000

# Ejecutar Laravel
#CMD ["php-fpm"]
#CMD php artisan serve --host=0.0.0.0 --port=${PORT:-8000}

# Comando por defecto: limpiar cache, migrar y levantar servidor
CMD php artisan config:clear && \
    php artisan route:clear && \
    php artisan view:clear && \
    php artisan cache:clear && \
    php artisan config:cache && \
    #php artisan migrate:fresh --seed --force && \
    php artisan migrate --force && \
    php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
