<?php

class AppError extends Controller {

    function __construct() {
        parent::__construct();

        $this->view->msg = 'We couldn\'t find the page you were looking for.';
        $this->view->render('error/index');
    }
}

?>