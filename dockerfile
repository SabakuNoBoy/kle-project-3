# Güncel PHP FPM image
FROM php:8.4-fpm

# Sistem paketleri ve gerekli extensionlar
RUN apt-get update && apt-get install -y \
    unzip zip libzip-dev git curl \
    && docker-php-ext-install pdo_mysql

# Composer yükle
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Çalışma dizini
WORKDIR /var/www/html

# Proje dosyalarını kopyala
COPY . /var/www/html

# Laravel’i başlat
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
FROM php:8.4-fpm

# Sistemi güncelle ve gerekli paketleri kur
RUN apt-get update && apt-get install -y \
    unzip zip libzip-dev git curl libonig-dev \
    && docker-php-ext-install pdo_mysql mbstring zip

# Composer kur
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Çalışma dizini
WORKDIR /var/www/html

# Proje dosyalarını kopyala
COPY . /var/www/html
