FROM php:8.2-apache

# Install system dependencies required by GD, zip, mbstring, intl, xml
RUN apt-get update && apt-get install -y --no-install-recommends \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libwebp-dev \
    libzip-dev \
    libicu-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install -j$(nproc) mysqli pdo pdo_mysql gd mbstring zip intl xml \
    && rm -rf /var/lib/apt/lists/*

# Enable Apache mod_rewrite and mod_headers
RUN a2enmod rewrite headers

# Configure Apache AllowOverride All for .htaccess
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Configure PHP runtime limits and error handling for production
RUN { \
    echo 'display_errors = Off'; \
    echo 'log_errors = On'; \
    echo 'memory_limit = 256M'; \
    echo 'upload_max_filesize = 256M'; \
    echo 'post_max_size = 260M'; \
    echo 'max_execution_time = 60'; \
    echo 'session.save_path = "/tmp"'; \
} > /usr/local/etc/php/conf.d/techcms.ini

WORKDIR /var/www/html

# Copy project files
COPY . /var/www/html/

# Remove cPanel-specific PHP 7.4 handler from .htaccess inside container so mod_php handles .php
RUN if [ -f /var/www/html/.htaccess ]; then \
        sed -i '/ea-php74/d' /var/www/html/.htaccess; \
    fi

# Ensure writable directories for filemanagerx uploads and thumbnails
RUN mkdir -p /var/www/html/uploads /var/www/html/thumbs \
    && chown -R www-data:www-data /var/www/html/uploads /var/www/html/thumbs \
    && chmod -R 775 /var/www/html/uploads /var/www/html/thumbs

EXPOSE 80

# Support Render dynamic PORT environment variable while defaulting to 80
CMD ["sh", "-c", "PORT=${PORT:-80}; sed -i \"s/Listen 80/Listen ${PORT}/g\" /etc/apache2/ports.conf && sed -i \"s/<VirtualHost \\*:80>/<VirtualHost *:${PORT}>/g\" /etc/apache2/sites-available/000-default.conf && exec apache2-foreground"]
