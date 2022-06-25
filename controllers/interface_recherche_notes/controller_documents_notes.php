
<!-- CONTROLLER FOR THE VIEW PROFILE | GRADES | DOCUMENTS ... -->
    <?php
        
        session_start();
        
    # LET'S IMPORT THE CONTROLLERS AND MODELS NEEDED IN THIS PAGE : 
            include("../../models/database/my_db.php");

            include("../../models/login/model_login.php");

            include("../../models/users/model_users.php");
            
            include("../../models/documents/model_documents.php");

        # CREATE CONTROLLERS AND MODELS OBJECTS NEEDED FOR THIS PAGE: 
            $model_login = new ModelLogin();

            $model_users = new ModelUsers();
            
            $model_documents = new ModelDocuments();


        
        # SOME PIECE OF DATA NEEDED BY THE TASKS FOR THIS PAGE :
            $user_id = $_SESSION['user_id'];
            
            $current_user_data = null;
        
            $errors_message = null;

            $response = null;

            $image = null;

            $first_name = null;

            $last_name = null;

            $marks_img = null; 

            $marks_pdf = null;

            $user_student = true;

            $rechercher_notes_view = "rechercher_notes_link";

            $logout = "../../controllers/logout/logout.php";

            $link_home = "../../index.php";

        # (FIRST TAST) INSIDE THE WEBSITE START THE SESSION (keep the user online and his own data available) OF THE USER 
            if ( isset( $_SESSION['user_id'] ))
            {
                
                $current_user_data = $model_login -> start_session_user($user_id);

            # (SECOND TAST) USER IDENTIFIED NOW LET'S GET THE PROFILE...   
                $response = $model_users -> getCurrentProfileImage($current_user_data["userID"]);
                
                if ($response) 
                {
                    if(true)
                    {
                        # IMAGE SUCCESSFULLY GOT NOW LET'S GET USERNAME 
                            $image = $response;

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
                                        header("location: login.php");
                                        die;
                                }   
                            }                            
    
                        #(FOURTH TAST) GET MARKS FIRST IMAGES AFTER PDF.. 
                            if (isset($_SESSION['marks_name']))
                            {
                                # marks exist...
                                $marks_name = $_SESSION['marks_name'];

                                if(isset($_SESSION['marks_img']))
                                {
                                    $marks_img = $_SESSION['marks_img'];
                                    
                                    if(isset($_SESSION['marks_pdf']))
                                    {
                                        $marks_pdf = $_SESSION['marks_pdf'];
                                    }
                                    else
                                    {
                                        # MARKS NOT FOUND REDIRECT TO SEARCH MARKS VIEW...
                                        header("location: rechercher_marks.php");
                                        die;                        
                                    }
                                }
                                else
                                {
                                    # MARKS NOT FOUND REDIRECT TO SEARCH MARKS VIEW...
                                    header("location: rechercher_marks.php");
                                    die;                        
                                }  
                            } 
                            else
                            {
                                # MARKS NOT FOUND REDIRECT TO SEARCH MARKS VIEW...
                                header("location: rechercher_notes.php");
                                die;                        
                            }   
                    }
                    else 
                    {
                        # ACCES DENIED
                        header("location: rechercher_notes.php");
                        die;
                        
                    }
                } 
                else 
                {
                    # WRONG USER REDIRECT TO LIGIN VIEW
                    header("location: login.php");
                    die;
                    
                }
            }
                // USER ID INVALID NOW REDIRECT THE USER TO LOGIN PAGE : 
            else
            {
                header("location: login.php");
                die;
            }
    ?>