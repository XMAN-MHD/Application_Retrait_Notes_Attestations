<?php
# CONTROLLER FOR THE WIEV LOGIN ... 
    session_start();

    // OUTSIDE THE WEBSITE LET'S MAKE SURE THERE IS NO SESSION :
        unset($_SESSION["user_id"]);

    // LET'S IMPORT THE CONTROLLERS NEEDED IN THIS PAGE : 
        include("../../models/database/my_db.php");

        include("../../models/login/model_login.php");

        $email = "";

        $errors_message = "";

    // LET'S HANDLE THE FORM SUBMITED BY THE USER :
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $login_controller = new modelLogin();

            $response = $login_controller -> get_request($_REQUEST);

            if ($response)
            {
                
            header("location: ../../index.php");

            die;
            }
            else
            {
    
                $email = $_REQUEST['email'];

                $errors_message = "email or password invalid";
                    
            }
        }
?>