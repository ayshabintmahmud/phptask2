<?php session_start();


$errorcount = 0;

//setting date
date_default_timezone_set('Africa/Lagos');
$date = date("D M Y h:ia");


$apointmentdate = $_POST['apointmentdate'];
$apointmenttime = $_POST['apointmenttime'];
$apointmentnature = $_POST['apointmentnature'];
$complaint = $_POST['complaint'];
$apointmentdepartment = $_POST['apointmentdepartment'];
$fullname = $_SESSION ["fullname"];



$_SESSION['apointmentdate'] = $apointmentdate;
$_SESSION['apointmenttime'] = $apointmenttime;
$_SESSION['apointmentnature'] = $apointmentnature;
$_SESSION['complaint'] = $complaint;
$_SESSION['apointmentdepartment'] = $apointmentdepartment;



if($errorcount > 0){
  $session_error = "You have" . $errorcount . "error";

  if ($errorcount > 1 ) {
    $session_error .=  "s";
  }

  $session_error .= " in your form submission";
  $_SESSION["error"] = $session_error;
  header("Location: bookapointment.php");

}else{
//count all users
  $allUsers = scandir("db/appointments/");

  $countAllUsers = count($allUsers);

  $newUserId = ($countAllUsers-1);

  $userapointment = [
    'id' => $newUserId,
    'fullname' => $fullname,
    'apointmentdate' => $apointmentdate,
    'apointmenttime' => $apointmenttime,
    'apointmentnature' => $apointmentnature,
    'complaint' => $complaint,
    'apointmentdepartment' => $apointmentdepartment,
    'submit' => $date
];



//save appointments
file_put_contents("db/appointments/". $newUserId . ".json", json_encode ($userapointment));
    $_SESSION["message"] = "Appointment Successfully Submitted,Go back to Dashboard";
    header("Location: bookapointment.php");
    die();
   
}

?>
