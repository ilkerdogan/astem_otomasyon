@echo off
setlocal

set MYSQL=C:\laragon\bin\mysql\mysql-8.4.3-winx64\bin\mysql.exe
set MYSQLDUMP=C:\laragon\bin\mysql\mysql-8.4.3-winx64\bin\mysqldump.exe
set PHP=C:\laragon\bin\php\php-8.3.30-Win32-vs16-x64\php.exe
set DB=astem_otomasyon
set OUT=%~dp0schema_with_seed.sql

echo [1/4] Veritabani olusturuluyor...
"%MYSQL%" -u root -e "CREATE DATABASE IF NOT EXISTS %DB% CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
if errorlevel 1 ( echo HATA: MySQL baglantisi basarisiz. Laragon MySQL calisiyor mu? & pause & exit /b 1 )

echo [2/4] Migrate + Seed calistiriliyor...
"%PHP%" artisan migrate:fresh --seed --force
if errorlevel 1 ( echo HATA: migrate basarisiz. & pause & exit /b 1 )

echo [3/4] SQL export aliniyor...
"%MYSQLDUMP%" -u root --no-tablespaces --routines --single-transaction %DB% > "%OUT%"
if errorlevel 1 ( echo HATA: mysqldump basarisiz. & pause & exit /b 1 )

echo [4/4] TAMAMLANDI: %OUT%
pause
