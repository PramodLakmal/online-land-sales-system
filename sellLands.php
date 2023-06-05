<html lang="en">
<head>
	<meta charset="utf-8">
    <?php 
    //dynamic header
    $title = 'Sell Lands'; include("header.php");
    // Check if user is a seller
    include("./seller/sellerConfig.php");

    ?> 

<link rel="stylesheet" href="./css/sellLands.css">

</head>

 
	
<body>

<div class="main_title">
    <h1>Sell Your Lands</h1>
</div>
<div class=sellLands> 
  <form method="post" action="./config/contactUsConfig.php"  onsubmit="return validateForm();">
    
    <div class="input_field">
    <label for="name">Enter Title For Your Land</label>
    <input type="text" id="title" name="title" required>
    </div>

    <div class="input_field">
    <label for="Email">Enter Location</label>
    <input type="text" id="location" name="location" required>
    </div>

    <div class="input_field">
	<label for="phone">Enter Price</label>
	<input type="text"  id="price" name="price" required>
    </div>

    <div class="input_field">
    <input type="submit" class="btn" name="Submit" value="SUBMIT"/>
    </div>
	

  </form>

</div>
	
<script src="./js/contactUs.js"></script>

<?php include("footer.php"); ?>







