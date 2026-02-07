#!/bin/sh

echo "🚀 Starting YMG Auto Application..."

# Clear any cached files first
echo "🧹 Clearing caches..."
php artisan config:clear || true
php artisan route:clear || true
php artisan view:clear || true

# Run database migrations (don't fail on migration errors yet)
echo "📦 Running database migrations..."
php artisan migrate --force || echo "⚠️  Migration warning (may be expected on first run)"

# Cache configuration
echo "💾 Caching configuration..."
php artisan config:cache || true

# Cache routes
echo "🛣️  Caching routes..."
php artisan route:cache || true

# Cache views
echo "👁️  Caching views..."
php artisan view:cache || true

# Create storage link
echo "🔗 Creating storage link..."
php artisan storage:link || true

# Start the application
echo "✨ Starting Laravel application on port ${PORT:-8000}..."
php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
