@echo off
set HOSTS=%SystemRoot%\System32\drivers\etc\hosts
findstr /i /c:"webbanhang.test" "%HOSTS%" >nul
if errorlevel 1 (
    echo 127.0.0.1      webbanhang.test # ASP.NET Core reverse proxy>> "%HOSTS%"
    echo Added webbanhang.test to hosts.
) else (
    echo webbanhang.test already exists in hosts.
)
pause
