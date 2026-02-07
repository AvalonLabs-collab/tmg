# YMG Auto - Railway Deployment Guide

## Prerequisites
- GitHub account with this repository pushed
- Railway account (https://railway.app)
- Docker installed (for local testing)

## Local Testing with Docker Compose

### 1. Create a `.env` file for local development:
```bash
cp .env.example .env
php artisan key:generate
```

### 2. Run with Docker Compose:
```bash
docker compose up --build
```

Your app will be available at: `http://localhost:8000`

### 3. Access the application:
- Navigate to `http://localhost:8000`
- Run migrations: `docker compose exec app php artisan migrate`
- Access tinker: `docker compose exec app php artisan tinker`

## Railway Deployment

### Step 1: Push to GitHub
```bash
git add .
git commit -m "Docker setup for Railway deployment"
git push origin main
```

### Step 2: Create Railway Project
1. Go to https://railway.app
2. Click "New Project"
3. Select "Deploy from GitHub"
4. Authorize GitHub and select this repository

### Step 3: Configure Environment Variables in Railway
In Railway Dashboard → Variables, add:

```
APP_NAME=YMG Auto
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:xxxxx (run `php artisan key:generate --show` locally first)
APP_URL=https://your-railway-domain.railway.app
LOG_CHANNEL=stderr
DB_CONNECTION=sqlite
```

**Optional: Add MySQL Database**
1. Click "+ Add" in Railway Dashboard
2. Select "MySQL"
3. Railway will auto-populate DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD
4. Update `DB_CONNECTION=mysql` in variables

### Step 4: Deploy
1. Railway will auto-deploy on GitHub push
2. Watch the deployment logs in Railway Dashboard
3. Once "Success" appears, your app is live!

## Environment Variables for Railway

| Variable | Value | Notes |
|----------|-------|-------|
| `APP_ENV` | production | Set to production |
| `APP_DEBUG` | false | Never debug in production |
| `LOG_CHANNEL` | stderr | Railway recommends stderr |
| `DB_CONNECTION` | sqlite | Or mysql if using Railway MySQL |
| `CACHE_DRIVER` | file | File-based caching |
| `QUEUE_CONNECTION` | sync | Synchronous queue |
| `SESSION_DRIVER` | file | File-based sessions |

## Troubleshooting

### App crashes on deploy
- Check Railway logs: Dashboard → Deployment → Logs
- Ensure `APP_KEY` is set correctly
- Verify all required environment variables are present

### Database errors
- For SQLite: Ensure storage directory is writable
- For MySQL: Verify DB credentials match Railway's MySQL service
- Run migrations manually: Check build logs

### Build fails
- Clear Railway cache: Settings → Redeploy without cache
- Check Docker build logs
- Ensure `composer.lock` and `package-lock.json` are committed

## Useful Rails Commands

```bash
# View logs
railway logs

# Run artisan commands
railway run php artisan migrate

# Connect to shell
railway shell
```

## Performance Tips
- Enable Redis if available
- Use database-backed sessions for multi-instance apps
- Consider using S3 for file storage

## Support
- Railway Docs: https://docs.railway.app
- Laravel Docs: https://laravel.com/docs
