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
        <title>Search Illustrations</title>
        <link rel="stylesheet" type="text/css" href="css/searchStyle.css" />
        <?php
        $keyWord = "";
        if (isset($_GET["keyWord"])) {
            $keyWord = ($_GET["keyWord"]);
        } elseif (isset($_GET["inSearch"])) {
            $keyWord = $_GET["inSearch"];
        }
        ?>
    </head>
    <body>
        <?php
        include './header.php';
        ?>
        </br></br></br></br>
        <div class="searchBar-area">
            <form method="get" action="search_Illustrations.php" class="search-form">
                <input type="text" name="inSearch" id="inSearch" value="<?php echo $keyWord; ?>" class="searchBar" placeholder="search illustrations"/>
                <input type="submit" value="Search" class="searchButton"/>
            </form>
        </div>

        <div class="search-area">

            <?php
            $query = "SELECT * FROM `product` WHERE `type_type_id` = (SELECT `type_id` FROM `type` WHERE `type_name` = 'Illustration' ) "
                    . "AND (`product_name` LIKE'%" . $keyWord . "%' "
                    . "OR `category_category_id`=(SELECT `category_id` FROM `category` WHERE `category_name` LIKE '%" . $keyWord . "%')) "
                    . "AND `product_buy_price` != 0 AND `product_sell_price` != 0";
            $result = $connection->query($query);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <a href="viewProduct.php?pid=<?php echo $row["product_id"]; ?>">
                        <div class="search-area-product">
                            <img class="search-area-product-img" src="img/<?php echo $row["product_img_url"]; ?>"/>
                        </div>
                    </a>

                <?php }
            } else {
                ?>
            <div class="searchNotFound-area">
            <p class="searchNotFound-area-header">Sorry, we couldn't find any matches for "<?php echo $keyWord;?>"</p>
            <ul class="searchNotFound-area-ul">
                <li class="searchNotFound-area-li">Make sure the spelling is correct</li>
                <li class="searchNotFound-area-li">Try using a simpler search</li>
            </ul>
            </div>
           <?php } ?>
        </div>



        </br></br></br>
        <?php
        include './footer.php';
        ?>
    </body>
</html>
