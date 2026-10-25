FROM shinsenter/php:8.5-fpm-nginx-alpine

# La imagen configura PHP con variables PHP_* (un .ini propio quedaria por debajo del suyo).
# La web original es ISO-8859-1
ENV PHP_DEFAULT_CHARSET=ISO-8859-1 \
    PHP_DATE_TIMEZONE=Europe/Madrid \
    PHP_SHORT_OPEN_TAG=0 \
    DOCUMENT_ROOT=public \
    DISABLE_GREETING=1 \
    # El codigo se queda de root: PHP solo escribe en /var/www/data
    DISABLE_AUTORUN_FIX_OWNER_GROUP=1

COPY docker/nginx.conf /etc/nginx/sites-enabled/00-default.conf

# public/ es la raiz web; secciones/ e includes/ quedan fuera de ella
COPY includes/ /var/www/html/includes/
COPY secciones/ /var/www/html/secciones/
COPY public/ /var/www/html/public/

# Datos persistentes (contadores de visitas).
# En Coolify: Persistent Storage -> volumen montado en /var/www/data
ENV CC_DATOS=/var/www/data
RUN mkdir -p /var/www/data && chown -R www-data:www-data /var/www/data \
    && printf '#!/bin/sh\nchown -R www-data:www-data /var/www/data\n' > /startup/10-datos \
    && chmod +x /startup/10-datos

EXPOSE 80
