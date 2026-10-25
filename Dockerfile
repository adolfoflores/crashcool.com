FROM php:8.3-apache

# GD para el codigo de seguridad del registro del torneo
RUN apt-get update \
    && apt-get install -y --no-install-recommends libpng-dev \
    && docker-php-ext-install gd \
    && rm -rf /var/lib/apt/lists/* \
    && a2enmod speling headers

COPY docker/php.ini /usr/local/etc/php/conf.d/crashcool.ini
COPY docker/apache.conf /etc/apache2/conf-enabled/crashcool.conf

# public/ es la raiz web; secciones/ e includes/ quedan fuera de ella
COPY includes/ /var/www/includes/
COPY secciones/ /var/www/secciones/
COPY public/ /var/www/html/

# Datos persistentes (contadores de visitas).
# En Coolify: Persistent Storage -> volumen montado en /var/www/data
ENV CC_DATOS=/var/www/data
RUN mkdir -p /var/www/data && chown -R www-data:www-data /var/www/data

EXPOSE 80
CMD ["sh", "-c", "chown -R www-data:www-data /var/www/data && exec apache2-foreground"]
