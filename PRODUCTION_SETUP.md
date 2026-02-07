# 🚀 Production Deployment on Railway

## Ready for Production Setup

Your YMG Auto app is ready for production deployment on Railway.

### Step 1: Set Production Environment Variables

Go to **Railway Dashboard** → Your Project → **Settings** → **Variables**

**Add these exact variables:**

```
APP_NAME=YMG Auto
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:R0nttWTNrwBTLWORMYq5MzHIx6ZHzPOuuRyUgNGatPE=
APP_URL=https://your-railway-domain.railway.app

LOG_CHANNEL=stderr
LOG_LEVEL=info

DB_CONNECTION=sqlite
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file

MAIL_MAILER=log
BROADCAST_CONNECTION=log
FILESYSTEM_DISK=public

BCRYPT_ROUNDS=12
```

### Step 2: Configure Domain

1. Go to **Settings** tab
2. Scroll to **Domains**
3. Click **+ Add Custom Domain**
4. Enter your domain (e.g., `ymgauto.com`)
5. Point your DNS to Railway's provided nameservers

### Step 3: Deploy

1. Click **Clear Build Cache** (under Settings)
2. Click **Redeploy**
3. Wait for build to complete (5-15 minutes)
4. Visit your app URL

### Step 4: Verify Production

Once deployed, verify:
- ✅ App loads without 500 error
- ✅ No debug info visible (APP_DEBUG=false)
- ✅ Database working (migrations ran)
- ✅ All pages load correctly

## Production Checklist

- [ ] APP_ENV=production
- [ ] APP_DEBUG=false
- [ ] APP_KEY set correctly
- [ ] APP_URL points to your domain
- [ ] LOG_CHANNEL=stderr
- [ ] Database configured (SQLite or MySQL)
- [ ] Build cache cleared
- [ ] Redeployed successfully
- [ ] App is accessible
- [ ] No 500 errors
- [ ] Domain configured (optional)

## Optional: Add MySQL Database

For better production reliability with persistent data:

1. Go to Railway Dashboard
2. Click **+ Add** button
3. Select **MySQL**
4. Railway auto-provisions and sets variables:
   - `MYSQL_HOST`
   - `MYSQL_PORT`
   - `MYSQL_NAME`
   - `MYSQL_USER`
   - `MYSQL_PASSWORD`

5. Add to your variables:
```
DB_CONNECTION=mysql
DB_HOST=${MYSQL_HOST}
DB_PORT=${MYSQL_PORT}
DB_DATABASE=${MYSQL_NAME}
DB_USERNAME=${MYSQL_USER}
DB_PASSWORD=${MYSQL_PASSWORD}
```

6. Redeploy

## Monitoring Production

### View Logs
```bash
railway logs
```

### Run Commands
```bash
railway run php artisan migrate
railway run php artisan cache:clear
```

### Access Remote Shell
```bash
railway shell
```

## Production Security

✅ APP_DEBUG=false (hides errors from users)
✅ APP_ENV=production (uses production configs)
✅ LOG_CHANNEL=stderr (logs to Railway)
✅ Session driver set (database or file)
✅ Bcrypt rounds: 12

## Troubleshooting Production Issues

### App still shows 500 error
- Check Variables match exactly (no spaces)
- Clear build cache and redeploy
- Check logs: `railway logs`

### Database not working
- If using SQLite: migrations should auto-run
- If using MySQL: add MYSQL_* variables
- Run: `railway run php artisan migrate`

### Assets not loading
- Check npm build completed (in build logs)
- Clear cache and redeploy

### Site is slow
- Check Railway resource limits
- Consider upgrading plan if needed
- Enable Redis caching (optional)

## Performance Tips

1. **Enable Caching**
   ```
   CACHE_DRIVER=file
   ```

2. **Optimize Database**
   - Use MySQL for production data
   - Add indexes to frequently queried columns

3. **Monitor Resources**
   - Railway Dashboard shows CPU/Memory usage
   - Upgrade if hitting limits

4. **Enable CDN** (optional)
   - Cloudflare or similar for faster delivery

## Backup & Recovery

Railroad doesn't auto-backup SQLite. If using SQLite:
- Data persists only during container lifetime
- Use MySQL add-on for persistent data in production

## Support

- **Railway Issues**: https://discord.gg/railway
- **Laravel Issues**: https://laravel.com/docs/12
- **Your App Logs**: Railway Dashboard → Deployments → Logs

---

**Status**: ✅ **PRODUCTION READY**

Your app is configured and ready for production deployment on Railway!
