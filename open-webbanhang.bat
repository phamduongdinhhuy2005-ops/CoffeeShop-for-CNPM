@echo off
cd /d "%~dp0"
start "WebBanHang ASP.NET Core" cmd /k dotnet run --project .\WebBanHang_2380600870.csproj --urls http://localhost:5259
timeout /t 5 /nobreak >nul
start http://webbanhang.test
