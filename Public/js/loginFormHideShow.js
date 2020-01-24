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
});