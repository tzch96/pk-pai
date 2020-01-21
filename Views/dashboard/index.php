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
                <li><a href="<?php echo URL; ?>explore">explore</a></li>
                <li><a href="<?php echo URL; ?>profile">profile</a></li>
                <li><a href="<?php echo URL; ?>settings">settings</a></li>
            </ul>
        </nav>
        <a class="topnav-logout" href="#"><i class="fas fa-sign-out-alt"></i></a>
    </header>

    <div class="content">
        <h1>Welcome!</h1>
    </div>
    
    <div id="bottomnav" class="bottomnav">
        <a href="<?php echo URL; ?>learn"><i class="fas fa-book"></i></a>
        <a href="<?php echo URL; ?>explore"><i class="fas fa-search"></i></a>
        <a href="<?php echo URL; ?>profile"><i class="fas fa-user"></i></a>
        <a href="<?php echo URL; ?>settings"><i class="fas fa-cog"></i></a>
    </div>
</body>