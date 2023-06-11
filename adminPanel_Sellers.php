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
        <title>Admin Panel Sellers</title>
        <link rel="stylesheet" type="text/css" href="css/adminPanel_sellersStyle.css"/>
        <link rel="stylesheet" type="text/css" href="css/adminPanel_HeaderStyle.css"/>
        <?php
        if (isset($_GET["msg"])) {
            echo "<script>alert('" . $_GET['msg'] . "');</script>"; // error massage as alert
        }
        ?>
    </head>
    <body>
        <?php
        ?>

        <div class="adminPanel-header">
            <img src="img/Logo.png" class="adminPanel-header-logo"/>
            <span class="adminPanel-header-title">Sellers</span>
            <a href="adminPanel.php"><button class="adminPanel-header-button">Back To Admin Panel</button></a>
        </div>

        </br></br></br></br>


        <div class="adminPanel-sellers-area">

            <table class="adminPanel-sellers-area-table">

                <tr class="adminPanel-sellers-area-table-content">
                    <td>Pic</td>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Username</td>
                    <td>Country</td>
                    <td>More...</td>
                    <td>Remove</td>                    
                </tr>
                <?php
                $query = "SELECT * FROM `seller`";
                $result = $connection->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr class="adminPanel-sellers-area-table-data">
                            <td><div class="adminPanel-sellers-area-table-ppic-area"><img class="adminPanel-sellers-area-table-data-ppic" src="img/<?php echo $row["seller_ppic"]; ?>"/></div></td>
                            <td><?php echo $row["seller_id"]; ?></td>
                            <td><?php echo $row["seller_name"]; ?></td>
                            <td><?php echo $row["seller_username"]; ?></td>
                            <td><?php echo $row["seller_country"]; ?></td>
                            <td><a href="adminPanel_SellerReport.php?id=<?php echo $row["seller_id"]; ?>"><input type="button" value="More..." class="adminPanel-sellers-area-table-button button-more"/></a></td>
                            <td><a href="action/remove_Seller.php?id=<?php echo $row["seller_id"]; ?>"><input type="button" value="Remove" class="adminPanel-sellers-area-table-button button-remove"/></a></td>
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
