<?php

    class user{
        private $id;
        private $username;
        private $password;
        private $role;
//        public function __construct( $username, $password, $role){
//            $this->username = $username;
//            $this->password = $password;
//            $this->role = $role;
//        }
    public function __construct(){}

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

            public function setId($id): void
        {
            $this->id = $id;
        }
        public function setUsername($username){
            $this->username = $username;
        }
        public function setPassword($password){
            $this->password = $password;
        }
        public function setRole($role){
            $this->role = $role;
        }

        public function getAllUsers()
        {
            require_once(__DIR__ . '/../configs/connection.php');
            $sql = "SELECT 
                        username,
                        password,
                        role,
                        CASE role
                            WHEN 1 THEN 'admin'
                            WHEN 0 THEN 'user'
                        END AS role_name
                    FROM users;";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function createUsers($data)
        {
            require_once(__DIR__ . '/../configs/connection.php');
            $query = "INSERT INTO users (username, password, role) values(:username, :password, :role)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':username', $data['username']);
            $stmt->bindParam(':password', $data['password']);
            $stmt->bindParam(':role', $data['role']);
            $stmt->execute();
        }

        public function updateUsers($id,$data){
            require_once(__DIR__ . '/../configs/connection.php');
           $query = "UPDATE users SET username = :username, password = :password WHERE id = :id";
           $stmt = $conn->prepare($query);
           $stmt->bindParam(':username', $data['username']);
           $stmt->bindParam(':password', $data['password']);
           $stmt->bindParam(':id', $id);
           $stmt->execute();
        }

        public function deleteUser($id)
        {
            require_once(__DIR__ . '/../configs/connection.php');
            $query = "DELETE FROM users WHERE id = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }
    }
?>
