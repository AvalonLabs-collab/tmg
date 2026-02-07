#!/usr/bin/env bash

# YMG Auto - Quick Setup Script
# This script helps you prepare for Railway deployment

echo "🚀 YMG Auto - Deployment Preparation Script"
echo "=============================================="
echo ""

# Step 1: Generate APP_KEY if not exists
if [ -z "$APP_KEY" ] && ! grep -q "^APP_KEY=base64:" .env .env.production 2>/dev/null; then
    echo "📝 Generating APP_KEY..."
    APP_KEY=$(php artisan key:generate --show)
    echo "APP_KEY=$APP_KEY"
    echo ""
    echo "⚠️  Add this to your Railway environment variables:"
    echo "APP_KEY=$APP_KEY"
fi

# Step 2: Check Laravel setup
echo "✓ Checking Laravel setup..."
if [ ! -f ".env" ]; then
    cp .env.example .env
    echo "✓ Created .env file from .env.example"
fi

# Step 3: Install dependencies
echo ""
echo "📦 Installing PHP dependencies..."
composer install --no-dev --optimize-autoloader

echo ""
echo "📦 Installing Node dependencies..."
npm install

# Step 4: Build assets
echo ""
echo "🔨 Building frontend assets..."
npm run build

# Step 5: Git check
echo ""
echo "📝 Checking Git status..."
if ! git rev-parse --git-dir > /dev/null 2>&1; then
    echo "⚠️  Not a Git repository. Initialize with: git init"
else
    echo "✓ Git repository found"
    echo ""
    echo "📤 Ready to push to GitHub:"
    echo "   git add ."
    echo "   git commit -m 'Prepare for Railway deployment'"
    echo "   git push origin main"
fi

echo ""
echo "✨ Setup complete!"
echo ""
echo "Next steps:"
echo "1. Generate APP_KEY: php artisan key:generate --show"
echo "2. Push to GitHub: git push origin main"
echo "3. Connect to Railway: https://railway.app"
echo "4. Set environment variables from .env.production"
echo "5. Railway will auto-deploy on push!"
echo ""
echo "📖 See RAILWAY_DEPLOYMENT.md for detailed instructions"
