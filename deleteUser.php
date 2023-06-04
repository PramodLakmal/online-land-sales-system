<?php
    // Dynamic Header
    $title = 'Delete'; include("header.php");
    // Check if user is an admin
    include("./admin/adminConfig.php");
?>

<link rel="stylesheet" href="./css/deleteUser.css">

<section>
    <h1 class="main-title">Do you really want to Delete this User?</h1>

    <?php
        include_once("./config/databaseConfig.php");
        include_once("./config/functions.php");

        $row = getUserDetails($conn, $_GET["id"], $_GET["role"]);

        if ($row["role"] === 'admin') {
            $id = $row["adminID"];
        } else if ($row["role"] === 'buyer') {
            $id = $row["buyerID"];
        } else if ($row["role"] === 'seller') {
            $id = $row["sellerID"];
        }

        echo '<form class"update_form" action="./src/admin/deleteUser.src.php" method="post">
                <input hidden value="' . $id .'" required type="text" name="id"><br>
                <input hidden value="' . $row["role"] .'" required type="text" name="role"><br>
                <button"><a href="./admin.php">Go Back</a></button>
                <button type="submit" name="delete">Delete</button>
            </form>';
    ?>

</section>

<?php include("footer.php"); ?>