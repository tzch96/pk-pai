<?php

class Settings extends AppController {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->render('settings/index');
    }
}

?>