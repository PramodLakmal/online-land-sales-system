<?php

// This function checks if username already in the database
function uidExists($conn, $username, $role) {

    if ($role === 'buyer') {
        $sql = mysqli_query($conn, "SELECT * FROM buyer 
                        WHERE b_username ='" . $username . "';
                        ");  
    } else if ($role === 'seller') {
        $sql = mysqli_query($conn, "SELECT * FROM seller 
                        WHERE s_username ='" . $username . "';
                        ");    
    } else if ($role === 'admin') {
        $sql = mysqli_query($conn, "SELECT * FROM admin
                        WHERE a_username ='" . $username . "';
                        ");    
    }
    
    $row  = mysqli_fetch_array($sql);

    if (is_array($row)) {
        return true;
    }
    else {
        return false;
    }

    mysqli_close($conn);
}
//buyer sign in
function buyerSignin($conn, $username, $pwd) {
    
    $uidExists = uidExists($conn, $username, 'buyer');

    if ($uidExists === false) {
        echo '<script>';
            echo 'alert("Incorrect Username!");';
            echo 'window.location.href = window.location.href;';
            echo '</script>';
            exit;
    }

    $sql = mysqli_query($conn, "SELECT *
                                    FROM buyer
                                    WHERE b_username='" . $username . "';
                                    ");
    
    $row  = mysqli_fetch_array($sql);

    // Get Hashed password
    $pwdHashed = $row['b_password'];

    // Password validation
    if (hash('sha256', $pwd) === $pwdHashed) {
        $checkPwd = true;
    } else {
        $checkPwd = false;
    }

    if ($checkPwd === false) {
        echo '<script>';
            echo 'alert("Incorrect Password!");';
            echo 'window.location.href = window.location.href;';
            echo '</script>';
            exit;
    }

    else if ($checkPwd === true) {
        session_start();
        $_SESSION["id"] = $row['buyerID'];
        $_SESSION["username"] = $row['b_username'];
        $_SESSION["fname"] = $row['b_fname'];
        $_SESSION["lname"] = $row['b_lname'];
        $_SESSION["email"] = $row['b_email'];
        $_SESSION["role"] = $row['role'];

        header("location: ../buyerDashboard.php");
        exit();

    mysqli_close($conn);
    }
        
}
//seller sign in
function sellerSignin($conn, $username, $pwd) {
    $uidExists = uidExists($conn, $username, 'seller');

        if ($uidExists === false) {
            echo '<script>';
            echo 'alert("Incorrect Username!");';
            echo 'window.location.href = window.location.href;';
            echo '</script>';
            exit;
        }

        $sql = mysqli_query($conn, "SELECT *
                                        FROM seller
                                        WHERE s_username='" . $username . "';
                                        ");
        
        $row  = mysqli_fetch_array($sql);

        $pwdHashed = $row['s_password'];

        if (hash('sha256', $pwd) === $pwdHashed) {
            $checkPwd = true;
        } else {
            $checkPwd = false;
        }

        if ($checkPwd === false) {
            echo '<script>';
            echo 'alert("Incorrect Password!");';
            echo 'window.location.href = window.location.href;';
            echo '</script>';
            exit;
            
        }

        else if ($checkPwd === true) {
            session_start();
            $_SESSION["id"] = $row['sellerID'];
            $_SESSION["username"] = $row['s_username'];
            $_SESSION["fname"] = $row['s_fname'];
            $_SESSION["lname"] = $row['s_lname'];
            $_SESSION["email"] = $row['s_email'];
            $_SESSION["role"] = $row['role'];

            header("location: ../sellerDashboard.php");
            exit();

        mysqli_close($conn);
        }
        
    }



?>