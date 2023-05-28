<?php
if (session_status() !== PHP_SESSION_ACTIVE)
    session_start();

require_once './config.php';

require_once './vendor/autoload.php';

require_once './bootstrap/app.php';

require_once './routes/web.php';
