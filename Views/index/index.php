<?php include 'Views/header.php'; ?>

<style>
<?php include 'Public/css/style.css'; ?>
</style>

<body>
    <div class="container">
        <?php
            if (isset($_SESSION['userId'])) {
                echo '<script type="text/javascript">',
                'window.location.replace("dashboard");',
                '</script>';
                exit();
            } else {

            }
        ?>
        
        <div class="col2 logo">
                <img src="./Public/img/logo.png">
                <img style="padding-top: 2em;" src="./Public/img/logotext.png">
            </div>
            <div class="col2">
                <?php
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == "emptyfields") {
                            echo '<p>Some fields in the form are missing content, please fill it again.</p>';
                        } else if ($_GET['error'] == "invalidemailandusername") {
                            echo '<p>The email and username you entered are invalid.</p>';
                        } else if ($_GET['error'] == "invalidemail") {
                            echo '<p>The email you entered is invalid.</p>';
                        } else if ($_GET['error'] == "invalidusername") {
                            echo '<p>The username you entered is invalid. Supported characters are: a-z, A-Z, 0-9</p>';
                        } else if ($_GET['error'] == "passwordcheck") {
                            echo '<p>Your passwords do not match.</p>';
                        } else if ($_GET['error'] == "usernametaken") {
                            echo '<p>This username is already taken.</p>';
                        } else if ($_GET['error'] == "nouser") {
                            echo '<p>This user does not exist.</p>';
                        }
                    } else if ($_GET['signup'] == "success") {
                        echo '<p>Registration successful - you can now log in.</p>';
                    }
                ?>

                <div class="signup-container">
                    <div class="tabgroup">
                        <div onclick="hideError()" class="login-tab">login</div>
                        <div onclick="hideError()" class="signup-tab">sign up</div>
                    </div>
                    <div class="error-message" id="error-message"></div>
    
                    <div class="login-form">
                        <form id="login-form" action="<?php echo URL; ?>Includes/login.inc.php" method="post">
                            <input type="text" id="login-username" name="login-username" class="signup-input" placeholder="Username or E-mail"><br>
                            <input type="password" id="login-password" name="login-password" class="signup-input" placeholder="Password"><br>
                            <button type="submit" name="login-submit" class="signup-button">LOGIN</button>
                        </form>
                        <div class="signup-bottom">
                            <span><a href="#">Forgot Password?</a></span>
                        </div>
                    </div>
    
                    <div class="signup-form">
                        <form id="signup-form" action="<?php echo URL; ?>Includes/signup.inc.php" method="post">
                            <input type="text" id="signup-username" name="signup-username" class="signup-input" value="<?php if (isset($_GET['signup-username'])){echo($_GET['signup-username']);}?>" placeholder="Username"><br>
                            <input type="text" id="signup-email" name="signup-email" class="signup-input" value="<?php if (isset($_GET['signup-email'])){echo($_GET['signup-email']);}?>" placeholder="E-mail">
                            <input type="password" id="signup-password" name="signup-password" class="signup-input" placeholder="Password"><br>
                            <input type="password" id="signup-password-repeat" name="signup-password-repeat" class="signup-input" placeholder="Repeat Password"><br>
                            <button type="submit"  name="signup-submit" class="signup-button">SIGN UP</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <script src="<?php echo URL; ?>Public/js/loginFormHideShow.js"></script>
    <script src="<?php echo URL; ?>Public/js/loginFormValidate.js"></script>
</body>