<?php

class Settings extends AppController {

    function __construct() {
        parent::__construct();

        $this->view->render('settings/index');
    }
}

?>