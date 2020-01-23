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
                <li><a class="active" href="<?php echo URL; ?>explore">explore</a></li>
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
            $sql = "SELECT courses.id_course, categories.category_name, courses.course_name, courses.description FROM courses INNER JOIN categories ON categories.id_category=courses.id_category WHERE courses.id_course=$this->idCourse";
            $result = $conn->query($sql);
            $rows = mysqli_fetch_assoc($result);
        ?>

        <div class="header-with-button">
            <h1 style="padding-bottom: 0.5em;"><?php echo $rows['course_name']; ?></h1>
            <div class="save-button">
                <form action="/">
                    <div class="item">
                        <!-- TODO make a proper start course function -->
                        <h2><a style="color: #fff;" href="start">Start</a></h2>
                    </div>
                    <div class="item">
                        <button type="submit"><i class="fas fa-play"></i></button>
                    </div>
                </form>
            </div>
        </div>

        <div class="profile-grid">
            <div class="box">
                <h4>Description</h4>
                <p class="profile-description"><?php echo $rows['description']; ?></p>
            </div>
            <div class="box">
                <h4>Category</h4>
                <p class="profile-description"><?php echo $rows['category_name']; ?></p>
            </div>
            <div class="box">
                <!-- TODO add requirements to course table in database and put them here -->
                <h4>Requirements</h4>
                <p class="profile-description">No requirements.</p></div>
            <div class="box">
                <div class="slideshow-container">
                    <div class="slides fade">
                        <img src="<?php echo URL; ?>Public/img/placeholder.jpg" style="width:100%;">
                    </div>
                    <div class="slides fade">
                        <img src="<?php echo URL; ?>Public/img/placeholder-alt.jpg" style="width:100%;">
                    </div>

                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
            </div>
        </div>
    </div>
    
    <div id="bottomnav" class="bottomnav">
        <a href="<?php echo URL; ?>learn"><i class="fas fa-book"></i></a>
        <a class="active" href="<?php echo URL; ?>explore"><i class="fas fa-search"></i></a>
        <a href="<?php echo URL; ?>profile"><i class="fas fa-user"></i></a>
        <a href="<?php echo URL; ?>settings"><i class="fas fa-cog"></i></a>
    </div>

    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("slides");
            if (n > slides.length) {
                slideIndex = 1;
            }
            if (n < 1) {
                slideIndex = slides.length;
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slides[slideIndex - 1].style.display = "block";
        }
    </script>
</body>