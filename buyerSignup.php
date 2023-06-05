<?php
    // Dynamic Header
    $title = 'Buyer Sign Up'; include("header.php");
    // is Logged in?
    include("./config/isSigninConfig.php")
?>

<link rel="stylesheet" href="./css/buyerSignup.css" />

<section class="su-container">

  <div class="signup">
    <h1 class="main-title">Create a <u>Buyer</u>Account</h1>
    <div class="signup-form">
      <form action="./buyer/buyerSignupconfig.php" method="post">
        <div class="form-row">
          <input required placeholder="Enter First Name" type="text" name="fname" />
          <input required placeholder="Enter Last Name" type="text" name="lname" />
        </div>
        <input required placeholder="Enter Your Email Address" type="text" name="email" />
        <input required placeholder="Enter Username" type="text" name="user" />
        <input required placeholder="Enter Password" type="password" name="pwd" />
        <input
          required placeholder="Re-Enter Password" type="password" name="repwd" />
        <div class="btn-div">
          <button class="submit-btn" type="submit" name="submit">
            Sign Up
          </button>
        </div>
      </form>
    </div>
    <div class="changeform">
      <h3>Are you a Seller?</h3>
      <a href="./sellerSignup.php">Seller Signup</a>
      <p>Already a member ? <a href="signin.php">Sign In!</a></p>
    </div>
  </div>
</section>

<?php include("footer.php"); ?>
