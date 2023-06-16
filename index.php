<?php
if (session_status() !== PHP_SESSION_ACTIVE)
    session_start();

require_once './config.php';

require_once './vendor/autoload.php';

//Este proyecto utiliza las funciones de Eloquent para la base de datos
//https://laravel.com/docs/eloquent
require_once './bootstrap/app.php';

if(str_contains($_SERVER['REQUEST_URI'], str_replace('/', '', FOLDER_ADMIN))){
    require_once './routes/admin.php';
} else {
    require_once './routes/web.php';
}