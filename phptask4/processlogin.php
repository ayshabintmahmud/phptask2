<?php session_start();
require_once('functions/alert.php');
require_once('functions/redirect.php');
require_once('functions/token.php');
require_once('functions/users.php');

$errorcount = 0;

$email = $_POST['email'] != "" ? $_POST['email'] : $errorcount++;
$password = $_POST['password'] != "" ? $_POST['password'] : $errorcount++;


$_SESSION['email']= $email;

if($errorcount > 0){

  $session_error = "You have" . $errorcount . "error";

    if ($errorcount > 1 ) {
      $session_error .=  "s";
    }

    $session_error .= " in your form submission";
    set_alert('error',$session_error);
      
    redirect_to("login.php");

  }else{

    $currentUser = find_user($email);

    if($currentUser){
      $userString = file_get_contents("db/users/". $currentUser->email . ".json");
      $userObject = json_decode($userString);
      $passwordFromDB = $userObject -> password;

      $passwordFromUser = password_verify($password, $passwordFromDB);


      if($passwordFromDB == $passwordFromUser){
        $_SESSION ["LoggedIn"] = $userObject -> id;
        $_SESSION ["email"] = $userObject -> email;
        $_SESSION ["fullname"] = $userObject -> first_name . " " . $userObject -> last_name;
        $_SESSION ["designation"] = $userObject -> designation;
        $_SESSION ["department"] = $userObject -> department;
        $_SESSION ["registered"] = $userObject -> registered;

        if ($_SESSION["designation"] == "Patient"){

          redirect_to("patientdashboard.php");
      } elseif ($_SESSION["designation"] == "admin") {
        redirect_to("admin.php");
      } else {
        redirect_to("dashboard.php");       }


      }
        die();
      }

    }
  
    set_alert('error',"Invalid Email or Password");
    redirect_to("login.php");
    die();



?>
