# Imagen base PHP-FPM
FROM php:8.2-fpm

# -------------------------------------------------------------------
# 1. Dependencias del sistema
# -------------------------------------------------------------------
RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    zip \
    sudo \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    && rm -rf /var/lib/apt/lists/*

# -------------------------------------------------------------------
# 2. Extensiones PHP necesarias para Laravel
# -------------------------------------------------------------------
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        pdo_mysql \
        mbstring \
        exif \
        pcntl \
        bcmath \
        gd \
        zip

# -------------------------------------------------------------------
# 3. Instalar Node.js LTS
# -------------------------------------------------------------------
RUN curl -fsSL https://deb.nodesource.com/setup_lts.x | bash - \
    && apt-get install -y nodejs \
    && rm -rf /var/lib/apt/lists/*

# -------------------------------------------------------------------
# 4. Instalar Composer
# -------------------------------------------------------------------
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# -------------------------------------------------------------------
# 5. Crear usuario "vscode" y corregir permisos
# -------------------------------------------------------------------
RUN useradd -ms /bin/bash vscode \
    && usermod -aG www-data vscode \
    && usermod -aG sudo vscode || true \
    && chown -R vscode:www-data /var/www

# -------------------------------------------------------------------
# 6. Directorio de trabajo
# -------------------------------------------------------------------
WORKDIR /var/www

# -------------------------------------------------------------------
# 7. Cambiar a usuario vscode
# -------------------------------------------------------------------
USER vscode
