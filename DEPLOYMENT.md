# 🚀 YMG Auto - Deployment Guide

## ⚡ Quick Start (Railway Deployment)

### 1. **Prepare Your Application**
```bash
# Windows PowerShell:
.\setup-deployment.ps1

# Or on Linux/Mac:
bash setup-deployment.sh
```

This script will:
- ✓ Generate APP_KEY
- ✓ Install PHP dependencies
- ✓ Build frontend assets
- ✓ Prepare everything for deployment

### 2. **Push to GitHub**
```bash
git add .
git commit -m "Docker and Railway deployment setup"
git push origin main
```

### 3. **Connect to Railway**
1. Go to [https://railway.app](https://railway.app)
2. Sign up/Sign in with GitHub
3. Click "New Project"
4. Select "Deploy from GitHub"
5. Choose this repository
6. Railway will auto-detect it's a Laravel app

### 4. **Configure Environment Variables**
In Railway Dashboard, add these variables:

```
APP_NAME=YMG Auto
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:xxxxx (from setup script output)
APP_URL=https://your-project.railway.app
LOG_CHANNEL=stderr
DB_CONNECTION=sqlite
```

**Optional: Add MySQL**
- Click "+ Add" → Choose "MySQL"
- Railway auto-populates: DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD
- Update DB_CONNECTION to: `mysql`

### 5. **Deploy!**
- Railway auto-deploys on every GitHub push
- Watch logs in Dashboard
- Your app goes live! 🎉

---

## 🐳 Local Docker Testing (Requires Docker Desktop)

If you have Docker installed:

```bash
# Build and run locally
docker compose up --build

# In another terminal, run migrations:
docker compose exec app php artisan migrate

# View logs:
docker compose logs -f app
```

Visit: `http://localhost:8000`

---

## 📦 Project Structure

```
├── Dockerfile              # Multi-stage build for production
├── docker-compose.yml      # Local development setup
├── Procfile               # Railway process definition
├── .env.production        # Production environment template
├── docker-entrypoint.sh   # Startup script
├── setup-deployment.sh    # Linux/Mac setup
├── setup-deployment.ps1   # Windows setup
├── RAILWAY_DEPLOYMENT.md  # Detailed Railway guide
└── .github/workflows/     # CI/CD automation
```

---

## 🔧 Technology Stack

- **Laravel 12** - PHP Framework
- **PHP 8.4** - Runtime
- **SQLite** - Default Database
- **MySQL** - Optional (via Railway)
- **Node.js 20** - Asset building
- **Vite** - Frontend bundler
- **Tailwind CSS** - Styling
- **Livewire** - Real-time components
- **Filament** - Admin panel

---

## 🚨 Troubleshooting

### Docker not installed?
Don't worry! You don't need Docker to deploy to Railway. Railway handles building your Docker image automatically.

### App crashes on Railway
1. Check Railway Logs: Dashboard → Deployments → Logs tab
2. Look for error messages
3. Common issues:
   - Missing APP_KEY → Copy from setup script output
   - Database not initialized → Railway runs migrations automatically
   - Asset build failed → Check npm run build locally

### Database Issues
- **SQLite (default)**: Works with Railway's ephemeral storage (data resets on redeploy)
- **Persistent data**: Use Railway MySQL add-on
- **Migrations**: Railway runs them automatically

### Build Fails
1. Clear Railway cache: Settings → Clear Build Cache → Redeploy
2. Check if `composer.lock` is committed
3. Verify Node modules aren't missing

---

## 📚 Useful Commands

```bash
# Local development
docker compose up --build          # Start app
docker compose down                # Stop app
docker compose exec app bash       # Shell access
docker compose logs -f             # View logs

# Laravel artisan (in container)
docker compose exec app php artisan migrate
docker compose exec app php artisan tinker
docker compose exec app php artisan cache:clear

# Railway CLI
npm install -g @railway/cli
railway link                       # Connect to project
railway logs                       # View live logs
railway shell                      # Open remote shell
```

---

## ✅ Deployment Checklist

- [ ] Created GitHub account and pushed code
- [ ] Ran setup script (PowerShell or Bash)
- [ ] APP_KEY is generated and noted
- [ ] Pushed changes to GitHub
- [ ] Railway account created
- [ ] Connected GitHub repository to Railway
- [ ] Environment variables set in Railway
- [ ] First deployment successful
- [ ] App accessible via Railway URL
- [ ] Database working (run migrations in Railway shell if needed)

---

## 🎓 Learning Resources

- [Laravel Documentation](https://laravel.com/docs)
- [Railway Documentation](https://docs.railway.app)
- [Docker Best Practices](https://docs.docker.com/develop/dev-best-practices/)
- [Livewire Documentation](https://livewire.laravel.com)
- [Filament Documentation](https://filamentphp.com)

---

## 💬 Support

- **Railway Support**: [docs.railway.app](https://docs.railway.app)
- **Laravel Support**: [laravel.com](https://laravel.com)
- **Discord**: Join Laravel or Railway Discord communities

---

## 📄 Files Generated

- `Dockerfile` - Production-ready container
- `docker-compose.yml` - Local development
- `Procfile` - Railway process definition
- `.env.production` - Production environment template
- `docker-entrypoint.sh` - Container startup script
- `.dockerignore` - Optimization
- `setup-deployment.sh` - Linux/Mac setup script
- `setup-deployment.ps1` - Windows PowerShell setup
- `.github/workflows/deploy.yml` - Auto-deployment
- `RAILWAY_DEPLOYMENT.md` - Detailed guide
- `DEPLOYMENT.md` - This file

---

**Happy deploying! 🚀**
