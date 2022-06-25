<?php

    // LET'S IMPLEMENT MY DATABASE :
    class Database 
    {
        // INFORMATION ABOUT MY DABASE :
        private $db_server = "localhost";

        private $username = "root";

        private $password = "";

        private $db_link = "app_memory_db";

        // LET'S CONNECT TO THE DATABASE SERVER :
        private function connect_to_db ()
        {
            $db_connected = mysqli_connect($this -> db_server, 
            $this -> username, $this -> password, $this -> db_link);

            if (!$db_connected)
            {
                return false;
            }
            else
            {
                return $db_connected;
            } 
        }
        
        // RETRIEVE DATA FROM THE DATABASE SERVER : 
        function retrieve_data ($sql_statement)
        {
            $db = $this -> connect_to_db();

            $result = mysqli_query($db, $sql_statement);

            if (!$result )
            {
                return false;
            }
            else 
            {
                $data = false;
                while ($row = mysqli_fetch_assoc($result))
                {
                    $data[] = $row;
                }
                return $data;
            }
        }

        //INSERT UPDATE, DELETE, DROP DATA IN THE DATABASE SERVER :
        function save_data ($sql_statement)
        {
            $db = $this -> connect_to_db();

            $result = mysqli_query($db, $sql_statement);
            
            if (!$result)
            {
                return false;
            }
            else
            {
                return true;
            }
                
        }
    }
?>    
