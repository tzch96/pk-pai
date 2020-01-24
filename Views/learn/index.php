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
                <li><a class="active" href="#">learn</a></li>
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
            $sql = "SELECT * FROM user_courses WHERE id_user=$idUser";
            
            $result = $conn->query($sql);
        ?>
        
        <div class="dropdown-menu">
            <h1 class="dropdown-button">Choose course <i class="fas fa-caret-down"></i></h1>
            <div class="dropdown-content">
            <?php
                while ($rows = mysqli_fetch_assoc($result))
                {?>
                    <a href="learn/course/<?php echo $rows['id_course']; ?>"><?php echo $rows['course_name']; ?></a>
                <?php
                }?>
            </div>
        </div>

    </div>
    
    <div id="bottomnav" class="bottomnav">
        <a class="active" href="#"><i class="fas fa-book"></i></a>
        <a href="<?php echo URL; ?>explore"><i class="fas fa-search"></i></a>
        <a href="<?php echo URL; ?>profile"><i class="fas fa-user"></i></a>
        <a href="<?php echo URL; ?>settings"><i class="fas fa-cog"></i></a>
    </div>
</body>