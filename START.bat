@echo off
title JobYaari Blog - Server
color 0A

echo ============================================
echo    JobYaari Blog Management System
echo ============================================
echo.
echo Starting server...
echo.

:: Refresh PATH to include PHP
set "PATH=%PATH%;%LOCALAPPDATA%\Microsoft\WinGet\Packages\PHP.PHP.8.4_Microsoft.Winget.Source_8wekyb3d8bbwe"

:: Start the Laravel server
echo Server will be available at: http://127.0.0.1:8000
echo.
echo Press Ctrl+C to stop the server.
echo ============================================
echo.

:: Open browser after 2 seconds
start "" cmd /c "timeout /t 2 >nul && start http://127.0.0.1:8000"

:: Run Laravel server
php artisan serve --port=8000
