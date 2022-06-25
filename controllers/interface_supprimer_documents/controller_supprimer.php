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

            $success_message = null;

            $response = null;

            $image = null;

            $first_name = null;

            $last_name = null;

            $user_student = true;

            $supprimer_documents_view = "supprimer_documents_link";

            $logout = "../../controllers/logout/logout.php";

            $link_home = "../../index.php";

            $is_form_sent = false;

        # (FIRST TAST) INSIDE THE WEBSITE START THE SESSION (keep the user online and his own data available) OF THE USER 
            if ( isset( $_SESSION['user_id'] ))
            {
                
                $current_user_data = $model_login -> start_session_user($user_id);

            # (SECOND TAST) USER IDENTIFIED NOW LET'S GET THE PROFILE...   
                $response = $model_users -> getCurrentProfileImage($current_user_data["userID"]);
                
                if ($response) 
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
                        
                    # (FOURTH TASK) HANDLE THE FORM REQUEST FROM THE USER FOR DELETING DOCUMENTS...
                        if ($_SERVER["REQUEST_METHOD"] == "POST")
                        {
                            # GET THE USER DATA FROM THE FORM...
                                $ine = strip_tags($_POST["ine"]);

                                $programme_etude = $_POST["programme_etude"];

                                $specialite = $_POST["specialite"];

                                $annee_etude = $_POST["annee_etude"];
                                
                                $semestre_etude = $_POST["semestre_etude"];
                                
                                $documents_type = $_POST["documents_type"];

                                $is_form_sent = true;

                                if (strlen($ine) == 12)
                                {
                                    $ine = strtoupper($ine);

                                    # SEND A REQUEST TO MY DATABASE...
                                        $documents_deleted = $model_documents -> deleteDocuments($ine, $programme_etude, $specialite, $annee_etude, $semestre_etude, $documents_type);

                                    # HANDLE THE RESPONSE FROM THE DATABASE...
                                        if($documents_deleted  == "INE INTROUVABLE")
                                        {
                                            #INE NOT EXIST
                                                $errors_message = "INE INTROUVABLE";
                                        }
                                        else
                                        {
                                            if ($documents_deleted == "DOCUMENTS INTROUVABLES") 
                                            {
                                                # documents don't exist...
                                                $errors_message = "DOCUMENTS INTROUVABLES";
                                            } 
                                            else 
                                            {
                                                # documents exist...
                                                $documents_deleted = $_SESSION["documents_deleted"];
    
                                                if ($documents_deleted) 
                                                {
                                                    # DOCUMENTS DELETED SUCCESSFULLY...
                                                        $success_message = "DOCUMENTS SUPPRIMÉS";
                                                } 
                                                else 
                                                {
                                                    # DOCUMENTS DELETED UNSUCCESSFULLY...
                                                        $errors_message = "DOCUMENTS NON SUPPRIMÉS";
                                                }
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