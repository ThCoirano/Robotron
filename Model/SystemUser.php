<?php
    include_once "../Util/Database.php";//Once is extremely necessary in order to work together with other models

    //SystemUser database representation
    class SystemUser{
        //Properties
        public $id;
        public $username;
        public $email;
        public $score;
        public $isActive;

        //Database Property
        private $database;

        //Constructor
        public function __construct(){
            $this->id = 0;
            $this->username = "";
            $this->email = "";
            $this->score = 0;

            $this->database = new Database();
        }

        //Method to insert SystemUser into database
        public function insertSystemUser($username, $email){
            $sqlQuery = "INSERT INTO systemUser (
                username
                , email
                , score
                , isActive
            ) Values(
                '{$username}'
                , '{$email}'
                , 0
                , true
            )";
            $this->database->query($sqlQuery);//Reusability
        }

        //Method to get SystemUsers from database
        public function getSystemUser($email){
            $sqlQuery = "SELECT * FROM systemUser
                        WHERE isActive = true
                        -- AND username = '{$username}'
                        AND email = '{$email}'";

            $systemUserData = $this->database->query($sqlQuery);//Collection from database
            $result = array();

            while($row = mysqli_fetch_object($systemUserData)){//Row receives a row from database collection
                array_push($result, $row);//result add the row
            }
            //result is basically all the rows grouped to simplify the return statement
            return $result; //Each index from the result represents a database row
        }
    }
?>