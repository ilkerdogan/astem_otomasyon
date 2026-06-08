<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
// __DIR__ = /home/u2730282/www — Laravel root = /home/u2730282/astem_otomasyon
if (file_exists($maintenance = __DIR__.'/../astem_otomasyon/storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../astem_otomasyon/vendor/autoload.php';

// Bootstrap Laravel and handle the request...
(require_once __DIR__.'/../astem_otomasyon/bootstrap/app.php')
    ->handleRequest(Request::capture());
