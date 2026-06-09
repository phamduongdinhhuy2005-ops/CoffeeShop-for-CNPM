# Setup Laragon for PHP MVC/MySQL

## Requirements checked

- PHP 8.1.10 from Laragon
- MySQL 8.0.30 from Laragon
- Required PHP extensions: `PDO`, `pdo_mysql`, `mysqli`, `mbstring`, `openssl`, `curl`, `json`, `gd`, `zip`

## First setup

1. Run Laragon and start Apache + MySQL.
2. Run `setup-database.bat` once to create and seed `coffeeshop_php`.
3. Run `add-webbanhang-host-admin.bat` as Administrator if `webbanhang.test` is not in hosts.
4. In Laragon, click `Tải lại` so Apache reloads the new vhost.
5. Open `http://webbanhang.test`.

## Login

- Admin email: `admin@goclang.vn`
- Admin password: `Admin@123`

## Fallback without Apache

Run `run-local.bat`, then open `http://127.0.0.1:8088`.
