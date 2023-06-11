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
        <title>Admin Panel Buyers</title>
        <link rel="stylesheet" type="text/css" href="css/adminPanel_BuyersStyle.css"/>
        <link rel="stylesheet" type="text/css" href="css/adminPanel_HeaderStyle.css"/>
        <?php
        if (isset($_GET["msg"])) {
            echo "<script>alert('" . $_GET['msg'] . "');</script>"; // error massage as alert
        }
        ?>
    </head>
    <body>
<?php ?>

        <div class="adminPanel-header">
            <img src="img/Logo.png" class="adminPanel-header-logo"/>
            <span class="adminPanel-header-title">Buyers</span>
            <a href="adminPanel.php"><button class="adminPanel-header-button">Back To Admin Panel</button></a>
        </div>

        </br></br></br></br>


        <div class="adminPanel-buyers-area">

            <table class="adminPanel-buyers-area-table">

                <tr class="adminPanel-buyers-area-table-content">
                    <td>ID</td>
                    <td>Name</td>
                    <td>Username</td>
                    <td>Email</td>
                    <td>Remove</td>                    
                </tr>
                <?php
                $query = "SELECT * FROM `buyer`";
                $result = $connection->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr class="adminPanel-buyers-area-table-data">
                            <td><?php echo $row["buyer_id"]; ?></td>
                            <td><?php echo $row["buyer_name"]; ?></td>
                            <td><?php echo $row["buyer_username"]; ?></td>
                            <td><?php echo $row["buyer_email"]; ?></td>
                            <td><a href="action/remove_Buyer.php?id=<?php echo $row["buyer_id"]; ?>"><input type="button" value="Remove" class="adminPanel-buyers-area-table-removeButton"/></a></td>
                        </tr>
                    <?php }
                }
                ?>

            </table>

        </div>

        </br></br></br></br>

        <?php
        include './footer.php';
        ?>
    </body>
</html>
