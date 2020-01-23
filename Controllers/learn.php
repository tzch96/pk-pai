<?php

class Learn extends AppController {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->render('learn/index');
    }

    public function course($arg) {
        $this->view->render('learn/course');
    }

    public function lesson($arg) {
        $this->view->render('learn/lesson');
    }

    public function theory($arg) {
        $this->view->render('learn/theory');
    }

    public function tasks($arg) {
        $this->view->render('learn/tasks');
    }

    public function test($arg) {
        $this->view->render('learn/test');
    }
}

?>