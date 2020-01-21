<?php include 'Views/header.php'; ?>

<style>
<?php include 'Public/css/style.css'; ?>
</style>

<body>
    <header class="topnav">
        <a href="index"><img class="topnav-logo" src="Public/img/logo.png"><img class="topnav-logo" src="Public/img/logotext.png"></a>
        <nav>
            <ul class="topnav-links">
                <li><a class="active" href="#">learn</a></li>
                <li><a href="explore">explore</a></li>
                <li><a href="profile">profile</a></li>
                <li><a href="settings">settings</a></li>
            </ul>
        </nav>
        <a class="topnav-logout" href="#"><i class="fas fa-sign-out-alt"></i></a>
    </header>

    <div class="content">
        <div class="dropdown-menu">
            <h1 class="dropdown-button">Choose course <i class="fas fa-caret-down"></i></h1>
            <div class="dropdown-content">
                <a href="#">Course 1</a>
                <a href="#">Course 2</a>
            </div>
        </div>

        <h1 style="padding-top: 1em;">Current course: Placeholder <span style="float: right;">50%</span></h1>

        <h1 style="padding-top: 1em; padding-bottom: 0.5em;">Lessons</h1>

        <div class="grid">
            <section class="cards">
                <div class="card">
                    <a href="#">
                        <div class="card-image">
                            <img src="Public/img/lesson-placeholder.jpg">
                        </div>
                        <div class="card-content">
                            <h3 class="card-title">Lesson 1</h3>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="#">
                        <div class="card-image">
                            <img src="Public/img/lesson-placeholder.jpg">
                        </div>
                        <div class="card-content">
                            <h3 class="card-title">Lesson 2</h3>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="#">
                        <div class="card-image">
                            <img src="Public/img/lesson-placeholder.jpg">
                        </div>
                        <div class="card-content">
                            <h3 class="card-title">Lesson 3</h3>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="#">
                        <div class="card-image">
                            <img src="Public/img/lesson-placeholder.jpg">
                        </div>
                        <div class="card-content">
                            <h3 class="card-title">Lesson 4</h3>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="#">
                        <div class="card-image">
                            <img src="Public/img/lesson-placeholder.jpg">
                        </div>
                        <div class="card-content">
                            <h3 class="card-title">Lesson 5</h3>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="#">
                        <div class="card-image">
                            <img src="Public/img/lesson-placeholder.jpg">
                        </div>
                        <div class="card-content">
                            <h3 class="card-title">Lesson 6</h3>
                        </div>
                    </a>
                </div>
            </section>
        </div>

    </div>
    
    <div id="bottomnav" class="bottomnav">
        <a class="active" href="learn"><i class="fas fa-book"></i></a>
        <a href="explore"><i class="fas fa-search"></i></a>
        <a href="profile"><i class="fas fa-user"></i></a>
        <a href="settings"><i class="fas fa-cog"></i></a>
    </div>
</body>