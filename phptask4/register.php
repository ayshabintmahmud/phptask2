<?php

include_once("lib/header.php");
require_once('functions/alert.php');


if (isset ($_SESSION ["LoggedIn"]) && ($_SESSION["LoggedIn"])){
   header("Location: dashboard.php");


}

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  <div class="container">
      <div class="row col-6">  
 <strong> <p> Welcome! Please Register </p></strong> 
 </div>
  <div class="row col-6">
    <p>All fields are Required</p>
</div>
<div class="row col-6">
    <form class="" action="processregister.php" method="POST">
         <p>
         <?php print_alert(); ?>
        </p>
      <p>
         <label for="">First Name</label><br />
         <input
         <?php
         if(isset($_SESSION['first_name'])){
                   echo "Value =" . $_SESSION['first_name'];

                    }
          ?>
         type="text" class="form-control" name="first_name" value="" placeholder="First Name" pattern=".{2,}" title="Name must not be less that 2 letters or left blank">

      </p>

      <p>
         <label class="label" for="last_name">Last Name</label> <br />
         <input
         <?php
         if(isset($_SESSION['last_name'])){
                   echo "Value =" . $_SESSION['last_name'];

                    }
          ?>

         type="text" class="form-control" name="last_name" value="" placeholder="Last Name"pattern=".{2,}" title="Name must not be less that 2 letters or left blank" >
      </p>

      <p>
         <label for="">Email</label> <br />
         <input
         <?php
         if(isset($_SESSION['email'])){
                   echo "Value =" . $_SESSION['email'];

                    }
  ?>


         type="text" class="form-control" name="email" value="" placeholder="Your Email" >
      </p>

      <p>
         <label for="">Password</label> <br />
         <input type="password" class="form-control" name="password" value="" placeholder="Password" >

      </p>

      <p>
         <label for="">Gender</label> <br />
         <select class="form-control" name="gender" >
           <option value="">Select One</option>
           <option>Female</option>
           <option> Male</option>

         </select>
      </p>


      <p>
         <label for="">Designation</label> <br />
         <select class="form-control" name="designation" >
           <option value="">Select One</option>
           <option>Medical Team </option>
           <option>Patient</option>

         </select>

      </p>

      <p>
         <label for="">Department</label> <br />
         <select class="form-control" name="department">
         <option> Select one</option>
         <option>Cardiology</option>
         <option>Pediatricts</option>
</select>     
 </p>

      <p>
        <button class="btn btn-sm btn-primary" type="submit" name="Register"> Register</button>

      </p>
      <a  href="forgot.php"> forgot Password</a> | 
      <a  href="login.php"> Already have an Account</a>


    </form>

        </div>
        </div>
  </body>
</html>
