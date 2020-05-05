<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Welcome to SNH Hospital</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
    crossorigin="anonymous"> 
    <link rel="stylesheet"  href="css/style.css">
    <script src="js/scripts.js"> </script>

  </head>
  <body>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal"><a href="index.php"> SNH Hosptal </a> </h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="index.php">Home</a>
  <?php if(!isset($_SESSION["LoggedIn"])){ ?>

<a class="p-2 text-dark"href="login.php">Login</a> 
<!-- <a class="p-2 text-dark"href="forgot.php">forgot Password</a>-->
<a class="btn btn-primary" href="register.php">Register</a> 

<?php } else{ ?>
  <a class="p-2 text-dark" href="forgot.php">Reset Password</a>
  <a class="p-2 text-dark btn btn-sm btn-danger" href="logout.php">Logout</a>

<?php }?>
    
  </nav>
</div>
  </body>
  </html>
