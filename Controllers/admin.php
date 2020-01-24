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
        $conn->autocommit(false);

        $error = false;

        if (!$conn) {
            $error = true;
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "DELETE FROM users WHERE id_user=$id";

        if (mysqli_query($conn, $sql)) {
            $this->view->msg = "Deleted user with ID " . $id;
        } else {
            $this->view->msg = "Error deleting user: " . mysqli_error($conn);
            $error = true;
            exit();
        }

        if ($error) {
            $conn->rollback();
        } else {
            $conn->commit();
        }

        $this->view->render('admin/manage-users');
    }

    public function addUser() {
        $conn = mysqli_connect("127.0.0.1", "admin", "admin", "sapiens");
        $conn->autocommit(false);

        $error = false;

        if (!$conn) {
            $error = true;
            die("Connection failed: " . mysqli_connect_error());
        }

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $role = $_POST['role'];
    
        $sql = "INSERT INTO users (username, email, role, userpassword) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $this->view->msg = "Error adding user: " . mysqli_error($conn);
            $error = true;
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $role, $hashedPassword);

            if (mysqli_stmt_execute($stmt)) {
                $this->view->msg = "Added user";
            } else {
                $this->view->msg = "Error adding user: " . mysqli_error($conn);
                $error = true;
                exit();
            }
        }

        if ($error) {
            $conn->rollback();
        } else {
            $conn->commit();
        }

        $this->view->render('admin/manage-users');
    }
}

?>