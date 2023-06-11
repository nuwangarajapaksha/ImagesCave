<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Imagescave</title>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <?php
        if (isset($_GET["msgUpdate"])) {
            echo "<script>alert('" . $_GET["msgUpdate"] . "');</script>"; // error massage as alert
        }
        ?>
    </head>
    <body>
        <?php
        include './header.php';
        ?>
        </br></br></br>
        <div class="slider-area">

            <div class="slider">
                <?php
                include './slider.php';
                ?>    
            </div>


            <form method="get" action="search_Main.php" class="search-form">
                <input type="text" name="inSearch" id="inSearch" class="searchBar" placeholder="search photos & illustrations"/>
                <input type="submit" value="Search" class="searchButton"/>
            </form>    

        </div>

        <div class="description-box description-box-1">
            <p class="description-box1-line1">Achieve Your Image Purposes !!!</p>
            <p class="description-box1-line2">Join With Us !!</p>
            <p class="description-box1-line3">Throw Your Images !</p>
        </div>


        <div class="product-area area1">

            <a href="search_Photos.php">
                <div class="product">
                    <img class="product-img" src="img/Img_line1_pic1.jpg"/>
                    <p class="product-description-line1">A lot of Photos</p>
                    <p class="product-description-line2">Choose your photos from thousands of photos</p>
                </div>
            </a>

            <a href="search_Illustrations.php">
                <div class="product">
                    <img class="product-img" src="img/Img_line1_pic2.jpg"/>
                    <p class="product-description-line1">A lot of Illustrations</p>
                    <p class="product-description-line2">Choose your photos from thousands of Illustrations</p>
                </div>
            </a>

            <a href="search_Main.php">
                <div class="product">
                    <img class="product-img" src="img/Img_line1_pic3.jpg"/>
                    <p class="product-description-line1">A lot of Categories</p>
                    <p class="product-description-line2">Choose your photos from thousands of Categories</p>
                </div>         
            </a>
        </div>



        <div class="vertical-line"></div>

        <div class="description-box description-box-2">
            <p class="description-box2-line1">some categories of photos</p>
            <p class="description-box2-line2">You can See Now !</p>

        </div>


        <div class="product-area">

            <a href="search_Photos.php?keyWord=animal">
                <div class="product">
                    <img class="product-img" src="img/Animals_Photo.jpg"/>
                    <p class="product-description-line1">Animals</p>
                </div>
            </a>

            <a href="search_Photos.php?keyWord=nature">
                <div class="product">
                    <img class="product-img" src="img/Nature_Photo.jpg"/>
                    <p class="product-description-line1">Nature</p>
                </div>
            </a>   

            <a href="search_Photos.php?keyWord=landscape">
                <div class="product">
                    <img class="product-img" src="img/Landscape_Photo.jpg"/>
                    <p class="product-description-line1">Landscape</p>
                </div>   
            </a>       

            <a href="search_Photos.php?keyWord=modeling">
                <div class="product">
                    <img class="product-img" src="img/Modeling_Photo.jpg"/>
                    <p class="product-description-line1">Modeling</p>
                </div>
            </a>           

            <a href="search_Photos.php?keyWord=food">
                <div class="product">
                    <img class="product-img" src="img/Food_Photo.jpg"/>
                    <p class="product-description-line1">Food</p>
                </div>
            </a>              

            <a href="search_Photos.php?keyWord=street">
                <div class="product">
                    <img class="product-img" src="img/Street_Photo.jpg"/>
                    <p class="product-description-line1">Street</p>
                </div>
            </a>

        </div>



        <div class="vertical-line"></div>


        <div class="description-box description-box-3">
            <p class="description-box2-line1">some categories of Illustrations</p>
            <p class="description-box2-line2">You can See Now !</p>

        </div>


        <div class="product-area">

            <a href="search_Illustrations.php?keyWord=nature">
                <div class="product">
                    <img class="product-img" src="img/Nature_Illus.jpg"/>
                    <p class="product-description-line1">Nature</p>
                </div>
            </a>

            <a href="search_Illustrations.php?keyWord=animation">
                <div class="product">
                    <img class="product-img" src="img/Animi_Illus.jpg"/>
                    <p class="product-description-line1">Animation</p>
                </div>
            </a>

            <a href="search_Illustrations.php?keyWord=arts">
                <div class="product">
                    <img class="product-img" src="img/Arts_Illus.jpg"/>
                    <p class="product-description-line1">Arts</p>
                </div>  
            </a>

        </div>

        <div class="video-area">
            <center><video controls>
                    <source src="img/ImagesCaveVideo.mp4">
                </video></center>
        </div>

        <div class="vertical-line"></div>

        <div class="description-box description-box-4">
            <p class="description-box2-line1">Suggestions Complaints</p>
            <a href="suggestions_Complaints.php"><button class="description-box-4-button">S&C</button></a>
        </div>

        <div class="vertical-line-topdescription"></div>

        <div class="bottom-description">
            <p>Wedding photographers, Event photographers have many ways to sell their photos. 
                But Landscape, Street, Nature, wildlife, Architecture  photographers and Illustration artists have only a few ways to sell their photos. 
                <span class="bottom-description-tradeName">IMAGESCAVE&trade;</span> gives the solution for it
                This is the platform to sell your  Photos and Illustrations
            </p>
        </div>

        </br></br>
        <?php
        include './footer.php';
        ?>
    </body>
</html>
