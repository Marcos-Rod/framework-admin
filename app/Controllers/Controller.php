<?php

namespace App\Controllers;

class Controller
{

    public $configuration = array(), $project = "", $url = "", $keywords = "", $description = "";
    public $metas = array();

    public function __construct()
    {
        $this->configuration = \App\Models\Configuration::first();
        $this->project = $this->configuration->project ?? null;
        $this->url = $this->configuration->url ?? null;

        $this->metas = [
            'keywords' => $this->configuration->keywords ?? null,
            'description' => $this->configuration->description ?? null,
            'file' => 'inicio',
            'canonical_url' => '',
            'title' => $this->project,
            'image' => 'your image default',
            'slug' => 'inicio'
        ];
    }

    public function view($route, $data = [])
    {
        //Destructurar array
        extract($data);

        $route = str_replace('.', '/', $route);

        if (file_exists(URL_SERVIDOR . "resources/views/{$route}.php")) {

            ob_start();
            include  URL_SERVIDOR . "resources/views/{$route}.php";
            $content = ob_get_clean();

            return $content;
        } else {
            include  URL_SERVIDOR . "404.php";
            return;
        }
    }

    public function redirect($route)
    {
        header("Location: {$route}");
    }

    public static function showErrors($status = 0)
    {
        if (intval($status) == 1) {
            ini_set('display_errors', 'on');
            ini_set('log_errors', 'on');
            ini_set('display_startup_errors', 'on');
            ini_set('error_reporting', E_ALL);
        } else {
            error_reporting(0);
        }
        return true;
    }

    //fecha actual
    public static function hoy()
    {
        date_default_timezone_set('America/Mexico_City');
        return date('Y-m-d H:i:s', time());
    }
}
