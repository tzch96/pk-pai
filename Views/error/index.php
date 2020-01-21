<?php include 'Views/header.php'; ?>

<style>
<?php include 'Public/css/style.css'; ?>
</style>

<body>
    <div class="container">
        <div class="col2">
            <img style="width: 50%;" src="../Public/img/error-404.svg" class="filter-white">
        </div>
        <div class="col2">
            <h1 class="notfound-header">Oops!</h1>
            <p class="notfound-text"><?php echo $this->msg;  ?></p>
            <p class="notfound-text"><a href="index">Go to the home page</a></p>
        </div>
    </div>
</body>