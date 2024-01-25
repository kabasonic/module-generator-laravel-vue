# Laravel application
FROM webdevops/php-nginx:8.1-alpine as application

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ENV WEB_DOCUMENT_ROOT /app/public
ENV APP_ENV production
WORKDIR /app
COPY ./ ./

RUN composer install --no-interaction --optimize-autoloader --no-dev
RUN php artisan key:generate
# Optimizing Configuration loading
RUN php artisan config:cache
# Optimizing Route loading
RUN php artisan route:cache
# Optimizing View loading
RUN php artisan view:cache

# Build assets
FROM node:18-alpine as frontend
RUN mkdir -p /app
WORKDIR /app
COPY ./ ./

COPY --from=application /app/vendor ./vendor

RUN npm install -g npm@latest && \
    npm install --no-progress && \
    npm run build --no-progress

# Production image
FROM application as production
COPY --from=frontend /app/public ./public
RUN chown -R application:application .

