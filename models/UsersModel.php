<?php
    namespace models;

    use db\DB;


    class UsersModel 
    {
        private $tablename = 'users';
        private $conn;
        public function __construct()
        {
            $db = DB::getInstance();
            $this->conn = $db::getConnection();
        }


        public function create($name,$lastname,$email)
        {
            $stm = $this->conn->prepare("INSERT INTO  $this->tablename 
            (first_name, last_name, email) VALUES (?, ?, ?)");
            $stm->execute(array($name, $lastname, $email));
            return  $this->conn->lastInsertId();
            
        }
    }
