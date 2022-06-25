
<?php

// LET'S IMPLEMENT THE UTILISATEUR TABLE...
    class ModelUsers
    {
        // STATES OF USERMODEL
            private $response = true;

            private $errors = false;


        //THE FUNCTIONNALITY THAT GET THE CURRENT USER DATA...
            public function get_current_user_data($current_user_id)
            {
                // CEATE MY DATABASE OBJECT...
                    $my_db = new Database();

                // SQL INSTRUCTIONS TO MANIPULATE THE DABASSE TABLE UTILISATEUR...
                $sql_statement = "SELECT * FROM utilisateur WHERE userID = $current_user_id LIMIT 1";

                // SEND A REQUEST TO THE DATABASSE FOR RETRIEVING THE CURRENT USER...
                    $records = $my_db -> retrieve_data($sql_statement);

                    if ($records)
                    {
                        $data = $records[0];

                        return $data;
                    }
                    else
                    {
                        return $this -> false;
                    }


            }


    //THE FUNCTIONNALITY THAT GET THE PROFILE IMAGE OF THE USER...
        public function getCurrentProfileImage($user_id)
        {
            // CEATE MY DATABASE OBJECT...
                $my_db = new Database();  


            // SQL INSTRUCTIONS TO MANIPULATE THE DABASSE TABLE STUDENTS, AGENTS, ADMIN...
                $sql_statement_table_students = "SELECT profile_image FROM students
                WHERE studentID = $user_id LIMIT 1";

                $sql_statement_table_agent_uvs = "SELECT profile_image FROM agent_uvs
                WHERE agentID = $user_id LIMIT 1";

                $sql_statement_table_admin = "SELECT profile_image FROM admin_app
                WHERE adminID = $user_id LIMIT 1"; 


            // SEND A REQUEST TO THE DATABASSE FOR RETRIEVING THE CURRENT USER DATA...
                $records_students = $my_db -> retrieve_data($sql_statement_table_students); 

                $records_agent_uvs = $my_db -> retrieve_data($sql_statement_table_agent_uvs); 

                $records_admin = $my_db -> retrieve_data($sql_statement_table_admin);

                if ($records_students) 
                {
                    # THE USER IS A STUDENTS...
                        $data = $records_students[0];

                        return $data['profile_image']; 

                }
                else
                {
                    # THE USER IS NOT A STUDENTS...
                        if ($records_agent_uvs)
                        {
                            # THE USER IS AN AGENT UVS...
                            $data = $records_agent_uvs[0];

                            return $data['profile_image'];     
                        }
                        else
                        {
                            # THE USER IS AN ADMIN...
                            $data = $records_admin[0];

                            return $data['profile_image'];
                        } 
                }
                

        }


    //THE FUNCTIONNALITY THAT GET THE USER TYPE...
        public function getUserType($user_id)
        {
            // CEATE MY DATABASE OBJECT...
            $my_db = new Database();  


            // SQL INSTRUCTIONS TO MANIPULATE THE DABASSE TABLE STUDENTS, AGENTS, ADMIN...
                $sql_statement_table_students = "SELECT studentID FROM students
                WHERE studentID = $user_id LIMIT 1";

                $sql_statement_table_agentUVS = "SELECT agentID FROM agent_uvs
                WHERE agentID = $user_id LIMIT 1";

                $sql_statement_table_admin = "SELECT adminID FROM admin_app
                WHERE adminID = $user_id LIMIT 1"; 


            // SEND A REQUEST TO THE DATABASSE FOR RETRIEVING THE CURRENT USER DATA...
                $records_students = $my_db -> retrieve_data($sql_statement_table_students); 

                $records_agent_uvs = $my_db -> retrieve_data($sql_statement_table_agentUVS); 
                
                $records_admin = $my_db -> retrieve_data($sql_statement_table_admin);
            
                if ($records_students) {
                    # the user is a student...
                        return 'user_student';
                }
                else
                {
                    if ($records_agent_uvs) 
                    {
                        # the user is an agent uvs...
                            return "user_agent";
                    }
                    else
                    {
                        # the user identification is wrong...
                        return $this -> errors;
                    }
                
                }
                
        }

    }

?>