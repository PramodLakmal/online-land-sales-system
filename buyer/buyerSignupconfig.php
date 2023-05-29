<?php

if (isset($_POST["submit"])) {

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $username = $_POST["user"];
    $pwd = $_POST["pwd"];
    $repwd = $_POST["repwd"];

    require_once '../config/databaseConfig.php';
    require_once '../config/functions.php';

    $uidExists = uidExists($conn, $username, 'buyer');

    if ($uidExists === true) {
        echo '<script>';
            echo 'alert("Username Already Exists!");';
            echo 'window.location.href = window.location.href;';
            echo '</script>';
            exit;
    }
    

    $hashedPwd = hash('sha256', $pwd);

    $sql = "INSERT INTO buyer (buyerID, b_fname, b_lname, b_dob, b_username, b_imgLoc, role, b_password, b_email) 
            VALUES ('', '$fname', '$lname', '', '$username', 'defaultProfilePic.jpg', 'buyer', '$hashedPwd', '$email')
            ;";
    
    if (mysqli_query($conn, $sql)) {


        session_start();
            $_SESSION["id"] = 99;
            $_SESSION["username"] = $username;
            $_SESSION["fname"] = $fname;
            $_SESSION["lname"] = $lname;
            $_SESSION["email"] = $email;
            $_SESSION["role"] = 'buyer';
        header("location: ../index.php");
    }
    else {
        echo "<script>alert ('Something went wrong :-(')</script>";
    }
    mysqli_close($conn);



}
else {
    header("location: ../buyerSignup.php");
}

?>