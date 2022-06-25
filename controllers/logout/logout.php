<?php
    
    session_start();

    // STOP THE SESSION OF THE USER :
        if (isset($_SESSION["user_id"]))
        {
            unset($_SESSION["user_id"]);
        }
        else
        {
            $_SESSION["user_id"] = null;
        }

    // REDIRECT TO LOGIN PAGE CAUSE USER IS OFFLINE OR WE HAVE WRONG USER ID :
    header("location: ../../views/login/login.php");
