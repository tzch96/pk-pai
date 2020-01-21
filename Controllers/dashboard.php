<?php

class Dashboard extends AppController {

    function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');

        if ($logged == false) {
            Session::destroy();
            header('location: ../index');
            exit;
        }
    }

    function index() {
        $this->view->render('dashboard/index');
    }

    function logout() {
        Session::destroy();
        header('location: ../index');
        exit;
    }
}

?>