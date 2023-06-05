<?php
    // Dynamic Header
    $title = 'Seller Dashboard'; include("header.php");
    // Check if user is a seller
    include("./seller/sellerConfig.php");
    
?>

<link rel="stylesheet" href="./css/buyerDashboard.css">


<!-- Tab System -->
<section class="tabSystem">
    <div class="tab">
        <button class="tablinks" onclick="openTab(event, 'Profile')" id="defaultOpen">Profile</button>
        <a href="./sellLands.php"><button class="tablinks" onclick="openTab(event, 'Sell')" >Sell a Land</button></a>
    </div>

    <div id="Profile" class="tabcontent">
        <h2 class="tabTitle">Profile</h2>
        <?php

            $sql = mysqli_query($conn, "SELECT *
            FROM seller AS S
            WHERE S.sellerID ='" . $_SESSION["id"] . "'
            ");

            $row = mysqli_fetch_array($sql);

            $id = $row["sellerID"];
            $username = $row["s_username"];
            $fname = $row["s_fname"];
            $lname = $row["s_lname"];
            $email = $row["s_email"];
            $role = $row["role"];        


        ?>
        <div class="container">
            <div class="img_container">
                <div class="prof_img">
                    <img src="./images/profile/profile-pic.jpg" alt="profile picture">
                </div>
            </div>

            <div class="details_container">
                <div class="user_details">
                    <div class="text_area">
                        <h3>First name : <span><?php echo"$fname"?></span></h3>
                    </div>
                    <div class="text_area">
                        <h3>Last name : <span><?php echo"$lname"?></span></h3>
                    </div>
                    <div class="text_area">
                        <h3>Username : <span><?php echo"$username"?></span></h3>
                    </div>
                    <div class="text_area">
                        <h3>Email : <span><?php echo"$email"?></span></h3>
                    </div>
                    <div class="text_area">
                        <h3>User Type : <span><?php echo"$role"?></span></h3>
                    </div>
                </div>
                <form action='./seller/deleteOrEditUser.php' method='post'>
                    <div class="update">         
                    <button type='submit' name='edit'>Edit data</button>
                    <input hidden value=<?php echo "$id";?> required type='text' name='id'>
                    <input hidden value=<?php echo "$role";?> required type='text' name='role'>
                    </div>
                    <div class="delete">      
                    <button type='submit' name='delete' onclick='return checkdelete()'>Delete Account</button>
                    <input hidden value=<?php echo "$id";?> required type='text' name='id'>
                    <input hidden value=<?php echo "$role";?> required type='text' name='role'>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- End of Tab System -->



<script src="./js/adminDashboard.js"></script>

<?php include("footer.php"); ?>