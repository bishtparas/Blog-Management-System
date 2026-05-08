#!/bin/bash

# Cache configurations
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run database migrations and seeders
php artisan migrate --force
php artisan db:seed --force

# Start Apache in foreground
apache2-foreground
