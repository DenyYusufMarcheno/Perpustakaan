# MySQL/PHPMyAdmin Setup Guide for XAMPP

This guide will help you set up the Perpustakaan application with MySQL database using XAMPP.

## Step 1: Install and Start XAMPP

1. Download XAMPP from https://www.apachefriends.org/
2. Install XAMPP on your system
3. Open XAMPP Control Panel
4. Start **Apache** and **MySQL** modules

## Step 2: Create Database using PHPMyAdmin

### Option A: Using PHPMyAdmin Web Interface

1. Open your browser and go to: `http://localhost/phpmyadmin`
2. Click on **"New"** in the left sidebar (or **"Databases"** tab)
3. Enter database name: `perpustakaan`
4. Select collation: `utf8mb4_unicode_ci`
5. Click **"Create"**

### Option B: Using MySQL Command Line

1. Open Terminal/Command Prompt
2. Navigate to XAMPP MySQL bin directory:
   - Windows: `cd C:\xampp\mysql\bin`
   - macOS: `cd /Applications/XAMPP/xamppfiles/bin`
   - Linux: `cd /opt/lampp/bin`

3. Run MySQL:
   ```bash
   mysql -u root -p
   ```
   (Press Enter if no password is set - default for XAMPP)

4. Create database:
   ```sql
   CREATE DATABASE perpustakaan CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   SHOW DATABASES;
   EXIT;
   ```

## Step 3: Configure Laravel Environment

1. Copy the example environment file:
   ```bash
   cp .env.example .env
   ```

2. Edit `.env` file and configure MySQL settings:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=perpustakaan
   DB_USERNAME=root
   DB_PASSWORD=
   ```
   
   **Note**: Leave `DB_PASSWORD` empty if you haven't set a MySQL password in XAMPP (which is the default).

3. If you haven't generated application key yet:
   ```bash
   php artisan key:generate
   ```

## Step 4: Run Migrations and Seeds

1. Install dependencies (if not already done):
   ```bash
   composer install
   ```

2. Run database migrations and seed sample data:
   ```bash
   php artisan migrate:fresh --seed
   ```
   
   This will create all necessary tables and populate them with sample data.

## Step 5: Verify Database in PHPMyAdmin

1. Go back to PHPMyAdmin: `http://localhost/phpmyadmin`
2. Click on `perpustakaan` database in the left sidebar
3. You should see the following tables:
   - `anggotas` (Members)
   - `bukus` (Books)
   - `cache` & `cache_locks`
   - `failed_jobs`
   - `job_batches`
   - `jobs`
   - `migrations`
   - `peminjamans` (Borrowings)
   - `sessions`
   - `users`

## Step 6: Start Laravel Server

```bash
php artisan serve
```

Open browser: `http://localhost:8000`

## Default Login Credentials

After seeding, you can use these accounts:

### Admin Account
- **Email**: admin@perpustakaan.com
- **Password**: admin123
- **Access**: Full system access

### Petugas Account
- **Email**: petugas@perpustakaan.com
- **Password**: petugas123
- **Access**: Full system access

### Anggota Account
- **Email**: anggota@perpustakaan.com
- **Password**: anggota123
- **Access**: View-only access

## Troubleshooting

### Error: "SQLSTATE[HY000] [2002] Connection refused"

**Problem**: MySQL is not running.

**Solution**: 
- Open XAMPP Control Panel
- Ensure MySQL module is started (green indicator)
- Try restarting MySQL

### Error: "SQLSTATE[HY000] [1045] Access denied"

**Problem**: Incorrect MySQL credentials.

**Solution**: 
- Check your `.env` file settings
- Default XAMPP MySQL credentials:
  - Username: `root`
  - Password: (empty)
- If you've set a MySQL password in XAMPP, update `DB_PASSWORD` in `.env`

### Error: "SQLSTATE[42000]: Unknown database 'perpustakaan'"

**Problem**: Database doesn't exist.

**Solution**: 
- Go back to Step 2 and create the database
- Or run this command:
  ```bash
  mysql -u root -p -e "CREATE DATABASE perpustakaan CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
  ```

### Error: "Base table or view not found"

**Problem**: Migrations haven't been run.

**Solution**: 
```bash
php artisan migrate:fresh --seed
```

### Error: Port 3306 already in use

**Problem**: Another MySQL instance is running.

**Solution**: 
- Stop other MySQL services
- Or change MySQL port in XAMPP (Config > my.ini)
- Update `DB_PORT` in `.env` to match

## Managing Database with PHPMyAdmin

### View Data
1. Open PHPMyAdmin
2. Select `perpustakaan` database
3. Click on any table to view/edit data

### Backup Database
1. Select `perpustakaan` database
2. Click **"Export"** tab
3. Choose **"Quick"** export method
4. Select **"SQL"** format
5. Click **"Export"** button
6. Save the `.sql` file

### Import Database
1. Select `perpustakaan` database (or create new one)
2. Click **"Import"** tab
3. Click **"Choose File"** and select your `.sql` file
4. Click **"Import"** button at bottom

### Reset Database
If you need to start fresh:

```bash
php artisan migrate:fresh --seed
```

Or manually in PHPMyAdmin:
1. Select `perpustakaan` database
2. Click **"Drop"** to delete (be careful!)
3. Create new database
4. Run migrations again

## Tips for XAMPP

1. **Auto-start services**: In XAMPP Control Panel, check the "Svc" checkbox next to Apache and MySQL to start them automatically with Windows.

2. **Change MySQL password** (optional):
   ```bash
   mysql -u root
   ALTER USER 'root'@'localhost' IDENTIFIED BY 'your_new_password';
   FLUSH PRIVILEGES;
   EXIT;
   ```
   Don't forget to update `.env` file with the new password!

3. **MySQL Config**: Access via XAMPP Control Panel > MySQL > Config > my.ini

4. **PHPMyAdmin Config**: Located at `xampp/phpMyAdmin/config.inc.php`

## Additional Resources

- Laravel Documentation: https://laravel.com/docs/database
- XAMPP Documentation: https://www.apachefriends.org/docs/
- PHPMyAdmin Documentation: https://docs.phpmyadmin.net/

## Support

If you encounter any issues not covered here, please:
1. Check Laravel error logs: `storage/logs/laravel.log`
2. Check MySQL error logs in XAMPP
3. Review the main `DEPLOYMENT.md` for general setup issues
