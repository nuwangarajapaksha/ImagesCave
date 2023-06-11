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
        <title>Admin Panel S&C</title>
        <link rel="stylesheet" type="text/css" href="css/adminPanel_S&CStyle.css"/>
        <link rel="stylesheet" type="text/css" href="css/adminPanel_HeaderStyle.css"/>
        <?php
        if (isset($_GET["msg"])) {
            echo "<script>alert('" . $_GET['msg'] . "');</script>"; // error massage as alert
        }
        ?>
    </head>
    <body>
        <div class="adminPanel-header">
            <img src="img/Logo.png" class="adminPanel-header-logo"/>
            <span class="adminPanel-header-title">S&C</span>
            <a href="adminPanel.php"><button class="adminPanel-header-button">Back To Admin Panel</button></a>
        </div>

        </br></br></br></br>


        <div class="adminPanel-sc-area">

            <table class="adminPanel-sc-area-table">

                <tr class="adminPanel-sc-area-table-content">
                    <td>ID</td>
                    <td>visitor</td>
                    <td>Suggestions & Complaints</td>
                    <td>Remove</td>                    
                </tr>
                <?php
                $query = "SELECT * FROM `s&c`";
                $result = $connection->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr class="adminPanel-sc-area-table-data">
                            <td><?php echo $row["s&c_id"]; ?></td>
                            <td><?php echo $row["s&c_visitor_name"]; ?></td>
                            <td><?php echo $row["s&c_details"]; ?></td>
                            <td><a href="action/remove_S&C.php?id=<?php echo $row["s&c_id"]; ?>"><input type="button" value="Remove" class="adminPanel-sc-area-table-removeButton"/></a></td>
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
