<?php include 'Includes/dbh.inc.php' ?>

<?php include 'Views/header.php'; ?>

<style>
<?php include 'Public/css/style.css'; ?>
</style>

<body>
    <header class="topnav">
        <a href="#"><img class="topnav-logo" src="<?php echo URL; ?>Public/img/logo.png"><img class="topnav-logo" src="<?php echo URL; ?>Public/img/logotext.png"></a>
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
            $idCourse = $_SESSION['currentCourseId'];
            $sql = "SELECT * FROM course_lessons WHERE id_course=$idCourse";
            
            $result = $conn->query($sql);
        ?>
        <div class="dropdown-menu">
            <h1 class="dropdown-button">Choose lesson <i class="fas fa-caret-down"></i></h1>
            <div class="dropdown-content">
            <?php
                while ($rows = mysqli_fetch_assoc($result))
                {?>
                    <a href="<?php echo URL; ?>learn/lesson/<?php echo $rows['id_lesson']; ?>"><?php echo $rows['lesson_name']; ?></a>
                <?php
                }?>
            </div>
        </div>

        <?php
            $idLesson = explode('/', $_GET["url"])[2];
            $sql = "SELECT lessons.lesson_name FROM lessons WHERE lessons.id_lesson=$idLesson";
            $result = $conn->query($sql);
            $lessonName = mysqli_fetch_assoc($result)['lesson_name'];
        ?>
        <!-- TODO: add completion percentage here (to span element) -->
        <h1 style="padding-top: 1em;">Current lesson: <?php echo $lessonName; ?><span style="float: right;"></span></h1>


        <div class="grid">
            <section class="lesson-contents">
                <div class="lesson-content">
                    <h4 class="lesson-content-title">Theory</h4>
                    <a href="<?php echo URL; ?>learn/theory/<?php echo $idLesson; ?>" class="lesson-content-item"><?php echo $lessonName; ?> - Theory</a>
                    <p class="lesson-content-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
                <div class="lesson-content">
                    <h4 class="lesson-content-title">Flashcards</h4>
                </div>
                <div class="lesson-content">
                    <h4 class="lesson-content-title">Tasks</h4>
                    <a href="<?php echo URL; ?>learn/tasks/<?php echo $idLesson; ?>" class="lesson-content-item"><?php echo $lessonName; ?> - Tasks</a>
                </div>
                <div class="lesson-content">
                    <h4 class="lesson-content-title">Tests</h4>
                    <a href="<?php echo URL; ?>learn/test/<?php echo $idLesson; ?>" class="lesson-content-item"><?php echo $lessonName; ?> - Test</a>
                </div>
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
</html>