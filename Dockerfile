# Koristi PHP slike
FROM php:8.2-fpm

# Instaliraj potrebne zavisnosti
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Instaliraj PHP ekstenzije
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Postavi radni direktorijum
WORKDIR /var/www/html

# Kopiraj Laravel fajlove
COPY . .

# Postavi dozvole
RUN chown -R www-data:www-data /var/www/html/storage
RUN chown -R www-data:www-data /var/www/html/bootstrap/cache

# Instaliraj Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instaliraj zavisnosti preko Composera
RUN composer install

# Pokreni Laravel aplikaciju
CMD php artisan serve --host=0.0.0.0 --port=8000
