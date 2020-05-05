<?php

include_once('lib/header.php');
require_once('functions/alert.php');?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add User</title>
  </head>
  <body>


  <a class="btn btn-primary" href="admin.php">Back</a> 
<hr>
  <div class="container">
     <div class="row col-6">
         <strong> <p> Dear Admin! Add new user </p></strong>
      </div>
        <div class="row col-6">
          <p>All fields are Required</p>
        </div>

          <div class="row col-6">
          <form class="" action="processadduser.php" method="POST">
          <p> <?php print_alert(); ?> </p>
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
         <label for="">Last Name</label> <br />
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
         <select class="form-control" class="" name="gender" >
           <option value="">Select One</option>
           <option>Female</option>
           <option> Male</option>

         </select>
      </p>


      <p>
         <label for="">Designation</label> <br />
         <select class="form-control" class="" name="role" >
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

      <p> 
        <button type="submit" class="btn btn-sm btn-primary" name="Register"> Add User</button>

      </p>

    </form>
    </div>
    </div>
    
  </body>
</html>
