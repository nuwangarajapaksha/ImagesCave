<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/sliderStyle.css"/>
</head>
<body>

<div class="slideshow-container">

<div class="mySlides fade">
    <img src="img/Slide_1.jpg" class="slider-img">
</div>

<div class="mySlides fade">
    <img src="img/Slide_2.jpg" class="slider-img">
</div>

<div class="mySlides fade">
    <img src="img/Slide_3.jpg" class="slider-img">
</div>
<div class="mySlides fade">
    <img src="img/Slide_4.jpg" class="slider-img">
</div>
<div class="mySlides fade">
    <img src="img/Slide_5.png" class="slider-img">
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
  <span class="dot" onclick="currentSlide(4)"></span>
  <span class="dot" onclick="currentSlide(5)"></span>
</div>





<script type="text/javascript" src="script.js"></script>

</body>
</html> 
