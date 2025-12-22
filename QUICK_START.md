# Quick Reference: MySQL Setup for XAMPP

## 🚀 Quick Start (5 Steps)

### 1️⃣ Start XAMPP
- Open XAMPP Control Panel
- Start **MySQL** and **Apache**

### 2️⃣ Create Database
Open PHPMyAdmin: `http://localhost/phpmyadmin`
```sql
CREATE DATABASE perpustakaan CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 3️⃣ Configure Laravel
```bash
cp .env.example .env
php artisan key:generate
```

### 4️⃣ Run Migrations
```bash
php artisan migrate:fresh --seed
```

### 5️⃣ Start Server
```bash
php artisan serve
```
Visit: `http://localhost:8000`

---

## 🔑 Login Credentials

| Role | Email | Password |
|------|-------|----------|
| Admin | admin@perpustakaan.com | admin123 |
| Petugas | petugas@perpustakaan.com | petugas123 |
| Anggota | anggota@perpustakaan.com | anggota123 |

---

## ⚙️ Default MySQL Settings (.env)

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=perpustakaan
DB_USERNAME=root
DB_PASSWORD=           # Leave empty for XAMPP default
```

---

## 🔧 Common Issues & Quick Fixes

### ❌ "Connection refused"
**Fix:** Start MySQL in XAMPP Control Panel

### ❌ "Access denied"
**Fix:** Check `.env` - username should be `root`, password empty

### ❌ "Database does not exist"
**Fix:** Create database in PHPMyAdmin first

### ❌ "Port 3306 in use"
**Fix:** Stop other MySQL services or change port in XAMPP

---

## 📚 Documentation Files

- **MYSQL_SETUP.md** → Detailed setup guide (START HERE!)
- **MIGRATION_SUMMARY.md** → What changed and why
- **DEPLOYMENT.md** → Full deployment guide
- **README.md** → Project overview

---

## 🎯 PHPMyAdmin Shortcuts

- Access: `http://localhost/phpmyadmin`
- View data: Select `perpustakaan` → Click table name
- Backup: `perpustakaan` → Export → Go
- Import: `perpustakaan` → Import → Choose file → Go

---

## 💡 Pro Tips

1. **XAMPP auto-start**: Check "Svc" box in XAMPP Control Panel
2. **Reset data**: Run `php artisan migrate:fresh --seed`
3. **View logs**: Check `storage/logs/laravel.log`
4. **Check tables**: Use PHPMyAdmin to browse `perpustakaan` database

---

## 🆘 Need Help?

1. Read **MYSQL_SETUP.md** for detailed troubleshooting
2. Check XAMPP MySQL logs
3. Verify `.env` database settings
4. Ensure XAMPP MySQL is running

---

**🎉 That's it! You're ready to use the system with MySQL and XAMPP!**
