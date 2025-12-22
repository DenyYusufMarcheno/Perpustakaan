# Database Migration Summary: SQLite → MySQL

## What Changed

This update migrates the Perpustakaan library management system from SQLite to MySQL database, making it compatible with XAMPP and PHPMyAdmin.

## Files Modified

### 1. `.env.example`
**Before:**
```env
DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=
```

**After:**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=perpustakaan
DB_USERNAME=root
DB_PASSWORD=
```

**Why:** Sets MySQL as the default database connection for new installations.

---

### 2. `config/database.php`
**Before:**
```php
'default' => env('DB_CONNECTION', 'sqlite'),
```

**After:**
```php
'default' => env('DB_CONNECTION', 'mysql'),
```

**Why:** Changes the default database driver from SQLite to MySQL.

---

### 3. `composer.json`
**Before:**
```json
"post-create-project-cmd": [
    "@php artisan key:generate --ansi",
    "@php -r \"file_exists('database/database.sqlite') || touch('database/database.sqlite');\"",
    "@php artisan migrate --graceful --ansi"
]
```

**After:**
```json
"post-create-project-cmd": [
    "@php artisan key:generate --ansi",
    "@php artisan migrate --graceful --ansi"
]
```

**Why:** Removes the SQLite database file creation step.

---

### 4. `DEPLOYMENT.md`
**Changes:**
- Updated prerequisites to mention XAMPP instead of SQLite
- Replaced SQLite database creation with MySQL/PHPMyAdmin setup steps
- Added comprehensive troubleshooting section for MySQL connection issues
- Updated security checklist to reflect MySQL usage

---

### 5. `README.md`
**Changes:**
- Completely restructured with project-specific information
- Added quick setup guide for XAMPP
- Included MySQL configuration steps
- Added troubleshooting section
- Linked to detailed MySQL setup guide

---

## New Files Created

### 1. `MYSQL_SETUP.md`
A comprehensive guide covering:
- XAMPP installation and setup
- Database creation using PHPMyAdmin or MySQL CLI
- Laravel environment configuration
- Migration and seeding process
- Detailed troubleshooting for common MySQL issues
- PHPMyAdmin usage tips
- Backup and restore procedures

---

## What Stays the Same

### ✅ All Migration Files
- No changes needed - Laravel migrations are database-agnostic
- Works with both SQLite and MySQL
- No SQLite-specific syntax used

### ✅ All Seeders
- No changes needed - uses Eloquent ORM
- Works with any database supported by Laravel

### ✅ All Models and Controllers
- No changes needed - uses Eloquent ORM
- Database-agnostic code

### ✅ Test Configuration (`phpunit.xml`)
- Kept SQLite for testing (faster in-memory database)
- Tests still run without MySQL dependency

---

## How to Use These Changes

### For New Installations:

1. **Start XAMPP** and ensure MySQL is running

2. **Create Database** in PHPMyAdmin:
   ```sql
   CREATE DATABASE perpustakaan CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```

3. **Clone and Setup**:
   ```bash
   git clone <repo-url>
   cd Perpustakaan
   composer install
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure** `.env` (already has MySQL settings from `.env.example`)

5. **Migrate**:
   ```bash
   php artisan migrate:fresh --seed
   ```

6. **Run**:
   ```bash
   php artisan serve
   ```

### For Existing Installations (Upgrading from SQLite):

If you have an existing SQLite database with data:

#### Option A: Export and Import Data

1. **Export existing data** from SQLite:
   ```bash
   php artisan db:seed --class=ExportSeeder  # Create custom exporter if needed
   ```
   Or manually export via database tool.

2. **Create MySQL database** in XAMPP/PHPMyAdmin

3. **Update `.env`** file:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=perpustakaan
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. **Run migrations**:
   ```bash
   php artisan migrate:fresh --seed
   ```

5. **Import your old data** (if you need to preserve it)

#### Option B: Start Fresh

1. **Create MySQL database** in XAMPP/PHPMyAdmin

2. **Update `.env`** file to use MySQL

3. **Run migrations with seed data**:
   ```bash
   php artisan migrate:fresh --seed
   ```
   
   This gives you fresh sample data to work with.

---

## Benefits of MySQL over SQLite

✅ **Production-Ready**: MySQL is better suited for production environments

✅ **Better Performance**: Handles concurrent users and larger datasets

✅ **XAMPP Integration**: Easy to manage via PHPMyAdmin

✅ **Advanced Features**: Stored procedures, triggers, better indexing

✅ **Industry Standard**: More commonly used in professional environments

✅ **Better Tools**: PHPMyAdmin provides excellent GUI for database management

---

## Testing

The test suite continues to use SQLite in-memory database for speed:
```xml
<!-- phpunit.xml -->
<env name="DB_CONNECTION" value="sqlite"/>
<env name="DB_DATABASE" value=":memory:"/>
```

This is intentional and recommended:
- Tests run faster with in-memory SQLite
- No need to set up test MySQL database
- Tests remain isolated

---

## Rollback (If Needed)

If you need to switch back to SQLite:

1. **Edit `.env`**:
   ```env
   DB_CONNECTION=sqlite
   ```

2. **Create SQLite database**:
   ```bash
   touch database/database.sqlite
   ```

3. **Run migrations**:
   ```bash
   php artisan migrate:fresh --seed
   ```

---

## Support

For issues or questions:
- See `MYSQL_SETUP.md` for detailed troubleshooting
- See `DEPLOYMENT.md` for general deployment help
- Check Laravel logs: `storage/logs/laravel.log`
- Check XAMPP MySQL error logs

---

## Summary

✅ **Configuration files updated** to use MySQL by default
✅ **Documentation updated** with XAMPP setup instructions
✅ **Comprehensive guides created** for MySQL setup
✅ **No code changes required** - Laravel migrations are database-agnostic
✅ **Backward compatible** - can still use SQLite if needed
✅ **Test suite unchanged** - still uses fast in-memory SQLite

The migration is complete and ready for use with XAMPP!
