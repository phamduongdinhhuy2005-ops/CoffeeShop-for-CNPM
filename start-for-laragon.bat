@echo off
cd /d "%~dp0"

powershell -NoProfile -ExecutionPolicy Bypass -Command ^
  "$conn = Get-NetTCPConnection -LocalPort 5259 -State Listen -ErrorAction SilentlyContinue; if ($conn) { exit 10 }"

if "%ERRORLEVEL%"=="10" (
    echo WebBanHang is already running on http://localhost:5259
    exit /b 0
)

dotnet run --project .\WebBanHang_2380600870.csproj --urls http://localhost:5259
