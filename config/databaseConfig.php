<?php

// LocalHost

//  $dbServername = "localhost";
//  $dbUsername = 'root';
//  $dbPassword = "";
//  $dbName = "landvault";

 $dbServername = "@us-cdbr-east-06.cleardb.net";
 $dbUsername = 'b4001dc2381252';
 $dbPassword = "8d40d4e9";
 $dbName = "heroku_be0947523a140f6";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());

    echo "<h1 style='padding-top: 100px'>Please Check the dbh.php file</h1>";
}

?>

<!-- mysql://b4001dc2381252:8d40d4e9@us-cdbr-east-06.cleardb.net/heroku_be0947523a140f6?reconnect=true -->