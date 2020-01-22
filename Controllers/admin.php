<?php

class Admin extends AppController {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->render('admin/index');
    }
}

?>