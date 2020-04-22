<?php

session_start();
require_once('functions/alert.php');
require_once('functions/users.php');



if(!is_user_LoggedIn() && !is_token_set()){
  $_SESSION["error"] = "You are not authourized to view this page";
  header("Location: login.php");
}



?>
<h3> Reset password</h3>
<p> Provide the Password  associated to your account : [email] </p>
      <p>
      <?php print_alert(); ?>
      </p>

<form method="POST" action="processreset.php">
<?php if(!is_user_LoggedIn()){ ?>
        <input
                <?php
                if(is_token_set_in_session()){
                echo "value='" . $_SESSION['token'] . "'";
            }else{
                echo "value='" . $_GET['token'] . "'";
            }
                      ?>
        type="hidden"  name="token"/>
      <?php }?>
      
        <p>
            <label>Email</label><br />
            <input <?php
            if(isset($_SESSION['email'])){
                      echo "Value =" . $_SESSION['email'];

                       }
     ?>
      type="text" name="email" placeholder="Email" />
        </p>


           <label for="">Enter New Password</label> <br />
           <input type="password" name="password" value="" placeholder="Password" >

        </p>

        <p>
            <button type="submit">Reset password</button>
        </p>
    </form>