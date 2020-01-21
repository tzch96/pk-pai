<?php

class Index_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function login() {
        $statement = $this->db->prepare("select id from users where login = :login and password = MD5(:password)");
        $statement->execute(array(
            ':login' => $_POST['login'],
            ':password' => $_POST['password']
        ));

        $data = fetchAll();

        $count = $statement->rowCount();
        if ($count > 0) {
            Session::init();
            Session::set('loggedIn', true);
            header('location: ../dashboard');
        } else {
            header('location: ../index');
        }
    }
}

?>