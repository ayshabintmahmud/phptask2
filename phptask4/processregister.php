<?php session_start();
require_once('functions/users.php');

//collecting database

$errorcount = 0;

//verifying the database
date_default_timezone_set('Africa/Lagos');
$date = date("D M Y h:ia");

$first_name = $_POST['first_name'] != "" ? $_POST['first_name'] : $errorcount++;
$last_name = $_POST['last_name'] != "" ? $_POST['last_name'] : $errorcount++;
$email = $_POST['email'] != "" ? $_POST['email'] : $errorcount++;
$password = $_POST['password'] != "" ? $_POST['password'] : $errorcount++;
$gender = $_POST['gender'] != "" ? $_POST['gender'] : $errorcount++;
$designation = $_POST['designation'] != "" ? $_POST['designation'] : $errorcount++;
$department = $_POST['department'] != "" ? $_POST['department'] : $errorcount++;

$_SESSION ['first_name'] = $first_name;
$_SESSION ['last_name'] = $last_name;
$_SESSION ['email'] = $email;
$_SESSION ['gender'] = $gender;
$_SESSION ['designation'] = $designation;
$_SESSION ['department'] = $department;


if($errorcount > 0){
  $session_error = "You have" . $errorcount . "error";

  if ($errorcount > 1 ) {
    $session_error .=  "s";
  }

  $session_error .= " in your form submission";
  $_SESSION["error"] = $session_error;
  header("Location: register.php");

}else{
//count all users
$allUsers = scandir("db/users/"); //return @array (2 filled)
$countAllUsers = count($allUsers);
  $newUserId = ($countAllUsers+1);

  $userObject = [
    'id' => $newUserId,
    'first_name' => $first_name,
    'last_name' => $last_name,
    'email' => $email,
    'password' => password_hash($password,PASSWORD_DEFAULT),
    'gender' => $gender,
    'designation' => $designation,
    'department' => $department,
    'registered' => $date

];

$userExists = find_user($email);

        if($userExists){
            $_SESSION["error"] = "Registration Failed, User already exits ";
            header("Location: register.php");
            die();
        }
        

    //save in the database;
    save_user($userObject);

    $_SESSION["message"] = "Registration Successful, you can now login " . $first_name;
    header("Location: login.php");
      }

// Validating email entry
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo("$email is a valid email address");
} else {
  $_SESSION["error"] = "Invalid Email address" ;
    header("Location: register.php");
}

// validate first name
if (!preg_match("/^[a-zA-Z ]*$/",$first_name)) {
  $_SESSION["error"] = "For names Only letters and white space allowed" ;
    header("Location: register.php");
}
// validate second name
if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
  $_SESSION["error"] = "For names Only letters and white space allowed" ;
  header("Location: register.php");}
?>
