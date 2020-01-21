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
                <li><a href="profile">profile</a></li>
                <li><a class="active" href="#">settings</a></li>
            </ul>
        </nav>
        <a class="topnav-logout" href="#"><i class="fas fa-sign-out-alt"></i></a>
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
                        <label for="email">Email address:</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="email" name="email" placeholder="Email">
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
        <a href="learn"><i class="fas fa-book"></i></a>
        <a href="explore"><i class="fas fa-search"></i></a>
        <a href="profile"><i class="fas fa-user"></i></a>
        <a class="active" href="#"><i class="fas fa-cog"></i></a>
    </div>
</body>