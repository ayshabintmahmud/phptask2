<?php


include_once('lib/header.php');
require_once('functions/alert.php');


 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    
  </head>
  <body>
  <a class="btn btn-primary" href="patientdashboard.php">Back to dashboard</a> 
<hr>
  <div class="container">
  <div class="row col-6">
    <strong> <p> Dear Patient! Please Book an Appointment </p></strong>
</div>
<div class="row col-6">
    <p>All fields are Required</p>
    </div>
    <div class="row col-6">

    <form class="" action="processbookapointment.php" method="POST">
    <p> <?php print_alert(); ?> </p>
      <p>
      <label for="">Date of Appointment</label><br />
         <input
         <?php
         if(isset($_SESSION['apointmentdate'])){
                   echo "Value =" . $_SESSION['apointmentdate'];

                    }
          ?>
         class="form-control "type="date" name="apointmentdate" >

      </p>

      <p>
         <label for="">Time of Appointment</label><br />
         <input
         <?php
         if(isset($_SESSION['apointmenttime'])){
                   echo "Value =" . $_SESSION['apointmenttime'];

                    }
          ?>
         class="form-control col-6" type="time" name="apointmenttime"  >

      </p>

      <p>
         <label for="">Nature of Appointment</label><br />
         <input
         <?php
         if(isset($_SESSION['apointmentnature'])){
                   echo "Value =" . $_SESSION['apointmentnature'];

                    }
          ?>
         class="form-control col-6" type="text" name="apointmentnature" value="" placeholder="Nature of Appointment" >

      </p>
      
      <p>
         <label for="">Initial Complaint</label><br />
         <input
         <?php
         if(isset($_SESSION['complaint'])){
                   echo "Value =" . $_SESSION['complaint'];

                    }
          ?>
         class="form-control " type="text" name="complaint" value="" placeholder="Initial Complaint" >

      </p>

      <p>
         <label for="">Department of Appointment</label> <br />
         <select class="form-control " name="apointmentdepartment">
         <option> Select one</option>
         <option>Cardiology</option>
         <option>Pediatricts</option>
</select>     

 </p>

      <p> 
        <button class="btn btn-sm btn-primary" type="submit" name="apointment"> Set Appointment</button>
      </p>

      </div>
      </div>
    </form>
        </p>
  </body>
</html>
