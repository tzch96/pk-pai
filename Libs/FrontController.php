<?php

class FrontController {

    function __construct() {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        if (empty($url[0])) {
            require 'Controllers/index.php';
            $controller = new Index();
            $controller->index();
            return false;
        }

        $file = 'Controllers/' . $url[0] . '.php';
        if (file_exists($file) && $url[0] != 'error') {
            require $file;
        } else {
            $this->error();
        }

        $controller = new $url[0];
        $controller->loadModel($url[0]);

        if (isset($url[2])) {
            if (method_exists($controller, $url[1])) {
                $controller->{$url[1]}($url[2]);
            } else {
                $this->error();
            }
        } else {
            if (isset($url[1])) {
                if (method_exists($controller, $url[1])) {
                    $controller->{$url[1]}();
                } else {
                    $this->error();
                }
            } else {
                $controller->index();
            }
        }
    }

    function error() {
        require 'Controllers/error.php';
        $controller = new AppError();
        $controller->index();
        return false;
    }
}

?>