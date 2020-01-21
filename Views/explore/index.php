<?php include 'Views/header.php'; ?>

<style>
<?php include 'Public/css/style.css'; ?>
</style>

<body>
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
        <a class="topnav-logout" href="#"><i class="fas fa-sign-out-alt"></i></a>
    </header>

    <div class="content">
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
                <div class="card">
                    <a href="#">
                        <div class="card-image">
                            <img src="<?php echo URL; ?>Public/img/lesson-placeholder.jpg">
                        </div>
                        <div class="card-content">
                            <h3 class="card-title">Course 1</h3>
                            <p class="card-description">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                            <p class="card-category">Category: X</p>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="#">
                        <div class="card-image">
                            <img src="<?php echo URL; ?>Public/img/lesson-placeholder.jpg">
                        </div>
                        <div class="card-content">
                            <h3 class="card-title">Course 2</h3>
                            <p class="card-description">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                            <p class="card-category">Category: X</p>
                        </div>
                    </a>
                </div>
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