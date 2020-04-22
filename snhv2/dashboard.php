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
h3{
  textalign:center;
}
</style>

<body>
<p> 

<a class="btn btn-primary" href="viewapointment.php">view appointment</a> 

</p>
<hr />
<p> <?php print_alert(); ?> </p>

<h3 >Medical Team DashBoard</h3>
<P>Welcome, <?php echo $_SESSION["fullname"];?>. </p>
<table>
  <tr>
    <th>Medical Team </th>
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
