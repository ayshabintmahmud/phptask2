<?php 
include_once("lib/header.php");
require_once('functions/alert.php');

?>


<html>

<head>
  <link rel='stylesheet' href='/stylesheets/style.css' />
</head>
<p> <?php print_alert(); ?> </p>
<body>
<a class="btn btn-primary" href="patientdashboard.php">Back</a>

  <h1>Pay with Rave</h1>
  <div class="container" id="ravepay">
    <row>
      <div class="col-md-6 col-md-offset-4">
        <form action="processpaybill.php" method="POST" >
          <div class="row">
            <div class="col-md-8">
              <label for="">Full Name</label>
              <input 
              <?php
         if(isset($_SESSION['name'])){
                   echo "Value =" . $_SESSION['name'];

                    }
          ?>
              
              type="text" name="name" id="name" class="form-control border-input" value="" placeholder="Enter full name" style="margin-bottom: 30px;">
              <label for="">Email address</label>
              <input 
              <?php
         if(isset($_SESSION['email'])){
                   echo "Value =" . $_SESSION['email'];

                    }
          ?>
              
              type="text" name="email" id="email" class="form-control border-input" value="" placeholder="Enter email address" style="margin-bottom: 30px;">

              <label for="">Department</label>
              <select name="department" class="form-control" >
         <option> Select one</option>
         <option >Cardiology</option>
         <option >Pediatricts</option>
</select>
                <label for="">Amount to be paid</label>
              <input 
              <?php
         if(isset($_SESSION['bills'])){
                   echo "Value =" . $_SESSION['bills'];

                    }
          ?>
              
              type="text" name="bills" id="name" class="form-control border-input" value="" placeholder="Amount to Pay" style="margin-bottom: 30px;">
              <p>
        <button class="btn btn-sm btn-primary" type="submit" name="Pay"> Pay Now</button>

      </p>


            </div>


          </div>
      </div>
      </form>

  </div>
  </row>
  </div>

</body>

</html>
