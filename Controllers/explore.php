<?php

class Explore extends AppController {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->render('explore/index');
    }
}

?>