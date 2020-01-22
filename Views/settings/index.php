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
                <li><a href="<?php echo URL; ?>profile">profile</a></li>
                <li><a class="active" href="#">settings</a></li>
            </ul>
        </nav>
        <form action="<?php echo URL; ?>Includes/logout.inc.php" method="post">
            <button type="submit" class="topnav-logout" name="logout-submit"><i class="fas fa-sign-out-alt"></i></button>
        </form>
    </header>

    <div class="content">
        <div class="header-with-button">
            <h1 class="web-only" style="padding-bottom: 0.5em;">Settings</h1>
            <div class="save-button">
                <form action="/">
                    <div class="item">
                        <button type="submit"><i class="fas fa-check"></i></button>
                    </div>
                    <div class="item">
                        <h2>Save</h2>
                    </div>
                </form>
            </div>
        </div>

        <div class="settings-container">
            <form action="/">
                <div class="settings-row">
                    <div class="col-25">
                        <label for="login">Username:</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="login" name="login" placeholder="Username">
                    </div>
                <div class="settings-row">
                    <div class="col-25">
                        <label for="password">Password:</label>
                    </div>
                    <div class="col-75">
                        <input type="password" id="password" name="password" placeholder="Password">
                    </div>
                </div>
                <div class="settings-row">
                    <div class="col-25">
                        <label for="password">Repeat Password:</label>
                    </div>
                    <div class="col-75">
                        <input type="password" id="password" name="password" placeholder="Repeat Password">
                    </div>
                </div>
                <div class="settings-row">
                    <div class="col-25">
                        <label for="description">Profile description:</label>
                    </div>
                    <div class="col-75">
                        <textarea style="resize: none;" id="description" name="description" placeholder="Profile description"></textarea>
                    </div>
                </div>
                <div class="settings-row">
                    <div class="col-25">
                        <label for="location">Location:</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="location" name="location" placeholder="Location">
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>
    
    <div id="bottomnav" class="bottomnav">
        <a href="<?php echo URL; ?>learn"><i class="fas fa-book"></i></a>
        <a href="<?php echo URL; ?>explore"><i class="fas fa-search"></i></a>
        <a href="<?php echo URL; ?>profile"><i class="fas fa-user"></i></a>
        <a class="active" href="#"><i class="fas fa-cog"></i></a>
    </div>
</body>