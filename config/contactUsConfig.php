<?php
// connect database
include_once("./databaseConfig.php");


// Check If form submitted, insert form data into users table.
if(isset($_POST['Submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $message = $_POST['message'];
    
    


    
// Insert user data into table
    $result = mysqli_query($conn, "INSERT INTO contactus(name,email,mobile,message) VALUES('$name','$email','$mobile','$message')");
    
    
// Show message when data added successfully
    echo '<script>';
    echo 'alert("Thank you!! Form submited successfully. We will contact you soon..!");';
    echo 'window.location.href = window.location.href;';
    echo '</script>';
    header("location: ../index.php");
    exit;
    }
    ?>