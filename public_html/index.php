<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Maintenance Mode
if (file_exists($maintenance = __DIR__.'/../laravel/storage/framework/maintenance.php')) {
    require $maintenance;
}

// Autoloader
require __DIR__.'/../laravel/vendor/autoload.php';

// Bootstrap Laravel
$app = require_once __DIR__.'/../laravel/bootstrap/app.php';

$app->usePublicPath(__DIR__);

$app->make(Illuminate\Contracts\Http\Kernel::class)
    ->handle(Request::capture())
    ->send();
