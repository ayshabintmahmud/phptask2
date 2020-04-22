<?php 
include_once('alert.php');

function is_user_LoggedIn(){

    if($_SESSION['LoggedIn'] && !empty($_SESSION['LoggedIn'])){
        return true;
    }

    return false;
}

function is_token_set(){
    return is_token_set_in_get() || is_token_set_in_session();
   }


function is_token_set_in_session(){
    return isset($_SESSION['token']);
}

function is_token_set_in_get(){

    return isset($_GET['token']); 

}

function find_user($email = ""){
    //check the database if the user exsits
    if(!$email){
        set_alert('error','User Email is not set');
        die();
    }
    $allUsers = scandir("db/users/"); //return @array (2 filled)
    $countAllUsers = count($allUsers);

    for ($counter = 0; $counter < $countAllUsers ; $counter++) {
       
        $currentUser = $allUsers[$counter];

        if($currentUser == $email . ".json"){
          //check the user password.
            $userString = file_get_contents("db/users/".$currentUser);
            $userObject = json_decode($userString);
                       
            return $userObject;
          
        }       
        
    }

    return false;
}

function save_user($userObject){
    file_put_contents("db/users/". $userObject['email'] . ".json", json_encode($userObject));
}

function last_login(){
    $email = $_SESSION['email'];
    
    $alldate = scandir("date/");
    $countAllUsers = count($alldate);
  
    for ($counter = 0; $counter < $countAllUsers; $counter++ ){
  
      $currentdate = $alldate[$counter];
  
      if($currentdate == $email . ".json"){
        $userString = file_get_contents("date/". $currentdate);
        $userdate = json_decode($userString);
        $_SESSION ["lastLogin"] = $userdate -> lastLogin;

        echo $_SESSION["lastLogin"];

          die();
        }
    }
}

function View_patient(){
    $patientRows = "";
    $allpatient = scandir("db/users/");
$countallpatient = count($allpatient);

for ($counter = 2; $counter < $countallpatient; $counter++ ){

  $currentpatient =$allpatient[$counter]; 
    $patient = file_get_contents("db/users/". $currentpatient);
    $userpatient = json_decode($patient);
   
    if($userpatient->designation == "Patient" ){
      $patientRows .= "
        <tr>
              <td>$userpatient->id</td>
              <td>$userpatient->first_name . $userpatient->last_name</td>
              <td>$userpatient->email</td>
              <td>$userpatient->department</td>
          </tr>
          ";
    }
  }
  return $patientRows;
  }

  function View_staff(){
    $staffRows = "";
    $allstaff = scandir("db/users/");
$countallstaff = count($allstaff);

for ($counter = 2; $counter < $countallstaff; $counter++ ){

  $currentstaff =$allstaff[$counter]; 
    $staff = file_get_contents("db/users/". $currentstaff);
    $userstaff = json_decode($staff);
   
    if($userstaff->designation == "Medical Team" ){
      $staffRows .= "
        <tr>
              <td>$userstaff->id</td>
              <td>$userstaff->first_name  $userstaff->last_name</td>
              <td>$userstaff->email</td>
              <td>$userstaff->department</td>
          </tr>
          ";
    }
  }
  return $staffRows;
  }
?>