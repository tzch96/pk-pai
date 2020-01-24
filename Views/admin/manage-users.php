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
                <li><a class="active" href="<?php echo URL; ?>admin/users">users</a></li>
                <li><a href="<?php echo URL; ?>admin/courses">courses</a></li>
            </ul>
        </nav>
        <form action="<?php echo URL; ?>Includes/logout.inc.php" method="post">
            <button type="submit" class="topnav-logout" name="logout-submit"><i class="fas fa-sign-out-alt"></i></button>
        </form>
    </header>

    <div class="content">
        <h1 style="padding-bottom: 0.5em;">User management</h1>

        <?php
            $sql = "SELECT * FROM users";
            $result = $conn->query($sql);
        ?>

        <table id="users_table" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>E-mail</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($rows = mysqli_fetch_assoc($result))
                    {?>
                        <tr>
                            <td><?php echo $rows['id_user']?></td>
                            <td><?php echo $rows['username']?></td>
                            <td><?php echo $rows['email']?></td>
                            <td><?php echo $rows['role']?></td>
                            <td><a href="<?php echo URL; ?>admin/deleteUser/<?php echo $rows['id_user'];?>"><i class="fas fa-user-times"></i></td>
                        </tr>
                    <?php
                }?>
            </tbody>
        </table>

        <h4><?php echo $this->msg; ?></h4>

        <h4>Add user</h4>
        <div style="width: 25%;">
            <form action="<?php echo URL; ?>admin/addUser" method="post">
                <input class="signup-input" type="text" name="username" placeholder="Username"></input>
                <input class="signup-input" type="email" name="email" placeholder="Email"></input>
                <input class="signup-input" type="password" name="password" placeholder="Password"></input>
                <input class="signup-input" type="text" name="role" placeholder="Role (user / admin)"></input>
                <button class="signup-button" type="signup" type="submit">Add</button>
            </form>
        </div>
    </div>
    
    <div id="bottomnav" class="bottomnav">
        <a href="<?php echo URL; ?>admin"><i class="fas fa-home"></i></a>
        <a class="active" href="<?php echo URL; ?>admin/users"><i class="fas fa-user"></i></a>
        <a href="<?php echo URL; ?>admin/courses"><i class="fas fa-book"></i></a>
    </div>

    <script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script type="text/javascript">
        $(document).ready( function () {
            $('#users_table').DataTable();
        } );
    </script>
</body>