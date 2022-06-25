
<!-- CONTROLLER FOR THE VIEW PROFILE | GRADES | SEARCH ... -->
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
        
        # SOME PIECE OF DATA NEEDED BY THE TASKS FOR THIS PAGE...
            $user_id = $_SESSION['user_id'];
            
            $current_user_data = null;
        
            $errors_message = null;

            $response = null;

            $image = null;

            $first_name = null;

            $last_name = null;

            $user_student = true;

            $rechercher_notes_view = "rechercher_notes_link";

            $logout = "../../controllers/logout/logout.php";

            $link_home = "../../index.php";

            $is_form_sent = false;


        # (FIRST TAST) INSIDE THE WEBSITE START THE SESSION (keep the user online and his own data available) OF THE USER... 
            if ( isset( $_SESSION['user_id'] ))
            {
                
                $current_user_data = $model_login -> start_session_user($user_id);

            # (SECOND TAST) USER IDENTIFIED NOW LET'S GET THE PROFILE...   
                $response = $model_users -> getCurrentProfileImage($current_user_data["userID"]);
                
                if ($response) 
                {
                    # IMAGE SUCCESSFULLY GOT NOW LET'S GET USERNAME... 
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

                    # (FOURTH TAST) SEARCH FOR MARKS...
                        if ($_SERVER["REQUEST_METHOD"] == "POST") 
                        {
                            # HANDLE THE FORM REQUEST...
                            $ine = strip_tags($_POST["ine"]);
                
                            $programme_etude = $_POST["programme_etude"];
                                        
                            $specialite = $_POST["specialite"];
                                        
                            $annee_etude = $_POST["annee_etude"];

                            $semestre_etude = $_POST["semestre_etude"];

                            $is_form_sent = true;

                            if (strlen($ine) == 12)
                            {

                            # INE is correct...
                                $ine = strtoupper($ine);
                
                                $marks_img = $model_documents -> searchDocumentsMarksImg($ine, $programme_etude, $specialite, $annee_etude, $semestre_etude);
                                                    
                                $marks_pdf = $model_documents -> searchDocumentsMarksPdf($ine, $programme_etude, $specialite, $annee_etude, $semestre_etude);


                                if($marks_pdf == "INE INTROUVABLE" && $marks_img == "INE INTROUVABLE")
                                {
                                    
                                    #INE NOT EXIST
                                        $errors_message = "INE INTROUVABLE";
                                }
                                else
                                {
                                    if ($marks_pdf) 
                                    {
                                        # MARKS PDF FOUND ...
                                            $_SESSION['marks_pdf'] = $marks_pdf["marks_pdf"];

                                            $_SESSION['marks_name'] = $marks_pdf["marks_name"];
                                            
                                            if(isset($_SESSION['marks_pdf']))
                                            {
                                                if(isset($_SESSION['marks_name']))
                                                {
                                                    if ($marks_img) 
                                                    {
                                                        # MARKS PDF FOUND...
                                                            $_SESSION['marks_img'] = $marks_img;
                                                            header("location: documents_notes.php");
                                                            die;
                                                    }
                                                    else
                                                    {
                                                        # MARKS NOT FOUND...
                                                            $errors_message = "NOTES INTROUVABLES";
                                                    }
                                                }
                                                else
                                                {
                                                    # MARKS NOT FOUND...
                                                        $errors_message = "NOTES INTROUVABLES";
                                                }
                                            }
                                        # MARKS PDF NOT FOUND ...
                                            else
                                            {
                                                # MARKS NOT FOUND...
                                                    $errors_message = "NOTES INTROUVABLES";
                                            }    
                                    }
                                    else
                                    {
                                        # MARKS NOT FOUND...
                                            $errors_message = "NOTES INTROUVABLES";
                                    }
                                }
                            }
                            else 
                            {
                                # INE not correct...
                                    $errors_message = "INE INCORRECT";
                            }
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