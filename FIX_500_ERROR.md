# 🔧 Fix 500 Error - Railway Configuration

## The Problem
Your app is running but throwing a 500 error. This is usually because:
1. ❌ APP_ENV is set to `local` instead of `production`
2. ❌ APP_DEBUG is `true` (shows detailed errors locally, breaks in production)
3. ❌ Missing or incorrect environment variables on Railway

## The Solution

### Step 1: Check Your Railway Variables
Go to **Railway Dashboard** → Your Project → **Variables** tab

You should have these set:
```
APP_NAME=YMG Auto
APP_ENV=production          ← IMPORTANT: NOT local!
APP_DEBUG=false             ← IMPORTANT: NOT true!
APP_KEY=base64:xxxxx        ← The key from setup script
APP_URL=https://your-project.railway.app
LOG_CHANNEL=stderr          ← For Railway logs
DB_CONNECTION=sqlite        ← Or mysql if using Railway MySQL
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
```

### Step 2: Check for Missing Variables
If any of these are missing, add them:
- `MAIL_MAILER=log` (for local mail testing)
- `CACHE_STORE=file`
- Any other DB variables if using MySQL

### Step 3: Clear Cache & Redeploy
1. Go to **Settings** tab
2. Click **Clear Build Cache**
3. Click **Redeploy**
4. Wait for build to complete
5. Refresh your app URL

## Common 500 Error Causes

| Issue | Fix |
|-------|-----|
| `APP_DEBUG=true` | Set to `false` in Railway |
| `APP_ENV=local` | Set to `production` in Railway |
| Missing `APP_KEY` | Copy from setup script output |
| `LOG_CHANNEL=stack` | Change to `stderr` for Railway |
| Database issues | Check DB_CONNECTION matches your setup |
| Cache issues | Clear build cache and redeploy |

## Debug the Error

To see the actual error, check **Railway Logs**:

1. Go to **Railway Dashboard** → Your Project
2. Click **Deployments** tab
3. Select your latest deployment
4. Click **Logs** button
5. Look for error messages

Share the error message if you still see issues after fixing variables.

## Local Development vs Production

**Your .env (LOCAL):**
```
APP_ENV=local
APP_DEBUG=true
LOG_CHANNEL=stack
```

**Railway (PRODUCTION):**
```
APP_ENV=production
APP_DEBUG=false
LOG_CHANNEL=stderr
```

These are intentionally different! The .env file is for local testing only.

---

**Quick Fix Checklist:**
- [ ] Go to Railway Dashboard
- [ ] Check Variables tab
- [ ] Ensure APP_ENV=production
- [ ] Ensure APP_DEBUG=false
- [ ] Click Clear Build Cache
- [ ] Click Redeploy
- [ ] Refresh app URL
- [ ] 500 error should be gone! ✅
