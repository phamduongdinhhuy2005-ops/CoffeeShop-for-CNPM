@echo off
set MYSQL=E:\laragon\bin\mysql\mysql-8.0.30-winx64\bin\mysql.exe
"%MYSQL%" --default-character-set=utf8mb4 --host=127.0.0.2 --port=3306 -uroot < "%~dp0database\schema.sql"
if errorlevel 1 (
    echo Database setup failed.
    pause
    exit /b 1
)
echo Database coffeeshop_php is ready.
pause
