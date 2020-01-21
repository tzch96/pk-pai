<?php

class Database extends PDO {

    public function __construct() {
        parent::__construct('mysql:host=127.0.0.1;dbname=sapiens', 'admin', 'admin');
    }
}

?>