<?php include 'Views/header.php'; ?>

<style>
<?php include 'Public/css/style.css'; ?>
</style>

<body>
    <div class="container">
        <div class="col2 logo">
            <img src="<?php echo URL; ?>Public/img/logo.png">
            <img style="padding-top: 2em;" src="<?php echo URL; ?>Public/img/logotext.png">
        </div>
        <div class="col2">
            <div class="signup-container">
                <div class="tabgroup">
                    <div class="login-tab">login</div>
                    <div class="signup-tab">sign up</div>
                </div>

                <div class="login-form">
                    <form action="index/login" method="post">
                        <input type="text" name="login" class="signup-input" placeholder="Username"><br>
                        <input type="password" name="password" class="signup-input" placeholder="Password"><br>
                        <button type="submit" class="signup-button">LOGIN</button>
                    </form>
                    <div class="signup-bottom">
                        <span><a href="#">Forgot Password?</a></span>
                    </div>
                </div>

                <div class="signup-form">
                    <form action="index/signup" method="post">
                        <input type="text" class="signup-input" placeholder="Username"><br>
                        <input type="password" class="signup-input" placeholder="Password"><br>
                        <input type="password" class="signup-input" placeholder="Repeat Password"><br>
                        <button type="submit" class="signup-button">SIGN UP</button>
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
                $(".signup-form").hide();
                $(".login-form").show();
                $(".signup-tab").css("color", "rgba(255, 255, 255, 0.5)");
                $(".login-tab").css("color", "rgba(255, 255, 255, 1)");
            });

            $(".signup-tab").click(function() {
                $(".signup-form").show();
                $(".login-form").hide();
                $(".login-tab").css("color", "rgba(255, 255, 255, 0.5)");
                $(".signup-tab").css("color", "rgba(255, 255, 255, 1)");
            });

            // $(".signup-button").click(function() {
            //     $(".signup-input").val("");
            // })
        });
    </script>
</body>