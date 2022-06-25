
<?php

# IMPLEMENT DOCUMENTS TABLE...
    class ModelDocuments
    {

        # STATES OF DOCUMENTS MODEL
                private $response = true;

                private $errors = false;


        # THE FUNCTIONNALITY THAT GET IMAGES OF CERTIFICATIONS ...
                public function searchDocumentsCertificationsImg($ine, $programme_etude, $specialite, $annee_etude)
                {
                    // CEATE MY DATABASE OBJECT...
                        $my_db = new Database();
                    
                    // VERIFY THE INE OF THE USER...

                        // SQL INSTRUCTIONS TO MANIPULATE THE DABASSE TABLE DOCUMENTS...
                        $sql_statement_table_documents_INE = "SELECT * FROM documents WHERE ine = '$ine' LIMIT 1";

                        // SEND A REQUEST TO THE DATABASSE FOR VERIFYING THE USER'S INE...
                            $INE = $my_db -> retrieve_data($sql_statement_table_documents_INE);
                            
                            if ($INE) 
                            {
                                
                            # INE EXISTS...

                                // SQL INSTRUCTIONS TO MANIPULATE THE DABASSE TABLE DOCUMENTS...
                                    $sql_statement_table_documents = "SELECT * FROM documents WHERE ine = '$ine'

                                    AND programme_etude = '$programme_etude'

                                    AND specialite = '$specialite'

                                    AND annee_etude = '$annee_etude' 

                                    AND documents_type = 'attestations'

                                    LIMIT 1";

                                // SEND A REQUEST TO THE DATABASSE FOR VERIFYING THE DOCUMENTS REQUESTED BY THE USER... 
                                    $records_documents = $my_db -> retrieve_data($sql_statement_table_documents);

                                    if ($records_documents)
                                    {
                                        // DOCUMENTS FOUND NOW GET THE CERTIFIACTONS...
                                            $documents = $records_documents[0];

                                            $attestation_id = $documents['documentID'];

                                            // SQL INSTRUCTIONS TO MANIPULATE THE DABASSE TABLE ATTESTATIONS...
                                                $sql_statement_table_attestations = "SELECT attestations_img FROM attestations
                                                
                                                WHERE attestationID = '$attestation_id' LIMIT 1";

                                            // SEND A REQUEST TO THE DATABASSE FOR RETRIEVING THE CERTIFIACTIONA REQESTER BY THE USER...
                                                $records_attestations = $my_db -> retrieve_data($sql_statement_table_attestations);

                                                if ($records_attestations)
                                                {
                                                    # CERTIFICATIONS FOUND...
                                                        $image_array = $records_attestations[0];

                                                        $image = $image_array["attestations_img"];

                                                        return $image;
                                                } 
                                                else 
                                                {
                                                    # CERTIFICATIONS NOT FOUND...
                                                        return $this -> errors;
                                                }
                                    }
                                    else
                                    {
                                        return $this -> errors;
                                    }
                                }
                                
                                else 
                                {
                                
                                # INE NOT EXISTS...
                                    return "INE INTROUVABLE"; 
                                }
                }

                
        # THE FUNCTIONNALITY THAT GET DOCUMENTS PDF OF CERTIFICATIONS ...
            public function searchDocumentsCertificationsPdf($ine, $programme_etude, $specialite, $annee_etude)
            {
                // CEATE MY DATABASE OBJECT...
                    $my_db = new Database();

                // VERIFY THE INE OF THE USER...

                    // SQL INSTRUCTIONS TO MANIPULATE THE DABASSE TABLE DOCUMENTS...
                        $sql_statement_table_documents_INE = "SELECT * FROM documents WHERE ine = '$ine' LIMIT 1";
                   
                    // SEND A REQUEST TO THE DATABASSE FOR VERIFYING THE USER'S INE...
                        $INE = $my_db -> retrieve_data($sql_statement_table_documents_INE);
                        
                        if ($INE) 
                        {
                            
                        # INE EXISTS...

                            // SQL INSTRUCTIONS TO MANIPULATE THE DABASSE TABLE DOCUMENTS TABLE DOCUMENTS...
                                $sql_statement_table_documents = "SELECT * FROM documents WHERE ine = '$ine'

                                AND programme_etude = '$programme_etude'

                                AND specialite = '$specialite'

                                AND annee_etude = '$annee_etude' 

                                AND documents_type = 'attestations'

                                LIMIT 1";

                            // SEND A REQUEST TO THE DATABASSE FOR VERIFYING THE DOCUMENT REQUESTED BY THE USER...
                                $records_documents = $my_db -> retrieve_data($sql_statement_table_documents);

                                if ($records_documents)
                                {
                                    // DOCUMENTS FOUND NOW GET THE CERTIFIACTONS...
                                        $documents = $records_documents[0];

                                        $attestation_id = $documents['documentID'];

                                        // SQL INSTRUCTIONS TO MANIPULATE THE DABASSE TABLE ATTESTATIONS...
                                            $sql_statement_table_attestations = "SELECT attestations_pdf, attestations_name FROM attestations
                                            
                                            WHERE attestationID = '$attestation_id' LIMIT 1";

                                        // SEND A REQUEST TO THE DATABASSE FOR RETRIEVING THE CERTIFICATION REQUESTED BY THE USER...
                                            $records_attestations = $my_db -> retrieve_data($sql_statement_table_attestations);

                                            if ($records_attestations)
                                            {
                                                # CERTIFICATIONS FOUND...
                                                    $pdf_array = array("attestations_name" => $records_attestations[0]["attestations_name"],"attestations_pdf" => $records_attestations[0]["attestations_pdf"]);
                                                    
                                                    return $pdf_array;
                                            } 
                                            else 
                                            {
                                                # CERTIFICATIONS NOT FOUND...
                                                return $this -> errors;
                                            }
                                }

                                else
                                {
                                    return $this -> errors;
                                }
                        } 
                        
                        else 
                        {
                            
                        # INE NOT EXISTS...
                            return "INE INTROUVABLE"; 
                        }
            }


        # THE FUNCTIONNALITY THAT GET THE IMAGES OF MARKS...
            public function searchDocumentsMarksImg($ine, $programme_etude, $specialite, $annee_etude, $semestre_etude)
            {

                // CEATE MY DATABASE OBJECT...
                    $my_db = new Database();

                // VERIFY THE INE OF THE USER...

                    // SQL INSTRUCTIONS TO MANIPULATE THE DABASSE TABLE DOCUMENTS...
                        $sql_statement_table_documents_INE = "SELECT * FROM documents WHERE ine = '$ine' LIMIT 1";

                        // SEND A REQUEST TO THE DATABASSE FOR VERIFYING THE USER'S INE...
                            $INE = $my_db -> retrieve_data($sql_statement_table_documents_INE);
                            
                            if ($INE) 
                            {
                                # INE EXISTS...
                                
                                    // SQL INSTRUCTIONS TO MANIPULATE THE DABASSE TABLE DOCUMENTS...
                                        $sql_statement_table_documents = "SELECT * FROM documents 

                                        WHERE ine = '$ine'

                                        AND programme_etude = '$programme_etude'

                                        AND specialite = '$specialite'

                                        AND annee_etude = '$annee_etude'

                                        AND semestre_etude = '$semestre_etude' 

                                        AND documents_type = 'notes'

                                        LIMIT 1";

                                    // SEND A REQUEST TO THE DATABASSE FOR VERIFYING THE DOCUMENTS REQUESTED BY THE USER...
                                        $records_documents = $my_db -> retrieve_data($sql_statement_table_documents);

                                        if ($records_documents)
                                        {
                                            // DOCUMENTS FOUND NOW GET THE GRADES...
                                                $documents = $records_documents[0];

                                                $note_id = $documents['documentID'];

                                                // SQL INSTRUCTIONS TO MANIPULATE THE DABASSE NOTES...
                                                    $sql_statement_table_notes = "SELECT notes_img FROM notes

                                                    WHERE noteID = '$note_id' 

                                                    AND semestre_etude = '$semestre_etude'

                                                    LIMIT 1";

                                                // SEND A REQUEST TO THE DATABASSE FOR RETRIEVING THE GRADES REQUESTED BY THE USER...
                                                    $records_notes = $my_db -> retrieve_data($sql_statement_table_notes);
                                                    if ($records_notes)
                                                    {
                                                        # GRADES FOUND...
                                                            $image_array = $records_notes[0];

                                                            $image = $image_array["notes_img"];

                                                            return $image;
                                                    } 
                                                    else 
                                                    {
                                                        # GRADES NOT FOUND...
                                                            return $this -> errors;
                                                    }
                                                    
                                        }
                                        else
                                        {
                                            return $this -> errors;
                                        }
                            }
                            else 
                            {
                                
                            # INE NOT EXISTS...
                                return "INE INTROUVABLE"; 
                            }
                            
            }


        # THE FUNCTIONNALITY THAT GET DOCUMENTS PDF OF MARKS ...
            public function searchDocumentsMarksPdf($ine, $programme_etude, $specialite, $annee_etude, $semestre_etude)
            {
                // CEATE MY DATABASE OBJECT...
                $my_db = new Database();

                // VERIFY THE INE OF THE USER...

                    // SQL INSTRUCTIONS TO MANIPULATE THE DABASSE TABLE DOCUMENTS...
                        $sql_statement_table_documents_INE = "SELECT * FROM documents WHERE ine = '$ine' LIMIT 1";

                    // SEND A REQUEST TO THE DATABASSE FOR VERIFYING THE USER'S INE :
                        $INE = $my_db -> retrieve_data($sql_statement_table_documents_INE);
                        
                        if ($INE) 
                        {
                            # INE EXISTS...
                            
                                // SQL INSTRUCTIONS TO MANIPULATE THE DABASSE DOCUMENTS...
                                    $sql_statement_table_documents = "SELECT * FROM documents WHERE ine = '$ine'

                                    AND programme_etude = '$programme_etude'

                                    AND specialite = '$specialite'

                                    AND annee_etude = '$annee_etude'

                                    AND semestre_etude = '$semestre_etude'

                                    AND documents_type = 'notes'

                                    LIMIT 1";

                                // SEND A REQUEST TO THE DATABASSE FOR VERIFYING THE DOCUMENTS BY THE USER :
                                    $records_documents = $my_db -> retrieve_data($sql_statement_table_documents);
                            
                                    if ($records_documents)
                                    {
                                        // DOCUMENTS FOUND NOW GET THE MARKS...
                                            $documents = $records_documents[0];

                                            $note_id = $documents['documentID'];

                                            // SQL INSTRUCTIONS TO MANIPULATE THE DABASSE NOTES...
                                                $sql_statement_table_notes = "SELECT notes_name, notes_pdf FROM notes
                                                
                                                WHERE noteID = '$note_id' 
                                                
                                                AND semestre_etude = '$semestre_etude'
                                                
                                                LIMIT 1";

                                            // SEND A REQUEST TO THE DATABASSE FOR RETRIEVING THE GRADES REQUESTED BY THE USER :
                                                $records_notes = $my_db -> retrieve_data($sql_statement_table_notes);

                                                if ($records_notes)
                                                {
                                                    # GRADES FOUND...
                                                        $pdf_array = array("marks_name" => $records_notes[0]["notes_name"],"marks_pdf" => $records_notes[0]["notes_pdf"]);
                                                        return $pdf_array;
                                                } 
                                                else 
                                                {
                                                    # GRADES NOT FOUND...
                                                    return $this -> errors;
                                                }
                                                
                                    }
                                    else
                                    {
                                        return $this -> errors;
                                    }
                        }            
                        else 
                        {
                            
                        # INE NOT EXISTS...
                            return "INE INTROUVABLE"; 
                        }
            }


        # THE FUNCTIONNALITY THAT SAVE DOCUMENTS IN THE DATABASE ...
            public function saveDocuments($ine, $programme_etude, $specialite,  $annee_etude, $semestre_etude, $documents_type, $documents_pdf_name, $documents_pdf_location, $documents_pdf_type, $documents_pdf_tmp_name_location, $documents_pdf_error, $documents_pdf_size, $documents_jpg_name, $documents_jpg_location, $documents_jpg_type, $documents_jpg_tmp_name_location, $documents_jpg_error, $documents_jpg_size)
            {
                // GET A RANDOM NUMBER FOR THE DOCUMENT ID...
                    function getRandomNumber()
                    {
                        $random_number = rand(1, 1000000);
                        $random_number = ($random_number * 1000) + 1000;
                        return $random_number; 
                    }
                    $document_id = getRandomNumber();

                // VERIFY THE INE OF THE USER... 

                    // CEATE MY DATABASE OBJECT...
                    $my_db = new Database();

                    // SQL INSTRUCTIONS TO MANIPULATE THE DABASSE TABLE DOCUMENTS...
                    $sql_statement_table_documents_INE = "SELECT * FROM documents WHERE ine = '$ine' LIMIT 1";

                    // SEND A REQUEST TO THE DATABASSE FOR VERIFYING THE USER'S INE...
                        $INE = $my_db -> retrieve_data($sql_statement_table_documents_INE);   
                        
                        if ($INE) 
                        {
                            # INE EXISTS...

                                // CHECK IF THE DOCUMENTS EXIST BEFORE SAVAING...

                                    // GET THE NAME OF THE DOCUMENTS...
                                    $documents_path_info = pathinfo($documents_pdf_name);
                                    $file_name = $documents_path_info["filename"];

                                    // SQL INSTRUCTIONS TO MANIPULATE THE DABASSE TABLE DOCUMENTS...
                                    $sql_statement_table_documents_search = "SELECT * FROM documents WHERE documents_name = '$file_name'
                                    LIMIT 1";

                                    // SEND REQUEST TO MY DATABASE TO SEARCH THE DOCUMENTS...
                                    $records_document_exist = $my_db -> retrieve_data($sql_statement_table_documents_search);

                                    // HANDLING THE REQUEST FROM THE DATABASE...
                                    if ($records_document_exist)
                                    {
                                        return "DOCUMENTS DÈJÀ ENREGISTRÈS";
                                    }

                                // SQL INSTRUCTIONS TO MANIPULATE THE DABASSE TABLE DOCUMENTS...
                                    $sql_statement_table_documents = "INSERT INTO documents (documentID, documents_name, documents_type, ine, programme_etude, specialite, semestre_etude, annee_etude)
                                    VALUES ('$document_id', '$file_name', '$documents_type', '$ine', '$programme_etude', '$specialite', '$semestre_etude', '$annee_etude')";

                                // SEND A REQUEST TO THE DATABASSE FOR SAVING  DOCUMENTS...
                                    $documents_saved = $my_db -> save_data($sql_statement_table_documents);

                                // HANDLING THE REQUEST FROM THE DATABASE...   
                                    if($documents_saved)
                                    { 
                                        # DOCUMENTS SAVED SUCCESSFULLY NOW SAVE IT INTO ATTESTATION TABLE OR NOTES TABLE...
                                            if ($documents_type == "attestations") 
                                            {
                                                # SAVE THE CERTIFICATION DATA INTO ATTESTATION TABLE...
                                                    $this -> saveCertifications($document_id, $documents_pdf_name, $documents_pdf_location, $documents_pdf_type, $documents_pdf_tmp_name_location, $documents_pdf_error, $documents_pdf_size, $documents_jpg_name, $documents_jpg_location, $documents_jpg_type, $documents_jpg_tmp_name_location, $documents_jpg_error, $documents_jpg_size);
                                            }
                                            else 
                                            {

                                                if ($documents_type == "notes")
                                                {
                                                    # SAVE MARKS DATA INTO NOTES TABLE...
                                                        $this -> saveMarks($semestre_etude, $document_id, $documents_pdf_name, $documents_pdf_location, $documents_pdf_type, $documents_pdf_tmp_name_location, $documents_pdf_error, $documents_pdf_size, $documents_jpg_name, $documents_jpg_location, $documents_jpg_type, $documents_jpg_tmp_name_location, $documents_jpg_error, $documents_jpg_size);
                                                } 
                                                else 
                                                {
                                                    # DELETE THE DOCUMENTS BECAUSE THEY ARE NEITHER CERTIFICATIONS NOR MARKS...
                                                            
                                                        // SQL INSTRUCTIONS TO MANIPULATE THE DABASSE TABLE DOCUMENTS...
                                                            $sql_statement_table_documents = "DELETE FROM documents WHERE documentID = '$document_id' ";

                                                            return $this -> errors;
                                                } 
                                            }     
                                    }
                                    else
                                    {
                                        # DOCUMENTS SAVED UNSUCCESSFULLY...
                                            return $this -> errors;
                                    }            
                        }
                        else 
                        {     
                            # INE NOT EXISTS...
                                return "INE INTROUVABLE"; 
                        }
            }


        # THE FUNCTIONNALITY THAT SAVE CERTIFITIONS DATA IN THE DATABASE ...  
            public function saveCertifications($document_id, $documents_pdf_name, $documents_pdf_location, $documents_pdf_type, $documents_pdf_tmp_name_location, $documents_pdf_error, $documents_pdf_size, $documents_jpg_name, $documents_jpg_location, $documents_jpg_type, $documents_jpg_tmp_name_location, $documents_jpg_error, $documents_jpg_size)
            {
                // GET THE NAME OF THE CERTIFICATIONS DOCUMENTS...
                    $documents_path_info = pathinfo($documents_pdf_name);

                    $file_name = $documents_path_info["filename"];

                // CEATE MY DATABASE OBJECT...
                    $my_db = new Database();

                // MOVE THE FILES TO THE UPLOADS FOLDER...
                    $uploads_folder_pdf = '../uploads/attestations/pdf/' . $documents_pdf_name;
                    
                    $uploads_folder_jpg = '../uploads/attestations/jpg/' . $documents_jpg_name;

                    // MOVE PDF FILE FIRST...
                        $is_pdf_moved = move_uploaded_file("$documents_pdf_tmp_name_location", "$uploads_folder_pdf");

                        if ($is_pdf_moved)
                        {
                            # PDF UPLOADED NOW UPLOAD JPG...
                                $is_jpg_moved = move_uploaded_file("$documents_jpg_tmp_name_location", "$uploads_folder_jpg");

                                if ($is_jpg_moved)
                                {
                                    # JPG UPLOADED NOW SAVE DATA INTO THE CERTIFICATION TABLE...

                                        // SQL INSTRUCTIONS TO MANIPULATE THE DABASSE ATTESTATIONS...
                                            $sql_statement_table_attestations = "INSERT INTO attestations (attestationID, attestations_name, attestations_img, attestations_pdf)
                                            
                                            VALUES ('$document_id', '$file_name', '$uploads_folder_jpg', '$uploads_folder_pdf')";
                                        
                                        // SEND A REQUEST TO THE DATABASSE FOR SAVING  DOCUMENTS...
                                            $certifications_saved = $my_db -> save_data($sql_statement_table_attestations);
                                        
                                        // HANDLE THE RESPONSE FROM THE DATABASE...
                                            if ($certifications_saved)  
                                            {
                                                # DATA SAVED INTO CERTIFICATIONS TABLE...
                                                $_SESSION["documents_saved"] = true;
                                                return $this -> response;
                                            } 
                                            else 
                                            {
                                                # NOT SAVED DELETE DOCUMENTS...
                                                    $sql_statement_table_documents = "DELETE FROM documents WHERE documentID = '$document_id' ";
                                                    
                                                    $my_db -> save_data($sql_statement_table_documents);
                                                    
                                                    return $this -> errors;
                                            }
                                        
                                }
                                else
                                {
                                    # NOT UPLOADED DELETE DOCUMENTS DATA INTO THE TABLE DOCUMENTS...
                                        $sql_statement_table_documents = "DELETE FROM documents WHERE documentID = '$document_id' ";
                                        
                                        $my_db -> save_data($sql_statement_table_documents);
                                        
                                        return $this -> errors;
                                }
                        }
                        else
                        {
                            # NOT UPLOADED DELETE DOCUMENTS DATA INTO THE TABLE DOCUMENTS...
                                $sql_statement_table_documents = "DELETE FROM documents WHERE documentID = '$document_id' ";
                                
                                $my_db -> save_data($sql_statement_table_documents);
                                
                                return $this -> errors;
                        }
                        
            }  


        # THE FUNCTIONNALITY THAT SAVE MARKS DATA IN THE DATABASE ...  
            public function saveMarks($semestre_etude, $document_id, $documents_pdf_name, $documents_pdf_location, $documents_pdf_type, $documents_pdf_tmp_name_location, $documents_pdf_error, $documents_pdf_size, $documents_jpg_name, $documents_jpg_location, $documents_jpg_type, $documents_jpg_tmp_name_location, $documents_jpg_error, $documents_jpg_size)
            {
                // GET THE NAME OF THE MARKS DOCUMENTS...
                    $documents_path_info = pathinfo($documents_pdf_name);

                    $file_name = $documents_path_info["filename"];

                // CEATE MY DATABASE OBJECT...
                    $my_db = new Database();

                // MOVE THE FILES TO THE UPLOADS FOLDER...
                    $uploads_folder_pdf = '../uploads/notes/pdf/' . $documents_pdf_name;
                    
                    $uploads_folder_jpg = '../uploads/notes/jpg/' . $documents_jpg_name;

                // MOVE PDF FILES FIRST...
                    $is_pdf_moved = move_uploaded_file("$documents_pdf_tmp_name_location", "$uploads_folder_pdf");

                    if ($is_pdf_moved)
                    {
                        # PDF UPLOADED NOW UPLOAD JPG...
                            $is_jpg_moved = move_uploaded_file("$documents_jpg_tmp_name_location", "$uploads_folder_jpg");
                            
                            if ($is_jpg_moved)
                            {
                                    # JPG UPLOADED NOW SAVE DATA INTO THE MARKS TABLE...
                                        
                                        // SQL INSTRUCTIONS TO MANIPULATE THE DABASSE NOTES...
                                        $sql_statement_table_notes = "INSERT INTO notes (noteID, notes_name, semestre_etude, notes_img, notes_pdf)
                                        
                                        VALUES ('$document_id', '$file_name', '$semestre_etude', '$uploads_folder_jpg', '$uploads_folder_pdf')";
                                        
                                        // SEND A REQUEST TO THE DATABASSE FOR SAVING  DOCUMENTS...
                                        $notes_saved = $my_db -> save_data($sql_statement_table_notes);
                                        
                                        // HANDLE THE RESPONSE FROM THE DATABASE...
                                        if ($notes_saved) 
                                        {
                                            # DATA SAVED INTO GRADES TABLE...

                                            $_SESSION["documents_saved"] = true;

                                            return $this -> response;
                                        } 
                                        else 
                                        {
                                            # NOT SAVED DELETE DOCUMENTS...
                                                $sql_statement_table_documents = "DELETE FROM documents WHERE documentID = '$document_id' ";
                                                
                                                $my_db -> save_data($sql_statement_table_documents);
                                                
                                                return $this -> errors;
                                        }
                            }
                            else
                            {
                                # NOT UPLOADED DELETE DOCUMENTS DATA INTO THE TABLE DOCUMENTS...
                                    $sql_statement_table_documents = "DELETE FROM documents WHERE documentID = '$document_id' ";
                                    
                                    $my_db -> save_data($sql_statement_table_documents);
                                    
                                    return $this -> errors;
                            }   
                    }
                    else
                    {
                        # NOT UPLOADED DELETE DOCUMENTS DATA INTO THE TABLE DOCUMENTS...
                            $sql_statement_table_documents = "DELETE FROM documents WHERE documentID = '$document_id' ";
                            
                            $my_db -> save_data($sql_statement_table_documents);
                            
                            return $this -> errors;
                    }
            }


        # THE FUNCTIONNALITY THAT DELETE DOCUMENTS FROM THE DATABASE ...  
            public function deleteDocuments($ine, $programme_etude, $specialite, $annee_etude, $semestre_etude, $documents_type)
            {
                // CEATE MY DATABASE OBJECT...
                        $my_db = new Database();
                
                // VERIFY THE INE OF THE USER...
                    
                    // SQL INSTRUCTIONS TO MANIPULATE THE DABASSE TABLE DOCUMENTS...
                        $sql_statement_table_documents_INE = "SELECT * FROM documents WHERE ine = '$ine' LIMIT 1";

                        // SEND A REQUEST TO THE DATABASSE FOR VERIFYING THE USER'S INE...
                            $INE = $my_db -> retrieve_data($sql_statement_table_documents_INE);   
                            
                            if ($INE) 
                            {
                                # INE EXISTS...

                                // CHECK IF THE DOCUMENTS EXIST BEFORE DELETING...
                                    
                                    // GET THE DOCUMENTS WITH A QUERRY TO THE TABLE DOCUMENTS ...
                                    $sql_statement_table_documents_search =  "SELECT * FROM documents WHERE ine = '$ine' AND annee_etude = '$annee_etude' AND documents_type = '$documents_type' AND programme_etude ='$programme_etude' AND specialite='$specialite' LIMIT 1";
                                    
                                    // SEND REQUEST TO THE DATABASSE FOR VERIFYING THE DOCUMENTS...
                                    $records_document_exist = $my_db -> retrieve_data($sql_statement_table_documents_search);
                                    
                                    // HANDLING THE REQUEST FOR THE DATABASE...
                                    if (!$records_document_exist)
                                    {
                                        # documents don't exist...
                                        return "DOCUMENTS INTROUVABLES";
                                    }

                                // SQL INSTRUCTIONS TO MANIPULATE THE DABASSE TABLE DOCUMENTS...
                                    $sql_statement_table_documents_delete_certifications = "DELETE FROM documents WHERE ine = '$ine' AND annee_etude = '$annee_etude' AND documents_type = '$documents_type' AND programme_etude ='$programme_etude' AND specialite='$specialite'";
                                    
                                    $sql_statement_table_documents_delete_marks = "DELETE FROM documents WHERE ine = '$ine' AND annee_etude = '$annee_etude' AND documents_type = '$documents_type' AND semestre_etude ='$semestre_etude' AND programme_etude ='$programme_etude' AND specialite='$specialite'";
                                
                                // STEPS FOR DELETING THE CERTIFICATIONS...
                                    if ($documents_type == "attestations") 
                                    {
                                        # GET THE ID OF THE DOCUMENTS FROM THE TABLE DOCUMENTS...
                                            
                                            // SQL INSTRUCTIONS TO MANIPULATE THE DABASSE TABLE DOCUMENTS...
                                                $sql_statement_table_documents_get_documents_id = "SELECT documentID FROM documents WHERE ine = '$ine' AND annee_etude = '$annee_etude' AND documents_type = '$documents_type' AND programme_etude ='$programme_etude' AND specialite='$specialite'";
                                            
                                            // SEND A REQUEST TO THE DATABASSE TO GET THE ID...
                                                $documents_id = $my_db -> retrieve_data($sql_statement_table_documents_get_documents_id);         
                                        
                                        # DELETE DATA OF CERTIFICATIONS FROM THE DOCUMENTS TABLE...
                                            $documents_deleted = $my_db -> save_data($sql_statement_table_documents_delete_certifications);

                                            if ($documents_deleted) 
                                            {
                                                # DOCUMENTS DELETED SUCCESSFULLY NOW DELETE THE DATA OF DOCUMENTS FROM THE CERTIFICATIONS TABLE...                                  
                                                    if ($documents_id) 
                                                    {
                                                        # DELETE CERTIFICATIONS DATA FROM THE CERTIFICATIONS TABLE...
                                                            $this -> deleteCertificatins($documents_id);
                                                    } 
                                                    else 
                                                    {
                                                        # DOCUMENTS DELETED UNSUCCESSFULLY...
                                                            $_SESSION["documents_deleted"] = false;

                                                            return false;
                                                    }          
                                            } 
                                            else 
                                            {
                                                # NOT DELETED DOCUMENTS...
                                                $_SESSION["documents_deleted"] = false;

                                                return false;
                                            }  
                                    }
                                // STEPS FOR DELETING THE GRADES... 
                                    else if ($documents_type == "notes") 
                                    {
                                        # GET THE ID OF THE DOCUMENTS FROM THE TABLE DOCUMENTS...

                                            // SQL INSTRUCTIONS TO MANIPULATE THE DABASSE TABLE DOCUMENTS...
                                                $sql_statement_table_documents_get_documents_id = "SELECT documentID FROM documents WHERE ine = '$ine' AND annee_etude = '$annee_etude' AND documents_type = '$documents_type' AND programme_etude ='$programme_etude' AND specialite='$specialite'";
                                            
                                            // SEND A REQUEST TO THE DATABASSE TO GET THE ID...
                                                $documents_id = $my_db -> retrieve_data($sql_statement_table_documents_get_documents_id);         
                                        
                                        # DELETE DATA OF MARKS FROM THE DOCUMENTS TABLE...
                                            $documents_deleted = $my_db -> save_data($sql_statement_table_documents_delete_marks);
                                            
                                        # HANDLING THE REQUEST FROM THE DATABASE...
                                            if ($documents_deleted) 
                                            {
                                                # DOCUMENTS DELETED SUCCESSFULLY NOW DELETE THE DATA OF DOCUMENTS FROM THE GRADES TABLE...                                  
                                                    if ($documents_id) 
                                                    {
                                                        # DELETE GRADES DATA FROM THE TABLE GRADES...  
                                                            $this -> deleteMarks($documents_id, $semestre_etude);
                                                    } 
                                                    else 
                                                    {
                                                        # DOCUMENTS DELETED UNSUCCESSFULLY...
                                                            $_SESSION["documents_deleted"] = false;

                                                            return false;
                                                    }          
                                            } 
                                            else 
                                            {
                                                # NOT DELETED DOCUMENTS...
                                                $_SESSION["documents_deleted"] = false;

                                                return false;
                                            }  
                                    }
                                    else
                                    {
                                        # NOT DELETED DOCUMENTS...
                                            $_SESSION["documents_deleted"] = false;

                                            return false;
                                    }
                            }
                            else 
                            {     
                                # INE NOT EXISTS...
                                    return "INE INTROUVABLE"; 
                            }  
            }


        # THE FUNCTIONNALITY THAT DELETE CERTIFICATIONS DATA FROM THE DATABASE ...  
            public function deleteCertificatins($documents_id)
            {
                // GET CERTIFICATIONS ID ...
                    $certifications_id = $documents_id[0]["documentID"];

                // CEATE MY DATABASE OBJECT...
                    $my_db = new Database();

                // SQL INSTRUCTIONS TO MANUPULATE THE DATABASE TABLE ATTESTATIONS...
                    $sql_statement_table_certifications_delete = "DELETE FROM attestations WHERE attestationID = '$certifications_id'";
               
                // SEND A REQUEST TO THE DATABASE FOR DELETING CERTIFICATIONS DATA...
                    $certifications_deleted = $my_db -> save_data($sql_statement_table_certifications_delete);
            
                // HANDLE THE RESPONSE FROM THE DATABASE...
                    if ($certifications_deleted) 
                    {
                        # CERTIFICATIONS DATA DELETED SUCCESSFULLY...
                        $_SESSION["documents_deleted"] = true;

                        return true;
                    }
                    else 
                    {
                        # CERTIFICATIONS DATA DELETED UNSUCCESSFULLY...
                        $_SESSION["documents_deleted"] = false;

                        return false;
                    }
                    
            }


        # THE FUNCTIONNALITY THAT DELETE MARKS DATA FROM THE DATABASE ...  
            public function deleteMarks($documents_id, $semestre_etude)
            {
                // GET MARKS ID AND SEMESTRE ETUDE...
                $note_id = $documents_id[0]["documentID"];

                // CEATE MY DATABASE OBJECT...
                    $my_db = new Database();

                // SQL INSTRUCTIONS TO MANUPULATE THE DATABASE TABLE NOTES...
                    $sql_statement_table_marks_delete = "DELETE FROM notes WHERE noteID = '$note_id' AND semestre_etude = '$semestre_etude' ";
                
                // SEND A REQUEST TO THE DATABASE FOR DELETING CERTIFICATIONS DATA...
                    $marks_deleted = $my_db -> save_data($sql_statement_table_marks_delete);
                    
                // HANDLE THE RESPONSE FROM THE DATABASE...    
                    if ($marks_deleted) 
                    {
                        # MARKS DATA DELETED SUCCESSFULLY...
                        $_SESSION["documents_deleted"] = true;

                        return true;
                    }
                    else 
                    {
                        # MARKS DATA DELETED UNSUCCESSFULLY...
                        $_SESSION["documents_deleted"] = false;

                        return false;
                    }
            }
    }

?>