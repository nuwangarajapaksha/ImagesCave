<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
include './action/DB_Conn.php';
if (isset($_SESSION["Admin_is_Login"])) {//check is login already setted(already logedin)
    if ($_SESSION["Admin_is_Login"] != true) {//logged in
        header("Location: ./admin_Login.php");
        die();
    }
} else {
    header("Location: ./admin_Login.php");
    die();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin Panel Admins</title>
        <link rel="stylesheet" type="text/css" href="css/adminPanel_AdminsStyle.css"/>
        <link rel="stylesheet" type="text/css" href="css/adminPanel_HeaderStyle.css"/>
        <?php
        if (isset($_GET["msg"])) {
            echo "<script>alert('" . $_GET['msg'] . "');</script>"; // error massage as alert
        }
        if (isset($_GET["msgRegistered"])) {
            echo "<script>alert('" . $_GET["msgRegistered"] . "');</script>"; // error massage as alert
        }
        ?>
    </head>
    <body>
        <div class="adminPanel-header">
            <img src="img/Logo.png" class="adminPanel-header-logo"/>
            <span class="adminPanel-header-title">Admins</span>
            <a href="adminPanel.php"><button class="adminPanel-header-button">Back To Admin Panel</button></a>
        </div>

        </br></br></br></br>

        <div class="adminPanel-admins-area">

            <table class="adminPanel-admins-area-table">



                <tr class="adminPanel-admins-area-table-content">
                    <td>ID</td>
                    <td>Name</td>
                    <td>Username</td>
                    <td>Email</td>
                    <td>Remove</td>                    
                </tr>
                <?php
                $query = "SELECT * FROM `admin`";
                $result = $connection->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr class="adminPanel-admins-area-table-data">
                            <td><?php echo $row["admin_id"]; ?></td>
                            <td><?php echo $row["admin_name"]; ?></td>
                            <td><?php echo $row["admin_username"]; ?></td>
                            <td><?php echo $row["admin_email"]; ?></td>
                            <td><a href="remove_Admin_Checker.php?adminId=<?php echo $row["admin_id"]; ?>"><input type="button" value="Remove" class="adminPanel-admins-area-table-removeButton"/></a></td>
                        </tr>
                    <?php
                    }
                }
                ?>

                <tr class="adminPanel-admins-area-table-addNewAdmin">
                    <td>+</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><a href="register_Admin_Checker.php"><button class="adminPanel-admins-area-table-addNewAdmin-button">Add New Admin</button></a></td>
                </tr>

            </table>

        </div>

        </br></br></br></br>

        <?php
        include './footer.php';
        ?>
    </body>
</html>
