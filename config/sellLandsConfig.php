<?php
// connect database
include_once("./databaseConfig.php");


// Check If form submitted
if(isset($_POST['Submit'])) {
    $title = $_POST['title'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $id = $_POST['id'];

    
// Insert user data into table
    $result = mysqli_query($conn, "INSERT INTO land(l_title,l_location,l_price,l_imgLoc,sellerID) 
                                   VALUES('$title','$location','$price','default','$id')");
    

    header("location: ../sellerDashboard.php");
    exit;
    }
    ?>