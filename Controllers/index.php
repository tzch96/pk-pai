<?php

class Index extends AppController {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->render('index/index');
    }

    function login() {
        $this->model->login();
    }

    function signup() {
        $this->model->signup();
    }
}

?>