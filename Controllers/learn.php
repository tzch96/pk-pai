<?php

class Learn extends AppController {

    function __construct() {
        parent::__construct();

        $this->view->render('learn/index');
    }
}

?>