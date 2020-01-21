<?php

class Bootstrap {

    function __construct() {
        $url = isset($_GET['url']) ? $_GET['url'] : $url = 'index';
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        $file = 'Controllers/' . $url[0] . '.php';
        if (file_exists($file) && $url[0] != 'error') {
            require $file;
        } else {
            require 'Controllers/error.php';
            $controller = new AppError();
            return false;
        }

        $controller = new $url[0];

        if (isset($url[2])) {
            $controller->{$url[1]}($url[2]);
        } else {
            if (isset($url[1])) {
                $controller->{$url[1]}();
            }
        }
    }
}

?>