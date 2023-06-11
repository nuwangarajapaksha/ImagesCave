<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include './action/DB_Conn.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>S&C</title>
        <link rel="stylesheet" type="text/css" href="css/suggestions_ComplaintsStyle.css"/>
        <?php
        if (isset($_GET["msgSent"])) {
            echo "<script>alert('" . $_GET["msgSent"] . "');</script>"; // error massage as alert
        }
        ?>
    </head>
    <body>
        <?php
        include './header.php';
        ?>
        </br></br></br></br></br>
        <div class="sc-area">

            <p class="sc-area-title">Give Your suggestions & Complaints</p>

            <form method="post" action="action/suggestions_Complaints_Uploader.php">
                <?php
                if (isset($_SESSION["activeBuyerId"])) {
                    $activeBuyerId = $_SESSION["activeBuyerId"];
                    $query = "SELECT * FROM `buyer` WHERE `buyer_id` = '" . $activeBuyerId . "'";
                    $result = $connection->query($query);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        ?>
                        <input type="text" name="visitorName" id="visitorName" value="<?php echo $row["buyer_name"]; ?>" class="sc-area-input input-visitorName" />
                        <?php
                    }
                } elseif (isset($_SESSION["sellerIDPass"])) {
                    $activeSellerId = $_SESSION["sellerIDPass"];
                    $query = "SELECT * FROM `seller` WHERE `seller_id` = '" . $activeSellerId . "'";
                    $result = $connection->query($query);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        ?>
                        <input type="text" name="visitorName" id="visitorName" value="<?php echo $row["seller_name"]; ?>" class="sc-area-input input-visitorName" />
                        <?php
                    }
                } else {
                    ?>
                    <input type="text" name="visitorName" id="visitorName" placeholder="Name" class="sc-area-input input-visitorName" />
                <?php } ?>
                </br>
                <textarea name="scDetails" id="scDetails" placeholder="suggestions & Complaints" class="sc-area-input input-scDetails" required></textarea>

<!--                    <input type="text" name="scDetails" id="scDetails" placeholder="suggestions & Complaints" class="sc-area-input input-scDetails" required/>-->
                </br>
                <input type="submit" value="Send" class="sc-area-button"/>
            </form>

        </div>

        </br> 

        <div class="sc-sow-area">

            <table class="sc-sow-area-table">

                <tr class="sc-sow-area-table-content">   
                    <td>visitor</td>
                    <td>Suggestions & Complaints</td>                    
                </tr>
                <?php
                $query = "SELECT * FROM `s&c`";
                $result = $connection->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr class="sc-sow-area-table-data">    
                            <td><?php echo $row["s&c_visitor_name"]; ?></td>
                            <td><?php echo $row["s&c_details"]; ?></td>  
                        </tr>
                    <?php }
                }
                ?>

            </table>

        </div>

        </br></br></br>
        <?php
        include './footer.php';
        ?>
    </body>
</html>
