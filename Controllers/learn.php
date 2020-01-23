<?php

class Learn extends AppController {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->render('learn/index');
    }

    public function course($arg) {
        $idCourse = explode('/', $_GET["url"])[2];
        $this->view->idCourse = $idCourse;
        $this->view->render('learn/course');
    }
}

?>