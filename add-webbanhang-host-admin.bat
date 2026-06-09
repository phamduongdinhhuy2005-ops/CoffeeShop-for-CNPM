@echo off
set HOSTS=%SystemRoot%\System32\drivers\etc\hosts
findstr /i /c:"webbanhang.test" "%HOSTS%" >nul
if errorlevel 1 (
    echo 127.0.0.1      webbanhang.test # PHP MVC Laragon>> "%HOSTS%"
    echo Added webbanhang.test to hosts.
) else (
    echo webbanhang.test already exists in hosts.
)
pause
