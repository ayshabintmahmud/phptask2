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
<a class="btn btn-primary" href="adduser.php">Add User</a>
<a class="btn btn-primary" href="allstaff.php">View Staffs</a>
<a class="btn btn-primary" href="allpatient.php">View Patients</a>
<a class="btn btn-primary" href="viewpayments.php">Payment Record</a>
 
</p>
<hr />
 <p><?php print_alert(); ?> </p>

<h3> Super Admin Space</h3>

<table>
  <tr>
    <th>Admin </th>
    <th> Details</th>
  </tr>
  <tr>
    <td>You are logged in as</td>
    <td> an Admin</td>

  </tr>


  <tr>
    <td>Last Login :</td>
    <td><?php last_login(); ?></td>
  </tr>

</table>

     </body>
