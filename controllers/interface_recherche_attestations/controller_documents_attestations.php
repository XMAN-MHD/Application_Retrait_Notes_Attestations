
<!-- CONTROLLER FOR THE VIEW PROFILE | CERTIFICATIONS | DOCUMENTS ... -->

<?php
        
        session_start();
        
        # LET'S IMPORT THE CONTROLLERS AND MODELS NEEDED IN THIS PAGE... 
            include("../../models/database/my_db.php");

            include("../../models/login/model_login.php");

            include("../../models/users/model_users.php");

        # CREATE CONTROLLERS AND MODELS OBJECTS NEEDED FOR THIS PAGE...
            $model_login = new ModelLogin();

            $users_model = new ModelUsers();
        
        # SOME PIECE OF DATA NEEDED BY THE TASKS FOR THIS PAGE...
            $user_id = $_SESSION['user_id'];
        
            $current_user_data = null;
            
            $errors_message = null;
        
            $response = null;
        
            $image = null;
        
            $first_name = null;
        
            $last_name = null;

            $certifications_name = null;

            $certifications_img = null;

            $certifications_pdf = null;

            $user_student = true;

            $rechercher_attestations_view = "rechercher_attestations_link";

            $logout = "../../controllers/logout/logout.php";

            $link_home = "../../index.php";

        # (FIRST TAST) INSIDE THE WEBSITE START THE SESSION (keep the user online and his own data available) OF THE USER... 
            if ( isset( $_SESSION['user_id'] ))
            {
                
                $current_user_data = $model_login -> start_session_user($user_id);

            # (SECOND TAST) USER IDENTIFIED NOW LET'S GET THE PROFILE...   
                $response = $users_model -> getCurrentProfileImage($user_id);
                
                if ($response) 
                {
                    if(true)
                    {
                        # IMAGE SUCCESSFULLY GOT NOW LET'S GET USERNAME... 
                            $image = $response;

                            $first_name = $current_user_data['prenom'];

                            $last_name = $current_user_data['nom'];

                        # (THIRD TAST) GET THE TYPE OF THE USER...
                            $response = $users_model -> getUserType($user_id);

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
                                        header("location: login.php");
                                        die;
                                }   
                            } 
                                           
            # (FOURTH TASK) GET CERTIFICATIONS FIRST IMAGES AFTER PDF..
                            if (isset($_SESSION['certifications_name']))
                            {
                                # the certification exist...
                                $certifications_name = $_SESSION['certifications_name'];

                                if(isset($_SESSION['certifications_img']))
                                {
                                    $certifications_img = $_SESSION['certifications_img'];
                                    
                                    if(isset($_SESSION['certifications_pdf']))
                                    {
                                        $certifications_pdf = $_SESSION['certifications_pdf'];
                                    }
                                    else
                                    {
                                        # CERTIFACATIONS NOT FOUND REDIRECT TO SEARCH CERTIFICATIONS VIEW...
                                        header("location: rechercher_attestations.php");
                                        die;                        
                                    }
                                }
                                else
                                {
                                    # CERTIFACATIONS NOT FOUND REDIRECT TO SEARCH CERTIFICATIONS VIEW...
                                    header("location: rechercher_attestations.php");
                                    die;                        
                                }  
                            } 
                            else 
                            {
                                # the certification doen't exist...
                                header("location: rechercher_attestations.php");
                                die;
                            }
                    }
                    else 
                    {
                        # ACCES DENIED
                        header("location: rechercher_attestations.php");
                        die;
                        
                    }                                         
                } 
                else 
                {
                    # WRONG USER REDIRECT TO LIGIN VIEW...
                    header("location: login.php");
                    die;
                    
                }
            }
            // USER ID INVALID NOW REDIRECT THE USER TO LOGIN PAGE...
            else
            {
                header("location: login.php");
                die;
            }
?>