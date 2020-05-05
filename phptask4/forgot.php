<?php

include_once('lib/header.php');
require_once('functions/alert.php');

?>
<div class="container">
<div class="row col-6">
<h3> Forgot password</h3>
</div>
<div class="row col-6">
<p> Provide the email address associated to your account</p>
</div>
            <p>
            <?php print_alert(); ?>
            </p>


<div class="row col-6">
<form method="POST" action="processforgot.php">
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
            <button class="btn btn-sm btn-primary" type="submit">Send Reset Code</button>
        </p>
    </form>
    </div>
    </div>