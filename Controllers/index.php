<?php

class Index extends AppController {

    function __construct() {
        parent::__construct();

        $this->view->render('index/index');
    }
}

?>