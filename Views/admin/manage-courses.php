<?php include 'Includes/dbh.inc.php' ?>

<?php include 'Views/header.php'; ?>

<style>
<?php include 'Public/css/style.css'; ?>
</style>

<body>

    <?php
        if (!isset($_SESSION['userId']) || ($_SESSION['userRole'] != "admin")) {
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
                <li><a href="<?php echo URL; ?>admin">home</a></li>
                <li><a href="<?php echo URL; ?>admin/users">users</a></li>
                <li><a class="active" href="<?php echo URL; ?>admin/courses">courses</a></li>
            </ul>
        </nav>
        <form action="<?php echo URL; ?>Includes/logout.inc.php" method="post">
            <button type="submit" class="topnav-logout" name="logout-submit"><i class="fas fa-sign-out-alt"></i></button>
        </form>
    </header>

    <div class="content">
        <h1 style="padding-bottom: 0.5em;">Course management</h1>

        <?php
            $sql = "SELECT courses.id_course, categories.category_name, courses.course_name, courses.description FROM courses INNER JOIN categories ON categories.id_category=courses.id_category";
            $result = $conn->query($sql);
        ?>

        <table id="users_table" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($rows = mysqli_fetch_assoc($result))
                    {?>
                        <tr>
                            <td><?php echo $rows['id_course']?></td>
                            <td><?php echo $rows['category_name']?></td>
                            <td><?php echo $rows['course_name']?></td>
                            <td><?php echo $rows['description']?></td>
                            <td><a href="<?php echo URL; ?>admin/deleteCourse/<?php echo $rows['id_course'];?>"><i class="fas fa-trash"></i></td>
                        </tr>
                    <?php
                }?>
            </tbody>
        </table>

        <h4><?php echo $this->msg; ?></h4>
    </div>
    
    <div id="bottomnav" class="bottomnav">
        <a href="<?php echo URL; ?>admin"><i class="fas fa-home"></i></a>
        <a href="<?php echo URL; ?>admin/users"><i class="fas fa-user"></i></a>
        <a class="active" href="<?php echo URL; ?>admin/courses"><i class="fas fa-book"></i></a>
    </div>

    <script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script type="text/javascript">
        $(document).ready( function () {
            $('#users_table').DataTable();
        } );
    </script>
</body>