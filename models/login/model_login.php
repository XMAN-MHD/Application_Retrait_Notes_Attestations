<?php

    // LET'S IMPLEMENT THE MODEL USERS :
    class ModelLogin
    {
        // STATE OF THE MODEL USERS :
        private $response = true;

        private $error = false;

        public $user_logged_in = false;


        //THE FUNCTIONNALITY THAT LOG IN THE USER :
        public function get_request($request)
        {   

            $email =$request['email'];
            
            $passcode =$request['passcode'];

            $my_db = new Database();

            $sql_statement = "SELECT * FROM utilisateur WHERE email = '$email' LIMIT 1";

            $data = $my_db -> retrieve_data($sql_statement);

            // LET'S TEST IF THE USER IS A MEMBER OF THE WEBSITE... 
            if ($data)
            {
                $user = $data[0];

                if($user['passcode'] == $passcode)
                {
                    // SUCCESSFUL LOG IN OF THE USER...
                    
                        // LET'S GET THE USER ID...
                            $_SESSION['user_id'] = $user['userID'];
                    
                            return $this -> response;
                }
                else
                {
                    // UNSUCCESSFUL LOG IN OF THE USER...
                        $this -> errors = true;

                        $this -> response = false;

                        return $this -> response;
                }

            } 
            else
            {
                // UNSUCCESSFUL LOG IN OF THE USER...
                    $this -> errors = true;

                    $this -> response = false;

                    return $this -> response;
            }
           
        }


        //THE FUNCTIONNALITY THAT START USER'S SESSION ALREADY LOGGED IN...
        public function start_session_user($user_id)
        { 
            if ( is_numeric( $user_id ) )
            {
                // CEATE MY DATABASE OBJECT...
                    $my_db = new Database();

                // SQL INSTRUCTIONS TO MANIPULATE THE DABASSE TABLE UTILISATEUR...
                    $sql_statement = "SELECT * FROM utilisateur WHERE userID = $user_id LIMIT 1";
                
                // SEND A REQUEST TO THE DATABASSE FOR RETRIEVING THE CURRENT USER...
                    $records = $my_db -> retrieve_data($sql_statement); 
                
                // HANDLING THE RESPONSE FROM THE DATABASE...    
                    if ($records)
                    {
                        // SUCCESSFUL USER IDENTIFICATION NOW GET THE USER INFORMATION... 
                            $current_user_data = $records[0];
                            
                            return $current_user_data;
                    }
                    
                    else
                    {
                        header("location: login.php");
                        die;    
                    }        
            }
            else
            {
                // UNSUCCESSFUL USER IDENTIFICATION REDIRECT TO LOGIN VIEW...
                header("location: login.php");
                die;    
            }
        }
    }

?>