
<!-- CONTROLLER FOR THE VIEW  PROFILE | CERTIFICATIONS | SEARCH ... -->

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

            $ine = null;

            $programme_etude = null;

            $specialite = null;

            $annee_etude = null;

            $user_student = true;

            $rechercher_attestations_view = "rechercher_attestations_link";
        
            $accueil_link = "../../index.php";
            
            $attestations_link = "../interface_recherche_attestations/rechercher_attestations.php";

            $notes_link = "../interface_recherche_notes/rechercher_notes.php";

            $enregistrer_link = "../interface_enregistrer_documents/enregistrer_documents.php";

            $supprimer_link = "../interface_supprimer_documents/supprimer.php";

            $logout = "../../controllers/logout/logout.php";

            $link_home = "../../index.php";

            $is_form_sent = false;

        # (FIRST TAST) INSIDE THE WEBSITE START THE SESSION (keep the user online and his own data available) OF THE USER 
            if ( isset( $_SESSION['user_id'] ))
            {
                
                    $current_user_data = $model_login -> start_session_user($user_id);

                # (SECOND TAST) USER IDENTIFIED NOW LET'S GET THE PROFILE...   
                    $response = $model_users -> getCurrentProfileImage($user_id);
                    
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
                            
                        # (FOURTH TASK) SEARCH FOR A CERTIFICATION...
                            if ($_SERVER["REQUEST_METHOD"] == "POST") 
                            {
                                # HANDLE THE FORM REQUEST...
                                    $ine = strip_tags($_POST["ine"]);

                                    $programme_etude = $_POST["programme_etude"];

                                    $specialite = $_POST["specialite"];

                                    $annee_etude = $_POST["annee_etude"];

                                    $is_form_sent = true;
                                    
                                    if (strlen($ine) == 12) 
                                    {
                                        # INE is correct...

                                            $ine = strtoupper($ine);

                                            $certifications_pdf = $model_documents -> searchDocumentsCertificationsPdf($ine, $programme_etude, $specialite, $annee_etude);
                                            
                                            $certifications_img = $model_documents -> searchDocumentsCertificationsImg($ine, $programme_etude, $specialite, $annee_etude);

                                            if($certifications_pdf == "INE INTROUVABLE" && $certifications_img == "INE INTROUVABLE")
                                            {
                                                #INE NOT EXIST
                                                    $errors_message = "INE INTROUVABLE";
                                            }
                                            else
                                            {
                                                if ($certifications_pdf) 
                                                {
                                                # CERTIFICATION PDF FOUND ...
                                                    $_SESSION['certifications_pdf'] = $certifications_pdf["attestations_pdf"];
                                                    
                                                    $_SESSION['certifications_name'] = $certifications_pdf["attestations_name"];
                                                    
                                                    if(isset($_SESSION['certifications_pdf']))
                                                    {
                                                        if(isset($_SESSION['certifications_name']))
                                                        {
                                                            if ($certifications_img) 
                                                            {
                                                                # CERTIFICATION PDF FOUND...
                                                                    $_SESSION['certifications_img'] = $certifications_img;
                                                                   
                                                                    header("location: documents_attestations.php");
                                                                    
                                                                    die;
                                                            }
                                                            else
                                                            {
                                                                # CERTIFICATION NOT FOUND...
                                                                    $errors_message = "ATTESTATIONS INTROUVABLES";
                                                            }
                                                        }
                                                        else
                                                        {
                                                            # CERTIFICATION NOT FOUND...
                                                                $errors_message = "ATTESTATIONS INTROUVABLES";
                                                        }
                                                    }
                                                # CERTIFICATION PDF NOT FOUND ...
                                                    else
                                                    {
                                                        # CERTIFICATION NOT FOUND...
                                                            $errors_message = "ATTESTATIONS INTROUVABLES";
                                                    }        
                                                }

                                                else
                                                {
                                                # CERTIFICATION NOT FOUND...
                                                     $errors_message = "ATTESTATIONS INTROUVABLES";
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
        # USER ID INVALID NOW REDIRECT THE USER TO LOGIN PAGE : 
            else
            {
                header("location: login.php");
                die;
            }
    ?>