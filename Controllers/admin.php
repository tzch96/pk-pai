<?php

class Admin extends AppController {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->render('admin/index');
    }

    public function users() {
        $this->view->render('admin/manage-users');
    }

    public function courses() {
        $this->view->render('admin/manage-courses');
    }

    public function deleteUser($id) {
        // TODO make connection load from dbh.inc
        $conn = mysqli_connect("127.0.0.1", "admin", "admin", "sapiens");

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "DELETE FROM users WHERE id_user=$id";

        if (mysqli_query($conn, $sql)) {
            $this->view->msg = "Deleted user with ID " . $id;
        } else {
            $this->view->msg = "Error deleting user: " . mysqli_error($conn);
        }

        $this->view->render('admin/manage-users');
    }
}

?>