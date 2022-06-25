<!-- CONTROLLER FOR THE VIEW PROFILE | SAVE DOCUMENTS ... -->
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

            $exist_message = null;
            
            $success_message = null;

            $response = null;

            $image = null;

            $first_name = null;

            $last_name = null;

            $ine = null;

            $programme_etude = null;

            $specialite = "null";

            $annee_etude = null;
            
            $semestre_etude = "null";
            
            $documents_type = null;
            
            $user_student = true;

            $enregistrer_documents_view = "enregistrer_documents_link";

            $logout = "../../controllers/logout/logout.php";

            $link_home = "../../index.php";

            $is_form_sent = false;


        # (FIRST TASK) INSIDE THE WEBSITE START THE SESSION (keep the user online and his own data available) OF THE USER 
            if ( isset( $_SESSION['user_id'] ))
            {
                
                $current_user_data = $model_login -> start_session_user($user_id);

            # (SECOND TASK) USER IDENTIFIED NOW LET'S GET THE PROFILE...   
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

                    # (FOURTH TASK) HANDLE THE DOCUMENTS UPLOADED AND FORM REQUEST...
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
                                    # INE is correct...
                                        $ine = strtoupper($ine); 

                                        # GET THE DATA OF THE DOCUMENTS UPLOADED...
                                            # FOR THE PDF DOCUMENTS...
                                                $documents_pdf_name = $_FILES["documents_pdf"]["name"];
                                                
                                                $documents_pdf_location = $_FILES["documents_pdf"]["full_path"];
                                                
                                                $documents_pdf_type = $_FILES["documents_pdf"]["type"];
                                                
                                                $documents_pdf_tmp_name_location = $_FILES["documents_pdf"]["tmp_name"];
                                                
                                                $documents_pdf_error = $_FILES["documents_pdf"]["error"];
                                                
                                                $documents_pdf_size = $_FILES["documents_pdf"]["size"]; 

                                            # FOR THE JPG DOCUMENTS...
                                                $documents_jpg_name = $_FILES["documents_jpg"]["name"];
                                                
                                                $documents_jpg_location = $_FILES["documents_jpg"]["full_path"];
                                                
                                                $documents_jpg_type = $_FILES["documents_jpg"]["type"];
                                                
                                                $documents_jpg_tmp_name_location = $_FILES["documents_jpg"]["tmp_name"];
                                                
                                                $documents_jpg_error = $_FILES["documents_jpg"]["error"];
                                                
                                                $documents_jpg_size = $_FILES["documents_jpg"]["size"];


                                            # SEND A REQUEST TO MY DATABASE...
                                                $model_documents_response = $model_documents -> saveDocuments($ine, $programme_etude, $specialite,  $annee_etude, $semestre_etude, $documents_type, $documents_pdf_name, $documents_pdf_location, $documents_pdf_type, $documents_pdf_tmp_name_location, $documents_pdf_error, $documents_pdf_size, $documents_jpg_name, $documents_jpg_location, $documents_jpg_type, $documents_jpg_tmp_name_location, $documents_jpg_error, $documents_jpg_size);
                                            
                                            # HANDLE THE RESPONSE FROM THE DATABASE...
                                                if($model_documents_response  == "INE INTROUVABLE")
                                                {
                                                    # INE NOT EXIST
                                                        $errors_message = "INE INTROUVABLE";
                                                        
                                                }
                                                else
                                                {
                                                    # INE EXIST
                                                        if ($model_documents_response == "DOCUMENTS DÈJÀ ENREGISTRÉS") 
                                                        {
                                                            # documents already exist...
                                                                $exist_message = $model_documents_response;
                                                        }
                                                        else 
                                                        {
                                                            # documents don't exist...
                                                                $documents_saved = $_SESSION["documents_saved"];

                                                                if ($documents_saved) 
                                                                {
                                                                    # DOCUMENTS SAVED SUCCESSFULLY...
                                                                        $success_message = "DOCUMENTS ENREGISTRÉS";
                                                                } 
                                                                else 
                                                                {
                                                                    # DOCUMENTS SAVED UNSUCCESSFULLY...
                                                                        $errors_message = "DOCUMENTS NON ENREGISTRÉS";
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
                    // USER ID INVALID NOW REDIRECT THE USER TO LOGIN PAGE : 
                else
                {
                    header("location: ../../views/login/login.php");
                    die;
                }
            }
    ?>