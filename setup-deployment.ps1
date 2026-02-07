# YMG Auto - Deployment Setup Script for Windows PowerShell
# Run this script to prepare your application for Railway deployment

Write-Host "🚀 YMG Auto - Deployment Preparation Script" -ForegroundColor Green
Write-Host "=============================================" -ForegroundColor Green
Write-Host ""

# Check if PHP is installed
$phpCheck = Get-Command php -ErrorAction SilentlyContinue
if (-not $phpCheck) {
    Write-Host "❌ PHP is not installed or not in PATH" -ForegroundColor Red
    Write-Host "Please install PHP and add it to your PATH" -ForegroundColor Yellow
    exit 1
}

Write-Host "✓ PHP found: $(php --version | Select-Object -First 1)" -ForegroundColor Green
Write-Host ""

# Check if Composer is installed
$composerCheck = Get-Command composer -ErrorAction SilentlyContinue
if (-not $composerCheck) {
    Write-Host "❌ Composer is not installed" -ForegroundColor Red
    Write-Host "Download from: https://getcomposer.org/download/" -ForegroundColor Yellow
    exit 1
}

Write-Host "✓ Composer found" -ForegroundColor Green
Write-Host ""

# Step 1: Generate APP_KEY
Write-Host "📝 Generating APP_KEY..." -ForegroundColor Blue
if (-not (Test-Path ".env")) {
    Copy-Item ".env.example" -Destination ".env"
    Write-Host "✓ Created .env file" -ForegroundColor Green
}

# Generate the key
$appKey = (php artisan key:generate --show)
Write-Host "✓ APP_KEY generated" -ForegroundColor Green
Write-Host ""
Write-Host "⚠️  Add this APP_KEY to Railway environment variables:" -ForegroundColor Yellow
Write-Host $appKey -ForegroundColor Cyan
Write-Host ""

# Step 2: Install PHP dependencies
Write-Host "📦 Installing PHP dependencies..." -ForegroundColor Blue
composer install --no-dev --optimize-autoloader
if ($LASTEXITCODE -ne 0) {
    Write-Host "❌ Composer install failed" -ForegroundColor Red
    exit 1
}
Write-Host "✓ PHP dependencies installed" -ForegroundColor Green
Write-Host ""

# Step 3: Check for Node.js
$nodeCheck = Get-Command node -ErrorAction SilentlyContinue
if (-not $nodeCheck) {
    Write-Host "⚠️  Node.js is not installed" -ForegroundColor Yellow
    Write-Host "Download from: https://nodejs.org/" -ForegroundColor Yellow
    Write-Host "Skipping npm setup..." -ForegroundColor Yellow
} else {
    Write-Host "✓ Node.js found: $(node --version)" -ForegroundColor Green

    # Step 4: Install Node dependencies
    Write-Host "📦 Installing Node dependencies..." -ForegroundColor Blue
    npm install
    Write-Host "✓ Node dependencies installed" -ForegroundColor Green
    Write-Host ""

    # Step 5: Build assets
    Write-Host "🔨 Building frontend assets..." -ForegroundColor Blue
    npm run build
    if ($LASTEXITCODE -ne 0) {
        Write-Host "⚠️  Asset build failed, but continuing..." -ForegroundColor Yellow
    } else {
        Write-Host "✓ Assets built successfully" -ForegroundColor Green
    }
    Write-Host ""
}

# Step 6: Check Git
if ((Get-Command git -ErrorAction SilentlyContinue) -and (Test-Path ".git")) {
    Write-Host "✓ Git repository found" -ForegroundColor Green
    Write-Host ""
    Write-Host "📤 Ready to push to GitHub:" -ForegroundColor Blue
    Write-Host "   git add ." -ForegroundColor Cyan
    Write-Host "   git commit -m 'Prepare for Railway deployment'" -ForegroundColor Cyan
    Write-Host "   git push origin main" -ForegroundColor Cyan
} else {
    Write-Host "⚠️  Git repository not found" -ForegroundColor Yellow
    Write-Host "Initialize with: git init" -ForegroundColor Yellow
}

Write-Host ""
Write-Host "✨ Setup complete!" -ForegroundColor Green
Write-Host ""
Write-Host "📋 Next Steps:" -ForegroundColor Blue
Write-Host "1. Copy the APP_KEY above and save it" -ForegroundColor White
Write-Host "2. Push to GitHub:" -ForegroundColor White
Write-Host "   git add ." -ForegroundColor Cyan
Write-Host "   git commit -m 'Docker and deployment setup'" -ForegroundColor Cyan
Write-Host "   git push origin main" -ForegroundColor Cyan
Write-Host "3. Go to https://railway.app and create new project" -ForegroundColor White
Write-Host "4. Connect your GitHub repository" -ForegroundColor White
Write-Host "5. Add environment variables from .env.production" -ForegroundColor White
Write-Host "6. Railway will auto-deploy!" -ForegroundColor White
Write-Host ""
Write-Host "📖 See RAILWAY_DEPLOYMENT.md for detailed instructions" -ForegroundColor Blue
