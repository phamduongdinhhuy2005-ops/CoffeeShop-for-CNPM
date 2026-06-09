# Setup Laragon for PHP MVC/MySQL

## Requirements checked

- PHP 8.1.10 from Laragon
- MySQL 8.0.30 from Laragon
- Required PHP extensions: `PDO`, `pdo_mysql`, `mysqli`, `mbstring`, `openssl`, `curl`, `json`, `gd`, `zip`

## Run with Laragon

1. Start Laragon with Apache and MySQL.
2. Open `http://localhost/WebBanHang_2380600870/`.
3. On first request, the app auto-creates and seeds the `coffeeshop_php` database if it does not exist.

## Pretty local domain

1. Run `add-webbanhang-host-admin.bat` as Administrator if `webbanhang.test` is not in hosts.
2. In Laragon, click `Tai lai` so Apache reloads the vhost.
3. Open `http://webbanhang.test`.

## Manual database reset

Run `setup-database.bat` only when you want to drop and recreate sample data.

## Login

- Admin email: `admin@goclang.vn`
- Admin password: `Admin@123`

## Fallback without Apache

Run `run-local.bat`, then open `http://127.0.0.1:8088`.
