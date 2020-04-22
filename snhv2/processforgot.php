<?php
session_start();
require_once('functions/alert.php');
require_once('functions/redirect.php');
require_once('functions/token.php');
require_once('functions/users.php');
require_once('functions/email.php');

//collecting data
$errorcount = 0;


$email = $_POST['email'] != "" ? $_POST['email'] : $errorcount++;
$_SESSION ['email'] = $email;

if($errorcount > 0){
  $session_error = "You have" . $errorcount . "error";

  if ($errorcount > 1 ) {
    $session_error .=  "s";
  }

  $session_error .= " in your form submission";
  set_alert('error',$session_error);
  header("Location: forgot.php");

}else{


  $allUsers = scandir("db/users/"); //getting all users from database

  $countAllUsers = count($allUsers); //counting all users from the database


// check if user exist
for ($counter = 0; $counter < $countAllUsers; $counter++ ){

  $currentUser = $allUsers[$counter];

  if($currentUser == $email . ".json"){

    //*** Sending email of the code


    $token = generate_token();  // generating token

    
    $subject = "Password Rest";
    $message = "A password reset has been initiated from your account,
    if you did not initiate this reset,
     please ignore this message.
     otherwise visit localhost/snhv2/reset.php?token=" .$token;

     file_put_contents("db/tokens/". $email . ".json", json_encode (['token' => $token]));

     send_mail($subject,$message,$email);

    die();
  }
}
      set_alert('error',"Email not registered with us ERR: " . $email);
        redirect_to("forgot.php");
}
?>
