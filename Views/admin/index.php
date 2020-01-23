<?php include_once 'Includes/dbh.inc.php' ?>

<?php include 'Views/header.php'; ?>

<style>
<?php include 'Public/css/style.css'; ?>
</style>

<body>

    <?php
        if (!isset($_SESSION['userId']) || ($_SESSION['userRole'] != "admin")) {
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
                <li><a class="active" href="<?php echo URL; ?>admin">home</a></li>
                <li><a href="<?php echo URL; ?>admin/users">users</a></li>
                <li><a href="<?php echo URL; ?>admin/courses">courses</a></li>
            </ul>
        </nav>
        <form action="<?php echo URL; ?>Includes/logout.inc.php" method="post">
            <button type="submit" class="topnav-logout" name="logout-submit"><i class="fas fa-sign-out-alt"></i></button>
        </form>
    </header>

    <div class="content">
        <h1 style="padding-bottom: 0.5em;">Welcome!</h1>
        <h1>You are logged in as the administrator.</h1>
    </div>
    
    <div id="bottomnav" class="bottomnav">
        <a class="active" href="<?php echo URL; ?>admin"><i class="fas fa-home"></i></a>
        <a href="<?php echo URL; ?>admin/users"><i class="fas fa-user"></i></a>
        <a href="<?php echo URL; ?>admin/courses"><i class="fas fa-book"></i></a>
    </div>
</body>