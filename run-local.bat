@echo off
cd /d "%~dp0"
E:\laragon\bin\php\php-8.1.10-Win32-vs16-x64\php.exe -S 127.0.0.1:8088 -t public public/router.php
