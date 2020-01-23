<?php include 'Includes/dbh.inc.php' ?>

<?php include 'Views/header.php'; ?>

<style>
<?php include 'Public/css/style.css'; ?>
</style>

<body>

    <?php
        if (!isset($_SESSION['userId'])) {
            echo '<script type="text/javascript">',
            'window.location.replace("index");',
            '</script>';
            exit();
        } else {

        }
    ?>
    
    <header class="topnav">
        <a href="<?php echo URL; ?>index"><img class="topnav-logo" src="<?php echo URL; ?>Public/img/logo.png"><img class="topnav-logo" src="<?php echo URL; ?>Public/img/logotext.png"></a>
        <nav>
            <ul class="topnav-links">
                <li><a class="active" href="<?php echo URL; ?>learn">learn</a></li>
                <li><a href="<?php echo URL; ?>explore">explore</a></li>
                <li><a href="<?php echo URL; ?>profile">profile</a></li>
                <li><a href="<?php echo URL; ?>settings">settings</a></li>
            </ul>
        </nav>
        <form action="<?php echo URL; ?>Includes/logout.inc.php" method="post">
            <button type="submit" class="topnav-logout" name="logout-submit"><i class="fas fa-sign-out-alt"></i></button>
        </form>
    </header>

    <div class="content">
        <?php
            $idUser = $_SESSION['userId'];
            $sql = "SELECT courses.id_course, courses.course_name FROM courses
                LEFT JOIN users_courses ON users_courses.id_course=courses.id_course
                LEFT JOIN users ON users_courses.id_user=users.id_user
                WHERE users_courses.id_user=$idUser";
            
            $result = $conn->query($sql);
        ?>
        
        <div class="dropdown-menu">
            <h1 class="dropdown-button">Choose course <i class="fas fa-caret-down"></i></h1>
            <div class="dropdown-content">
            <?php
                while ($rows = mysqli_fetch_assoc($result))
                {?>
                    <a href="<?php echo URL; ?>learn/course/<?php echo $rows['id_course']; ?>"><?php echo $rows['course_name']; ?></a>
                <?php
                }?>
            </div>
        </div>

        <?php
            $idCourse = explode('/', $_GET["url"])[2];
            $_SESSION['currentCourseId'] = $idCourse;
            $sql = "SELECT courses.course_name FROM courses WHERE courses.id_course=$idCourse";
            $result = $conn->query($sql);
            $courseName = mysqli_fetch_assoc($result)['course_name'];
        ?>
        <!-- TODO: add completion percentage here (to span element)  -->
        <h1 style="padding-top: 1em;">Current course: <?php echo $courseName; ?><span style="float: right;"></span></h1>

        <?php
            $sql = "SELECT lessons.lesson_name, lessons.id_lesson FROM lessons
                        LEFT JOIN courses ON courses.id_course=lessons.id_course
                        WHERE lessons.id_course=$idCourse";

            $result = $conn->query($sql);
        ?>

        <h1 style="padding-top: 1em; padding-bottom: 0.5em;">Lessons</h1>

        <div class="grid">
            <section class="cards">
                <?php
                while ($rows = mysqli_fetch_assoc($result))
                {?>
                    <div class="card">
                        <a href="<?php echo URL; ?>learn/lesson/<?php echo $rows['id_lesson']; ?>">
                            <div class="card-image">
                                <img src="<?php echo URL; ?>Public/img/lesson-placeholder.jpg">
                            </div>
                            <div class="card-content">
                                <h3 class="card-title"><?php echo $rows['lesson_name']; ?></h3>
                            </div>
                        </a>
                    </div>
                <?php
                }?>
            </section>
        </div>

    </div>
    
    <div id="bottomnav" class="bottomnav">
        <a class="active" href="<?php echo URL; ?>learn"><i class="fas fa-book"></i></a>
        <a href="<?php echo URL; ?>explore"><i class="fas fa-search"></i></a>
        <a href="<?php echo URL; ?>profile"><i class="fas fa-user"></i></a>
        <a href="<?php echo URL; ?>settings"><i class="fas fa-cog"></i></a>
    </div>
</body>