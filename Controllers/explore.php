<?php

class Explore extends AppController {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->render('explore/index');
    }

    public function course($arg) {
        $idCourse = explode('/', $_GET["url"])[2];
        $this->view->idCourse = $idCourse;
        $this->view->render('explore/course');
    }

    public function startCourse($arg) {
        // TODO make connection load from dbh.inc
        $conn = mysqli_connect("127.0.0.1", "admin", "admin", "sapiens");

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        session_start();
        $idUser = $_SESSION['userId'];
        $idCourse = explode('/', $_GET["url"])[2];

        mysqli_autocommit($conn, false);

        $sql = "INSERT INTO users_courses (id_user, id_course) VALUES ($idUser, $idCourse)";
        mysqli_query($conn, $sql);

        if (!mysqli_commit($conn)) {
            $this->view->msg = "Error starting course: " . mysqli_error($conn);
            $this->view->render('explore/index');
            exit();
        } else {
            $this->view->msg = "You have started a new course. You can now go to the learn page or browse through other courses.";
            $this->view->render('explore/index');
            exit();
        }

        mysqli_rollback($conn);

        mysqli_close($conn);
    }
}

?>