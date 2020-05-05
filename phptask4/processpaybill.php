<?php session_start();

$errorcount = 0;

$name = $_POST['name'];
$email=$_POST['email'];
$bills=$_POST['bills'];
$department= $_POST['department'];


$_SESSION['name'] = $name;
$_SESSION['email'] = $email;
$_SESSION['bills'] = $bills;
$_SESSION['department'] = $department;



// process our rave payment
$curl = curl_init();

$customer_email = $email;
$amount = $bills;
$currency = "NGN";
$txref = genTxref();
$PBFPubKey = "FLWPUBK_TEST-65a04ba521b70b0bd8dd7f0a29cfc2b5-X";
$redirect_url = "http://localhost:8080/snhv3/success.php";
//$payment_plan = "pass the plan id"; // this is only required for recurring payments.


curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'amount'=>$amount,
    'customer_email'=>$customer_email,
    'currency'=>$currency,
    'txref'=>$txref,
    'PBFPubKey'=>$PBFPubKey,
    'redirect_url'=>$redirect_url,
    //'payment_plan'=>$payment_plan
  ]),
  CURLOPT_HTTPHEADER => [
    "content-type: application/json",
    "cache-control: no-cache"
  ],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
  // there was an error contacting the rave API
  die('Curl returned error: ' . $err);
}

$transaction = json_decode($response);

if(!$transaction->data && !$transaction->data->link){
  // there was an error from the API
  print_r('API returned error: ' . $transaction->message);
}

// uncomment out this line if you want to redirect the user to the payment page
//print_r($transaction->data->message);


// redirect to page so User can pay
// uncomment this line to allow the user redirect to the payment page
header('Location: ' . $transaction->data->link);

 function genTxref() {
  $txref = "txref_";
  for ($i = 0; $i < 7; $i++) {
      $txref .= mt_rand(0, 6);
  }
  return $txref;
}


if($errorcount > 0){
  $session_error = "You have" . $errorcount . "error";

  if ($errorcount > 1 ) {
    $session_error .=  "s";
  }

  $session_error .= " in your form submission";
  $_SESSION["error"] = $session_error;
  header("Location: paybill.php");

}else{

// trying to save payment details in db
$allpayment = scandir("db/paybill/");

  $countAllpayment = count($allpayment);

  $newUserId = ($countAllpayment-1);

  $userpayment = [
    'id' => $newUserId,
    'name' => $name,
    'email' => $email,
    'bills' => $bills,
    'department' => $department
];

//save payment detail
file_put_contents("db/paybill/". $newUserId . ".json", json_encode ($userpayment));
  // $_SESSION["message"] = "Payument Successful,Go back to Dashboard";
   //header("Location: paybill.php");
    //die();

}
?>
