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
                <li><a href="<?php echo URL; ?>learn">learn</a></li>
                <li><a class="active" href="#">explore</a></li>
                <li><a href="<?php echo URL; ?>profile">profile</a></li>
                <li><a href="<?php echo URL; ?>settings">settings</a></li>
            </ul>
        </nav>
        <form action="<?php echo URL; ?>Includes/logout.inc.php" method="post">
            <button type="submit" class="topnav-logout" name="logout-submit"><i class="fas fa-sign-out-alt"></i></button>
        </form>
    </header>

    <div class="content">
        <h2 style="padding-bottom: 0.5em;"><?php echo $this->msg; ?></h3>

        <?php
            $sql = "SELECT courses.id_course, categories.category_name, courses.course_name, courses.description FROM courses INNER JOIN categories ON categories.id_category=courses.id_category";
            $result = $conn->query($sql);
        ?>

        <div class="header-with-search">
            <h1 class="web-only" style="padding-bottom: 0.5em;">Available courses</h1>
            <div class="search-box">
                <form action="/">
                    <input type="text" placeholder="Search" name="search">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>

        <div class="grid">
            <section class="cards">
                <?php
                    while ($rows = mysqli_fetch_assoc($result))
                    {?>
                        <div class="card">
                            <a href="<?php echo URL; ?>explore/course/<?php echo $rows['id_course']; ?>">
                                <div class="card-image">
                                    <img src="<?php echo URL; ?>Public/img/lesson-placeholder.jpg">
                                </div>
                            <div class="card-content">
                                <h3 class="card-title"><?php echo $rows['course_name']; ?></h3>
                                <p class="card-description"><?php echo $rows['description']; ?></p>
                                <p class="card-category">Category: <?php echo $rows['category_name']; ?></p>
                            </div>
                            </a>
                        </div>
                    <?php
                    }?>
            </section>
        </div>

    </div>
    
    <div id="bottomnav" class="bottomnav">
        <a href="<?php echo URL; ?>learn"><i class="fas fa-book"></i></a>
        <a class="active" href="#"><i class="fas fa-search"></i></a>
        <a href="<?php echo URL; ?>profile"><i class="fas fa-user"></i></a>
        <a href="<?php echo URL; ?>settings"><i class="fas fa-cog"></i></a>
    </div>
</body>