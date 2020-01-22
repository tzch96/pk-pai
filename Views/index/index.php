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
                        }
                    } else if ($_GET['signup'] == "success") {
                        echo '<p>Registration successful - you can now log in.</p>';
                    }
                ?>

                <div class="signup-container">
                    <div class="tabgroup">
                        <div class="login-tab">login</div>
                        <div class="signup-tab">sign up</div>
                    </div>
    
                    <div class="login-form">
                        <form action="<?php echo URL; ?>Includes/login.inc.php" method="post">
                            <input type="text" name="login-username" class="signup-input" placeholder="Username or E-mail"><br>
                            <input type="password" name="login-password" class="signup-input" placeholder="Password"><br>
                            <button type="submit" name="login-submit" class="signup-button">LOGIN</button>
                        </form>
                        <div class="signup-bottom">
                            <span><a href="#">Forgot Password?</a></span>
                        </div>
                    </div>
    
                    <div class="signup-form">
                        <form action="<?php echo URL; ?>Includes/signup.inc.php" method="post">
                            <input type="text" name="signup-username" class="signup-input" value="<?php if (isset($_GET['signup-username'])){echo($_GET['signup-username']);}?>" placeholder="Username"><br>
                            <input type="text" name="signup-email" class="signup-input" value="<?php if (isset($_GET['signup-email'])){echo($_GET['signup-email']);}?>" placeholder="E-mail">
                            <input type="password" name="signup-password" class="signup-input" placeholder="Password"><br>
                            <input type="password" name="signup-password-repeat" class="signup-input" placeholder="Repeat Password"><br>
                            <button type="submit"  name="signup-submit" class="signup-button">SIGN UP</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <script>
        $(document).ready(function() {
            $(".signup-form").hide();
            $(".signup-tab").css("color", "rgba(255, 255, 255, 0.5)");

            $(".login-tab").click(function() {
                $(".signup-form").slideUp();
                $(".login-form").slideDown();
                $(".signup-tab").css("color", "rgba(255, 255, 255, 0.5)");
                $(".login-tab").css("color", "rgba(255, 255, 255, 1)");
            });

            $(".signup-tab").click(function() {
                $(".login-form").slideUp();
                $(".signup-form").slideDown();
                $(".login-tab").css("color", "rgba(255, 255, 255, 0.5)");
                $(".signup-tab").css("color", "rgba(255, 255, 255, 1)");
            });

            // $(".signup-button").click(function() {
            //     $(".signup-input").val("");
            // })
        });
    </script>
</body>