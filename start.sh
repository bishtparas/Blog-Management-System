#!/bin/bash

# Cache configurations
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Ensure SQLite database exists (fallback)
touch database/database.sqlite

# Run database migrations and seeders
php artisan migrate --force
php artisan db:seed --force

# Fix permissions for SQLite database so Apache can read/write to it
chown -R www-data:www-data /var/www/html/database

# Start Apache in foreground
apache2-foreground
