<?php include 'Views/header.php'; ?>

<style>
<?php include 'Public/css/style.css'; ?>
</style>

<body>
    <div class="container">
        <div class="col2 logo">
            <img src="Public/img/logo.png">
            <img style="padding-top: 2em;" src="Public/img/logotext.png">
        </div>
        <div class="col2">
            <div class="signup-container">
                <div class="tabgroup">
                    <div class="login-tab">login</div>
                    <div class="signup-tab">sign up</div>
                </div>

                <div class="login-form">
                    <input type="email" class="signup-input" placeholder="Email"><br>
                    <input type="password" class="signup-input" placeholder="Password"><br>
                    <div class="signup-button">LOGIN</div>
                    <div class="signup-bottom">
                        <span><a href="#">Forgot Password?</a></span>
                    </div>
                </div>

                <div class="signup-form">
                    <input type="email" class="signup-input" placeholder="Email"><br>
                    <input type="password" class="signup-input" placeholder="Password"><br>
                    <input type="password" class="signup-input" placeholder="Repeat Password"><br>
                    <div class="signup-button">SIGN UP</div>
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

            $(".signup-button").click(function() {
                $(".signup-input").val("");
            })
        });
    </script>
</body>