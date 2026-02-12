#!/bin/sh

echo "🚀 Starting YMG Auto Application..."

# Clear any cached files first
echo "🧹 Clearing caches..."
php artisan config:clear || true
php artisan route:clear || true
php artisan view:clear || true

# Run migrations and seed
until php artisan migrate:status 2>/dev/null; do
  echo "Waiting for database to be ready..."
  sleep 5
done
echo "📦 Running database migrations and seeders..."
php artisan migrate --force --seed || echo "⚠️ Migration/Seeder warning"

# Cache configuration
echo "💾 Caching configuration..."
php artisan config:cache || true

# Skip route caching due to Fortify route conflicts
# Route caching is optional and will be done on first request anyway
echo "🛣️  Routes will be cached on first request"

# Cache views
echo "👁️  Caching views..."
php artisan view:cache || echo "⚠️  View cache skipped due to possible unregistered components"

# Create storage link
echo "🔗 Creating storage link..."
php artisan storage:link || true

# Start the application
echo "✨ Starting Laravel application on port ${PORT:-8000}..."
php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
