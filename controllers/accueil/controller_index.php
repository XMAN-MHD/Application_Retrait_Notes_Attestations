<!-- THE CONTROLLER FOR THE VIEW HOME -->
<?php
    
    session_start();
    
    # LET'S IMPORT THE CONTROLLERS AND MODELS NEEDED IN THIS PAGE : 
        include("./models/database/my_db.php");

        include("./models/login/model_login.php");

        include("./models/users/model_users.php");

    # CREATE CONTROLLERS AND MODELS OBJECTS NEEDED FOR THIS PAGE: 
        $model_login = new ModelLogin();

        $model_users = new ModelUsers();
    
    # SOME PIECE OF DATA NEEDED BY THE TASKS FOR THIS PAGE :
        $user_id = $_SESSION['user_id'];
        
        $current_user_data = null;
    
        $errors_message = null;

        $response = null;

        $image = null;

        $first_name = null;

        $last_name = null;
        
        $user_student = true;

        $logout = "./controllers/logout/logout.php";

        $link_home = "index.php";

    # (FIRST TAST) INSIDE THE WEBSITE START THE SESSION (keep the user online and his own data available) OF THE USER 
        if ( isset( $_SESSION['user_id'] ))
        {
            
            $current_user_data =  $model_login -> start_session_user($user_id);
        
            # (SECOND TAST) USER IDENTIFIED NOW LET'S GET THE PROFILE...   
                $response = $model_users -> getCurrentProfileImage($user_id);
                
                if ($response) 
                {
                    # IMAGE SUCCESSFULLY GOT NOW LET'S GET USERNAME 
                        $image = $response;

                        $patterns = '/[\.]{2}/';

                        $replacements = './views';

                        $image = preg_replace($patterns, $replacements, $image);

                        $first_name = $current_user_data['prenom'];

                        $last_name = $current_user_data['nom'];
                    
                    # (THIRD TAST) GET THE TYPE OF THE USER...
                        $response = $model_users -> getUserType($user_id);

                        if ($response == "user_student")
                         {
                           
                            # THE USER IS A STUDENT...
                                $user_student = true;
                        } 
                        else 
                        {
                            
                            if ($response == "user_agent")
                            {
                                # THE USER IS AN AGENT UVS
                                    $user_student = false;
                            }
                            else
                            {
                                # THE TYPE OF THE USER IS UNKNOWN...
                                    header("location: ./views/login/login.php");
                                    die;
                            }   
                        }
                        
                } 
                else 
                {
                    # WRONG USER REDIRECT TO LIGIN VIEW
                    header("location: ./views/login/login.php");
                    die;
                    
                }
        }
         
        else
        {
            // USER ID INVALID NOW REDIRECT THE USER TO LOGIN PAGE..
                header("location: ./views/login/login.php");
                die;
        }
?>
