<?php
    // Dynamic Header
    $title = 'Admin Dashboard'; include_once("header.php");
    // Check if user is an admin
     include("./admin/adminConfig.php");
?>

<link rel="stylesheet" href="./css/adminDashboard.css">

<!-- Statistics -->
<section class='statics'>
    <h1 class="main_title">Admin Dashboard</h1><br>
    <?php
        $result = mysqli_query($conn, "SELECT COUNT(*) FROM seller");
        $sellerCount = mysqli_fetch_array($result);

        $result = mysqli_query($conn, "SELECT COUNT(*) FROM buyer");
        $buyerCount = mysqli_fetch_array($result);

        // $result = mysqli_query($conn, "SELECT COUNT(*) FROM land");
        // $landCount = mysqli_fetch_array($result);
        
        
        echo "<div class='stat__container'>
                <div class='stat__box'>
                    <h1>". $buyerCount[0] ."</h1>
                    <h3>Buyers</h3>
                </div>
                <div class='stat__box'>
                    <h1>". $sellerCount[0] ."</h1>
                    <h3>Sellers</h3>
                </div>
                <div class='stat__box'>
                    <h1>". 5/*$landCount[0]*/ ."</h1>
                    <h3>Lands</h3>
                </div>
                <div class='stat__box'>
                    <h1>". 6 ."</h1>
                    <h3>Total Income</h3>
                </div>
                <div class='stat__box'>
                    <h1>". 7 ."</h1>
                    <h3>Categories</h3>
                </div>
            </div>
            ";
    ?>
</section>


<!-- Tab System -->
<section class="tabSystem">
    <div class="tab">
        <button class="tablinks" onclick="openTab(event, 'Buyers')" id="defaultOpen">Buyers</button>
        <button class="tablinks" onclick="openTab(event, 'Sellers')">Sellers</button>
        <button class="tablinks" onclick="openTab(event, 'Admins')">Admins</button>
        <button class="tablinks" onclick="openTab(event, 'Profile')">Profile</button>
    </div>

    <div id="Buyers" class="tabcontent">
        <h2 class="tabTitle">Buyers</h2>
        <!-- Buyers -->
        <section class="users">
            <div class="user__table">
                <div class="user__tableHeader">
                <h3>Buyers</h3>
                    <div class="">
                        <a class="nav_add" href="./addUser.php?role=buyer">Add new Buyer Account</a>
                    </div>
                </div>
                
                <table id="users">
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Type</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>

                    <?php
                        $sql = "SELECT * from buyer";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                            echo "
                            <form action='./admin/deleteOrUpdateUser.php' method='post'>
                                <tr>
                                <td>".$row['buyerID']."</td>
                                <td>".$row['b_fname']."</td>
                                <td>".$row['b_lname']."</td>
                                <td>".$row['b_email']."</td>
                                <td>".$row['b_username']."</td>
                                <td>".$row['role']."</td>
                                <td>
                                    <button type='submit' name='update'>Update</button>
                                    <input hidden value=". $row['buyerID'] ." required type='text' name='id'>
                                    <input hidden value=". $row['role'] ." required type='text' name='role'>
                                </td>
                                <td>
                                
                                <button type='submit' name='delete' onclick='return checkdelete()'>Delete</button>
                                <input hidden value=". $row['buyerID'] ." required type='text' name='id'>
                                <input hidden value=". $row['role'] ." required type='text' name='role'>
                                
                                
                                </td>
                                
                                </tr>
                            </form>";
                            }
                        }
                        else {
                            echo "0 results";
                        }
                        // $conn->close();
                    ?>

                </table>
            </div>
        </section>
    </div>

    <div id="Sellers" class="tabcontent">
        <h2 class="tabTitle">Sellers</h2>
         <!-- Sellers -->
         <section class="users">
            <div class="user__table">
            <div class="user__tableHeader">
            <h3>Sellers</h3>
                <div class="">
                    <a class="nav_add" href="./addUser.php?role=seller">Add new Seller Account</a>
                </div>
            </div>
                
                <table id="users">
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Type</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>

                    <?php
                        $sql = "SELECT * from seller";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                            echo "
                            <form action='./admin/deleteOrUpdateUser.php' method='post'>
                                <tr>
                                <td>".$row['sellerID']."</td>
                                <td>".$row['s_fname']."</td>
                                <td>".$row['s_lname']."</td>
                                <td>".$row['s_email']."</td>
                                <td>".$row['s_username']."</td>
                                <td>".$row['role']."</td>
                                <td>
                                    <button type='submit' name='update'>Update</button>
                                    <input hidden value=". $row['sellerID'] ." required type='text' name='id'>
                                    <input hidden value=". $row['role'] ." required type='text' name='role'>
                                </td>
                                <td>
                                    <button type='submit' name='delete' onclick='return checkdelete()'>Delete</button>
                                    <input hidden value=". $row['sellerID'] ." required type='text' name='id'>
                                    <input hidden value=". $row['role'] ." required type='text' name='role'>
                                </td>
                                
                              </tr>
                            </form>";
                            }
                        }
                        else {
                            echo "0 results";
                        }
                        // $conn->close();
                    ?>

                </table>
            </div>
        </section>
    </div>

    <div id="Admins" class="tabcontent">
        <h2 class="tabTitle">Admins</h2>
        <!-- Admins -->
        <section class="users">
            <div class="user__table">
            <div class="user__tableHeader">
            <h3>Admins</h3>
                <div class="">
                    <a class="nav_add" href="./addUser.php?role=admin">Add new Admin Account</a>
                </div>
            </div>
                
                <table id="users">
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Type</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>

                    <?php
                        $sql = "SELECT * from admin";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                            echo "
                            <form action='./admin/deleteOrUpdateUser.php' method='post'>
                                <tr>
                                <td>".$row['adminID']."</td>
                                <td>".$row['a_fname']."</td>
                                <td>".$row['a_lname']."</td>
                                <td>".$row['a_email']."</td>
                                <td>".$row['a_username']."</td>
                                <td>".$row['role']."</td>
                                <td>
                                    <button type='submit' name='update'>Update</button>
                                    <input hidden value=". $row['adminID'] ." required type='text' name='id'>
                                    <input hidden value=". $row['role'] ." required type='text' name='role'>
                                </td>
                                <td>
                                    <button type='submit' name='delete' onclick='return checkdelete()'>Delete</button>
                                    <input hidden value=". $row['adminID'] ." required type='text' name='id'>
                                    <input hidden value=". $row['role'] ." required type='text' name='role'>
                                </td>
                                
                                </tr>
                            </form>";
                            }
                        }
                        else {
                            echo "0 results";
                        }
                        // $conn->close();
                    ?>

                </table>
            </div>
        </section>
    </div>

    <div id="Profile" class="tabcontent">
        <h2 class="tabTitle">Profile</h2>
        <?php

            $sql = mysqli_query($conn, "SELECT *
            FROM admin 
            WHERE adminID ='" . $_SESSION["id"] . "'
            ");

            $row = mysqli_fetch_array($sql);            

            $username = $row["a_username"];
            $fname = $row["a_fname"];
            $lname = $row["a_lname"];
            $email = $row["a_email"];
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
            </div>
        </div>
    </div>
</section>

<!-- End of Tab System -->

<script src="./js/adminDashboard.js"></script>

<?php include("footer.php"); ?>