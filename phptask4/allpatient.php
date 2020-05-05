<?php 
include_once('lib/header.php');
require_once('functions/users.php');

View_patient();


     ?>

<a class="btn btn-primary" href="admin.php">Back to Dashboard</a> 
<hr >
<h3>A list of Entire Patients</h3>

     <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Patient ID</th>
                        <th>Patient Name</th>
                        <th>Patient Email</th>
                        <th>Patient Department</th>
                    </tr>
                </thead>
                <tbody>
               <?php
                $seepatient = View_patient();
                echo $seepatient;
               ?>
                    
                </tbody>
            </table>
            
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