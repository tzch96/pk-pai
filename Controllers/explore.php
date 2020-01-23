<?php

class Explore extends AppController {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->render('explore/index');
    }

    public function course($arg) {
        $idCourse = explode('/', $_GET["url"])[2];
        $this->view->idCourse = $idCourse;
        $this->view->render('explore/course');
    }
}

?>