#!/usr/bin/env bash
# YMG Auto - Deployment Status Check
# Run this after setup to verify everything is ready

echo "🔍 YMG Auto - Deployment Readiness Check"
echo "=========================================="
echo ""

status_check=0

# Check 1: Composer files
echo -n "✓ Checking composer.json... "
if [ -f "composer.json" ] && [ -f "composer.lock" ]; then
    echo "✓"
else
    echo "✗ Missing composer files"
    status_check=$((status_check + 1))
fi

# Check 2: Package files
echo -n "✓ Checking package.json... "
if [ -f "package.json" ]; then
    echo "✓"
else
    echo "✗ Missing package.json"
    status_check=$((status_check + 1))
fi

# Check 3: Docker files
echo -n "✓ Checking Dockerfile... "
if [ -f "Dockerfile" ]; then
    echo "✓"
else
    echo "✗ Missing Dockerfile"
    status_check=$((status_check + 1))
fi

echo -n "✓ Checking docker-compose.yml... "
if [ -f "docker-compose.yml" ]; then
    echo "✓"
else
    echo "✗ Missing docker-compose.yml"
    status_check=$((status_check + 1))
fi

echo -n "✓ Checking .dockerignore... "
if [ -f ".dockerignore" ]; then
    echo "✓"
else
    echo "✗ Missing .dockerignore"
    status_check=$((status_check + 1))
fi

# Check 4: Deployment files
echo -n "✓ Checking Procfile... "
if [ -f "Procfile" ]; then
    echo "✓"
else
    echo "✗ Missing Procfile"
    status_check=$((status_check + 1))
fi

echo -n "✓ Checking railway.json... "
if [ -f "railway.json" ]; then
    echo "✓"
else
    echo "✗ Missing railway.json"
    status_check=$((status_check + 1))
fi

echo -n "✓ Checking docker-entrypoint.sh... "
if [ -f "docker-entrypoint.sh" ]; then
    echo "✓"
    echo "  - Making executable..."
    chmod +x docker-entrypoint.sh
else
    echo "✗ Missing docker-entrypoint.sh"
    status_check=$((status_check + 1))
fi

# Check 5: Documentation
echo -n "✓ Checking QUICKSTART.md... "
if [ -f "QUICKSTART.md" ]; then
    echo "✓"
else
    echo "✗ Missing QUICKSTART.md"
    status_check=$((status_check + 1))
fi

echo -n "✓ Checking DEPLOYMENT.md... "
if [ -f "DEPLOYMENT.md" ]; then
    echo "✓"
else
    echo "✗ Missing DEPLOYMENT.md"
    status_check=$((status_check + 1))
fi

echo -n "✓ Checking RAILWAY_DEPLOYMENT.md... "
if [ -f "RAILWAY_DEPLOYMENT.md" ]; then
    echo "✓"
else
    echo "✗ Missing RAILWAY_DEPLOYMENT.md"
    status_check=$((status_check + 1))
fi

# Check 6: Environment files
echo -n "✓ Checking .env.production... "
if [ -f ".env.production" ]; then
    echo "✓"
else
    echo "✗ Missing .env.production"
    status_check=$((status_check + 1))
fi

echo -n "✓ Checking .env.railway... "
if [ -f ".env.railway" ]; then
    echo "✓"
else
    echo "✗ Missing .env.railway"
    status_check=$((status_check + 1))
fi

# Check 7: Git
echo -n "✓ Checking Git repository... "
if git rev-parse --git-dir > /dev/null 2>&1; then
    echo "✓"
    echo "  - Checking if .gitignore exists..."
    if [ -f ".gitignore" ]; then
        echo "    ✓ .gitignore found"
    else
        echo "    ✗ .gitignore missing"
    fi
else
    echo "✗ Not a git repository"
    status_check=$((status_check + 1))
fi

# Check 8: .env file
echo -n "✓ Checking .env file... "
if [ -f ".env" ]; then
    echo "✓"
    if grep -q "APP_KEY=base64:" .env; then
        echo "  ✓ APP_KEY is set"
    else
        echo "  ✗ APP_KEY is missing or not set (run setup script)"
        status_check=$((status_check + 1))
    fi
else
    echo "✗ Missing .env file (run setup script)"
    status_check=$((status_check + 1))
fi

# Summary
echo ""
echo "=========================================="
if [ $status_check -eq 0 ]; then
    echo "✅ All checks passed! Ready to deploy!"
    echo ""
    echo "Next steps:"
    echo "1. Read QUICKSTART.md"
    echo "2. Commit changes: git add . && git commit -m 'Deploy setup'"
    echo "3. Push to GitHub: git push origin main"
    echo "4. Go to railway.app and connect your GitHub repo"
    echo ""
else
    echo "⚠️  $status_check issue(s) found"
    echo "Please run the setup script: ./setup-deployment.sh"
fi
echo ""
