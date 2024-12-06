<?php
    class Login {
        private $login = '';
        private $pass  = '';

        public function __construct($login, $pass){
            $this->login = $login;
            $this->pass  = $pass;
        }

        public function getLogin() {
            return $this->login;
        }
        public function setLogin($value) {
            return $this->login = $value;
        }
        public function getPass() {
            return $this->pass;
        }
        public function setPass($value) {
            return $this->pass = $value;
        }

        
    }
?>