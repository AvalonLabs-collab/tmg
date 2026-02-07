#!/bin/sh

# Exit on error
set -e

echo "🚀 Starting YMG Auto Application..."

# Run database migrations
echo "📦 Running database migrations..."
php artisan migrate --force

# Cache configuration
echo "💾 Caching configuration..."
php artisan config:cache

# Cache routes
echo "🛣️  Caching routes..."
php artisan route:cache

# Cache views
echo "👁️  Caching views..."
php artisan view:cache

# Create storage link
echo "🔗 Creating storage link..."
php artisan storage:link

# Start the application
echo "✨ Starting Laravel application on port ${PORT:-8000}..."
php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
