<?php 
require_once('functions/redirect.php');
include_once('lib/header.php');



if (!isset($_SESSION['LoggedIn']) || !isset($_SESSION['department'])){
  redirect_to("Login.php");
}

//$fullname = $_SESSION ["fullname"];

    function View_apointment(){
      $apointmentRows = "";
      $allpointments = scandir("db/appointments/");
  $countallpointments = count($allpointments);

  for ($counter = 2; $counter < $countallpointments; $counter++ ){

    $currentappoinment =$allpointments[$counter]; 
      $userapt = file_get_contents("db/appointments/". $currentappoinment);
      $userapointment = json_decode($userapt);
     
      if($userapointment->apointmentdepartment == $_SESSION["department"]){
        $apointmentRows .= "
          <tr>
                <td>$userapointment->email</td>
                <td>$userapointment->submit</td>
                <td>$userapointment->apointmentnature</td>
                <td>$userapointment->apointmentdate</td>
                <td>$userapointment->apointmenttime</td>
                <td>$userapointment->apointmentdepartment</td>
                <td>$userapointment->complaint</td>
            </tr>
            ";
      }
    } 
    return $apointmentRows;
    }
     ?>

<a class="btn btn-primary" href="dashboard.php">Back to dashboard</a> 

<hr >
<?php $output = View_apointment();
if($output != ""){?>


     <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Patient Email</th>
                        <th>date of booking</th>
                        <th>Nature of Apointment</th>
                        <th>Appointment Date</th>
                        <th>Appointment Time</th>
                        <th>Department</th>
                        <th>Initial Complaint</th>
                    </tr>
                </thead>
                <tbody>
               <?php
                $output = View_apointment();
                echo $output;
               ?>
                    
                </tbody>
            </table>
<?php } else {
echo "You have no pending appointments." ;
}?>




<?php

function View_Payments(){
    $paymentRows = "";
    $allpayment = scandir("db/paybill/");
$countallpayment = count($allpayment);

for ($counter = 2; $counter < $countallpayment; $counter++ ){

  $currentpayment =$allpayment[$counter];
    $payment = file_get_contents("db/paybill/". $currentpayment);
    $userpayment = json_decode($payment);

    if($userpayment->department == $_SESSION["department"]){
      $paymentRows .= "
        <tr>
              <td>$userpayment->name</td>
              <td>$userpayment->email</td>
              <td>$userpayment->bills</td>
              <td>$userpayment->department</td>

          </tr>
          ";

  }
}
  return $paymentRows;
  }




?>

<?php $output = View_Payments();
if($output != ""){?>

<hr >
<h3> Record of Patients who made Payment</h3>

     <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Patient Name</th>
                        <th>Patient Email</th>
                        <th>Amount Deposited</th>
                        <th>Department</th>


                    </tr>
                </thead>
                <tbody>
               <?php
                $seepayment = View_Payments();
                echo $seepayment;
               ?>

                </tbody>
            </table>

          <?php } else {
          echo "No Payment Records" ;
          }?>






        <?php // $_SESSION["message"] = "You have no pending appointments" ;
  //header("Location: dashboard.php");
  //die();
  ?>
  <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 50%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

button{
  background-color: #808080; 
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
</style>
