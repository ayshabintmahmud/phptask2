<?php include_once('lib/header.php');
require_once('functions/alert.php');

//if (isset ($_SESSION ["LoggedIn"]) && ($_SESSION["LoggedIn"])){
 //   header("Location: dashboard.php");


// }


include_once('lib/header.php');

 ?>
 <div class="container">
<div class="row col-6">
<h3>Login</h3>
</div>
<div class="row col-6">

        <p>
        <?php print_alert(); ?>
        </p>
<form method="POST" action="processlogin.php">
        <p>
            <label>Email</label><br />
            <input

            <?php
                if(isset($_SESSION['email'])){
                    echo "value=" . $_SESSION['email'];
                }
            ?>

class="form-control" type="text" name="email" placeholder="Email"  />
        </p>

        <p>
            <label>Password</label><br />
            <input class="form-control"type="password" name="password" placeholder="Password"  />
        </p>


        <p>
            <button class="btn btn-sm btn-primary" type="submit">Login</button>
        </p>
        </p>
      <a  href="forgot.php"> forgot Password</a> | 
      <a  href="register.php"> Dont Have an Account</a>
    </form>

   </div>
   </div>