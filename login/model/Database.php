<?php

    class Database {
        protected $hostname;
        protected $username;
        protected $password;
        protected $database;
        
        public function __construct($host, $user, $pass, $database){
            $this->hostname = $host;
            $this->username = $user;
            $this->password = $pass;
            $this->database = $database;
        }

        public function aa(){
            echo 'aaa';
        }

        public function getConnection() {
            $conn = mysqli_connect(
                $this->hostname,
                $this->username,
                $this->password,
                $this->database
            ) or die("Não foi possível conectar ao banco de dados" . mysqli_connect_error());
            return $conn;
        }
    }

?>