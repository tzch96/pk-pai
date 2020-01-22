<?php

class Dashboard extends AppController {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->render('dashboard/index');
    }
}

?>