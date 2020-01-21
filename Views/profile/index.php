<?php include 'Views/header.php'; ?>

<style>
<?php include 'Public/css/style.css'; ?>
</style>

<body>
    <header class="topnav">
        <a href="index"><img class="topnav-logo" src="Public/img/logo.png"><img class="topnav-logo" src="Public/img/logotext.png"></a>
        <nav>
            <ul class="topnav-links">
                <li><a href="learn">learn</a></li>
                <li><a href="explore">explore</a></li>
                <li><a class="active" href="#">profile</a></li>
                <li><a href="settings">settings</a></li>
            </ul>
        </nav>
        <a class="topnav-logout" href="#"><i class="fas fa-sign-out-alt"></i></a>
    </header>

    <div class="content">
        <h1 style="padding-bottom: 0.5em;">Your profile</h1>

        <div class="profile-grid">
            <div class="box">
                <div class="profile-info">
                    <img style="width: 3em;" src="Public/img/user-icon.png">
                    <div class="user-info">
                        <h4>Name Surname</h4>
                        <h5>Location</h5>
                    </div>
                </div>
                <p class="profile-description">Optional profile description.</p>
            </div>
            <div class="box">
                <h4>Completed courses</h4>
                <p class="profile-description">Nothing to show here. Go to the <a href="explore">Explore</a> page to find interesting courses!</p>
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
        <a href="learn"><i class="fas fa-book"></i></a>
        <a href="explore"><i class="fas fa-search"></i></a>
        <a class="active" href="#"><i class="fas fa-user"></i></a>
        <a href="settings"><i class="fas fa-cog"></i></a>
    </div>
</body>