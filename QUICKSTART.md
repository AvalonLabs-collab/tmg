# 🚀 QUICK START - YMG Auto Railway Deployment

## 3 Simple Steps to Deploy

### Step 1: Run Setup Script
```bash
# Windows PowerShell:
Set-ExecutionPolicy -ExecutionPolicy Bypass -Scope Process
.\setup-deployment.ps1

# Linux/Mac:
bash setup-deployment.sh
```

**The script will:**
- Generate APP_KEY (SAVE THIS!)
- Install dependencies
- Build frontend

### Step 2: Push to GitHub
```bash
git add .
git commit -m "Deploy setup"
git push origin main
```

### Step 3: Deploy to Railway
1. Go to https://railway.app
2. Login with GitHub
3. Click "New Project" → "Deploy from GitHub"
4. Select your repository
5. Add these variables in Railway Dashboard:

```
APP_KEY=base64:xxxxx (from Step 1 output!)
APP_ENV=production
APP_DEBUG=false
APP_NAME=YMG Auto
APP_URL=https://your-railway-domain.railway.app
LOG_CHANNEL=stderr
DB_CONNECTION=sqlite
```

**DONE!** Railway auto-deploys. Watch logs in Dashboard.

---

## ✨ What You Get

- ✓ Dockerfile (multi-stage, optimized)
- ✓ Docker Compose (local testing)
- ✓ Procfile (Railway config)
- ✓ .env.production (template)
- ✓ Setup scripts (Windows & Linux)
- ✓ GitHub Actions CI/CD
- ✓ Deployment guides

---

## 🔗 Important Links

- **Railway Dashboard**: https://railway.app
- **After Deploy**: https://your-project.railway.app
- **Railway Docs**: https://docs.railway.app
- **Full Guide**: See `DEPLOYMENT.md` & `RAILWAY_DEPLOYMENT.md`

---

## ⚠️ Common Issues

| Problem | Solution |
|---------|----------|
| "docker: not found" | You don't need Docker! Railway builds it for you |
| App crashes on Railway | Check Railway Logs tab in Dashboard |
| Missing APP_KEY | Copy from setup script output & add to Railway |
| Assets not loading | npm run build may have failed locally |
| Database error | Use Railway's MySQL add-on for persistence |

---

## 📞 Help

- Read: `RAILWAY_DEPLOYMENT.md` (detailed step-by-step)
- Read: `DEPLOYMENT.md` (full reference)
- Railway Support: https://discord.gg/railway
- Laravel Docs: https://laravel.com/docs

---

**Made with ❤️ for Laravel + Railway deployment**
