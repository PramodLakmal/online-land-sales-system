<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/home.css">
    <!-- import icons -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
     <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <?php
    // Dynamic Header
    // $title = 'Home'; include("header.php");
?>
  </head>

<body>

    <!-- Image slider code -->
    <div class="slideshow-container">
        <!-- Slide counter -->
        <div class="mySlides fade">
            <div class="numbertext">1 / 4</div>
            <img src="./images/slide/img1.jpg">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 4</div>
            <img src="./images/slide/img2.jpg">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 4</div>
            <img src="./images/slide/img3.jpeg">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">4 / 4</div>
            <img src="./images/slide/img4.jpg">
        </div>

        <!-- Next and previous buttons -->
        <a id="prev" onclick="plusSlides(-1)" class="prev">&#10094;</a>
        <a id="next" onclick="plusSlides(1)" class="next">&#10095;</a>

        <!-- The dots/circles -->
        <div class="beacons" style="text-align:center">
            <span id="d-one" class="dot" onclick="currentSlide(1)"></span>
            <span id="d-two" class="dot" onclick="currentSlide(2)"></span>
            <span id="d-three" class="dot" onclick="currentSlide(3)"></span>
            <span id="d-four" class="dot" onclick="currentSlide(4)"></span>
        </div>
    </div>

    <div class="city-sector">
        <div class="popular">
            <p>Popular Cities</p>
        </div>
        <div class="city-grid">
            <div class="city" id="c1">
                <div class="pic-container"></div>
                <div class="city-det">
                    <p class="l1">Kegalle</p>
                </div>
            </div>
            <div class="city" id="c2">
                <div class="pic-container"></div>
                <div class="city-det">
                    <p class="l1">Mathara</p>
                </div>
            </div>
            <div class="city" id="c3">
                <div class="pic-container"></div>
                <div class="city-det">
                    <p class="l1">Matale</p>
                </div>
            </div>
            <div class="city" id="c4">
                <div class="pic-container"></div>
                <div class="city-det">
                    <p class="l1">Colombo</p>
                </div>
            </div>
            <div class="city" id="c5">
                <div class="pic-container"></div>
                <div class="city-det">
                    <p class="l1">Nuwara Eliya</p>
                </div>
            </div>
            <div class="city" id="c6">
                <div class="pic-container"></div>
                <div class="city-det">
                    <p class="l1">Galle</p>
                </div>
            </div>
            
        </div>
    </div>
</body>
<?php //require "./footer.php" ?>
<script>
let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
    showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
}

showSlides();
autoshowSlides();

function autoshowSlides() {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
    setTimeout(autoshowSlides, 5000); // Change image every 5 seconds
}
</script>

</html>