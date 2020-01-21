<?php

class Profile extends AppController {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->render('profile/index');
    }
}

?>