ARG PHP_VERSION=7.4
FROM php:${PHP_VERSION}-cli

RUN docker-php-ext-install bcmath
RUN apt update && apt install -y libicu-dev && docker-php-ext-install intl

ARG COVERAGE
RUN if [ "$COVERAGE" = "pcov" ]; then pecl install pcov && docker-php-ext-enable pcov; fi

RUN apt update && apt install -y git zip
COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /app
RUN git config --global --add safe.directory /app
