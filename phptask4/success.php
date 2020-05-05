
<?php
require_once('functions/email.php');
require_once('functions/redirect.php');

    if (isset($_GET['txref'])) {
        $ref = $_GET['txref'];
        $amount = $bill; //Correct Amount from Server
        $currency = "NGN"; //Correct Currency from Server

        $query = array(
            "SECKEY" => "FLWSECK_TEST-ea457c3de55e3f58956882f4e67b737d-X",
            "txref" => $ref
        );

        $data_string = json_encode($query);

        $ch = curl_init('https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $response = curl_exec($ch);

        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);

        curl_close($ch);

        $resp = json_decode($response, true);

        $paymentStatus = $resp['data']['status'];
        $chargeResponsecode = $resp['data']['chargecode'];
        $chargeAmount = $resp['data']['amount'];
        $chargeCurrency = $resp['data']['currency'];

         if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeAmount == $amount)  && ($chargeCurrency == $currency)) {

           // Send Email Notification

               $subject = "Payment Successful";
               $message = "Hello " . $_SESSION['name'] . "your payment of" . $_SESSION['bills'] . "was Successful" ;

               send_mail($subject,$message,$email);

               redirect_to("patientdashboard.php");
               return;

                      // transaction was successful...
             // please check other things like whether you already gave value for this ref
          // if the email matches the customer who owns the product etc
          //Give Value and return to Success page
        } else {
            $_SESSION["error"] = "Payment Not Successful! Try again" ;
            header("Location: paybill.php");

            //Dont Give Value and return to Failure page
        }
    }
    else {
      die();
    }

?>
