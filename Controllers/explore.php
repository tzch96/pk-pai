<?php

class Explore extends AppController {

    function __construct() {
        parent::__construct();

        $this->view->render('explore/index');
    }
}

?>