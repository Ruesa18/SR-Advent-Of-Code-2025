FROM whatwedo/nginx-php:v2.9 AS base

WORKDIR /var/www

########################################################################################################################
# Development stage (depencencies and configuration used in development only)
FROM base AS dev

ARG DDE_UID
ARG DDE_GID

# Install dde development depencencies
# .dde/configure-image.sh will be created automatically
COPY .dde/configure-image.sh /tmp/dde-configure-image.sh
RUN /tmp/dde-configure-image.sh

RUN apk add --no-cache bash make php$PHP_VERSION\-pecl-xdebug php$PHP_VERSION\-pecl-pcov

########################################################################################################################
# Production stage (depencencies and configuration used in production only)
FROM base AS prod

ADD . /var/www
