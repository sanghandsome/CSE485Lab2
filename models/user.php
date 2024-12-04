<?php
    class user{
        private $id;
        private $username;
        private $password;
        private $role;
        public function __construct( $username, $password, $role){
            $this->username = $username;
            $this->password = $password;
            $this->role = $role;
        }
        public function getId(){
            return $this->id;
        }
        public function getUsername(){
            return $this->username;
        }
        public function getPassword(){
            return $this->password;
        }
        public function getRole(){
            return $this->role;
        }
        private function setUsername($username){
            $this->username = $username;
        }
        public function setPassword($password){
            $this->password = $password;
        }
        public function setRole($role){
            $this->role = $role;
        }
    }
?>
