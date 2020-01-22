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
                <li><a href="<?php echo URL; ?>explore">explore</a></li>
                <li><a class="active" href="#">profile</a></li>
                <li><a href="<?php echo URL; ?>settings">settings</a></li>
            </ul>
        </nav>
        <form action="<?php echo URL; ?>Includes/logout.inc.php" method="post">
            <button type="submit" class="topnav-logout" name="logout-submit"><i class="fas fa-sign-out-alt"></i></button>
        </form>
    </header>

    <div class="content">
        <h1 style="padding-bottom: 0.5em;">Your profile</h1>

        <div class="profile-grid">
            <div class="box">
                <div class="profile-info">
                    <img style="width: 3em;" src="<?php echo URL; ?>Public/img/user-icon.png">
                    <div class="user-info">
                        <h4>Name Surname</h4>
                        <h5>Location</h5>
                    </div>
                </div>
                <p class="profile-description">Optional profile description.</p>
            </div>
            <div class="box">
                <h4>Completed courses</h4>
                <p class="profile-description">Nothing to show here. Go to the <a href="<?php echo URL; ?>explore">Explore</a> page to find interesting courses!</p>
            </div>
            <div class="box"><p class="profile-description">Member since: 1970-01-01</p></div>
            <div class="box">
                <h4>Courses in progress</h4>
                <ul>
                    <li>Course 1</li>
                    <li>Course 2</li>
                </ul>
            </div>
        </div>
    </div>
    
    <div id="bottomnav" class="bottomnav">
        <a href="<?php echo URL; ?>learn"><i class="fas fa-book"></i></a>
        <a href="<?php echo URL; ?>explore"><i class="fas fa-search"></i></a>
        <a class="active" href="#"><i class="fas fa-user"></i></a>
        <a href="<?php echo URL; ?>settings"><i class="fas fa-cog"></i></a>
    </div>
</body>