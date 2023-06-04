<?php
    // Dynamic Header
    $title = 'Add User'; include("header.php");
    // Check if user is an admin
    include("./admin/adminConfig.php");
?>

<link rel="stylesheet" href="./css/addUser.css">

<?php
    if($_GET["role"] === 'buyer') {
        echo "<section>
                <div class='login-form'>
                    <h1 class='main-title'>Hello ". $_SESSION['username'] ." Please add new Buyer</h1>
                    <br>
                    <form name='addUser' action='./config/addUserConfig.php' method='post' onsubmit='return addUserFormValidate()'>
                        <input placeholder='Enter First Name' type='text' name='fname'><br>
                        <input placeholder='Enter Last Name' type='text' name='lname'><br>
                        <input placeholder='Enter Email' type='text' name='email'><br>
                        <input required placeholder='Enter Username' type='text' name='username'><br>
                        <input required placeholder='Enter Password' type='password' name='pwd'><br>
                        <input required placeholder='Re-Enter Password' type='password' name='repwd'><br>
                        <input hidden required name='role' value='buyer'>
                        <button class='submit-btn' type='submit' name='addUser'>Add Buyer</button>
                    </form>
                </div>
            </section>";
    }
    else if($_GET["role"] === 'seller') {
        echo "<section>
                <div class='login-form'>
                    <h1 class='main-title'>Hello ". $_SESSION['username'] ." Please add new Seller</h1>
                    <br>
                    <form action='./config/addUserConfig.php' method='post'>
                        <input placeholder='Enter First Name' type='text' name='fname'><br>
                        <input placeholder='Enter Last Name' type='text' name='lname'><br>
                        <input placeholder='Enter Email' type='text' name='email'><br>
                        <input required placeholder='Enter Username' type='text' name='username'><br>
                        <input required placeholder='Enter Password' type='password' name='pwd'><br>
                        <input required placeholder='Re-Enter Password' type='password' name='repwd'><br>
                        <input hidden required name='role' value='seller'>
                        <button class='submit-btn' type='submit' name='addUser'>Add Seller</button>
                    </form>
                </div>
            </section>";
    }
    else if($_GET["role"] === 'admin') {
        echo "<section>
                <div class='login-form'>
                    <h1 class='main-title'>Hello ". $_SESSION['username'] ." Please add new Admin</h1>
                    <br>
                    <form action='./config/addUserConfig.php' method='post'>
                        <input placeholder='Enter First Name' type='text' name='fname'><br>
                        <input placeholder='Enter Last Name' type='text' name='lname'><br>
                        <input placeholder='Enter Email' type='text' name='email'><br>
                        <input required placeholder='Enter Username' type='text' name='username'><br>
                        <input required placeholder='Enter Password' type='password' name='pwd'><br>
                        <input required placeholder='Re-Enter Password' type='password' name='repwd'><br>
                        <input hidden required name='role' value='admin'>
                        <button class='submit-btn' type='submit' name='addUser'>Add Admin</button>
                    </form>
                </div>
            </section>";
    }
    else {
        header("location: ./adminDashboard.php");
    }
?>











<script src="./assets/js/adduser.js"></script>
<?php include("footer.php"); ?>