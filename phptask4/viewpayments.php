<?php

function View_Payments(){
    $paymentRows = "";
    $allpayment = scandir("db/paybill/");
$countallpayment = count($allpayment);

for ($counter = 2; $counter < $countallpayment; $counter++ ){

  $currentpayment =$allpayment[$counter];
    $payment = file_get_contents("db/paybill/". $currentpayment);
    $userpayment = json_decode($payment);


      $paymentRows .= "
        <tr>
              <td>$userpayment->name</td>
              <td>$userpayment->email</td>
              <td>$userpayment->bills</td>
              <td>$userpayment->department</td>

          </tr>
          ";

  }
  return $paymentRows;
  }




?>

<?php $output = View_Payments();
if($output != ""){?>
<a class="btn btn-primary" href="admin.php">Back to Dashboard</a>
<hr >
<h3>A Record of Payments</h3>

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
