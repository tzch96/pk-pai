<?php

class Profile extends AppController {

    function __construct() {
        parent::__construct();

        $this->view->render('profile/index');
    }
}

?>