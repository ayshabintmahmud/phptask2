<?php
include_once('lib/header.php');
require_once('functions/alert.php');
require_once('functions/users.php');


if (!isset ($_SESSION["LoggedIn"])){
    header("Location : login.php");
}

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
<body>
<p> 
<a class="btn btn-primary" href="paybill.php">Pay Bills</a> 
<a class="btn btn-primary" href="bookapointment.php">Book Appointment</a> 
</p>
<hr />
<p>
        <?php print_alert(); ?>
        </p>

<h3 >Patient DashBoard</h3>
<P>Welcome, <?php echo $_SESSION["fullname"];?>. </p>
<table>
  <tr>
    <th>Patient </th>
    <th> Details</th>
  </tr>
  <tr>
    <td>You are logged in as</td>
    <td><?php echo $_SESSION["designation"]; ?></td>
  
  </tr>
  <tr>
    <td>Your Assigned ID is</td>
    <td><?php echo $_SESSION["LoggedIn"]; ?></td>
    
  </tr>
  <tr>
    <td>Your Department</td>
    <td><?php  echo $_SESSION["department"]; ?></P></td>
  </tr>
  <tr>
    <td>Registered on</td>
    <td><?php echo $_SESSION["registered"]; ?></td>
   
  </tr>
  <tr>
    <td>Last Login :</td>
    <td><?php 
   last_login();
    ?></td>
   
  </tr>
  
</table>

  </body> 
