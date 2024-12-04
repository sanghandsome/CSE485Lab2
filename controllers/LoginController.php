<?php
include_once(__DIR__ . '/../models/User.php');
session_start();
    $username = $_POST["username"];
    $password = $_POST["password"];

    if(isset($_POST['username']) && isset($_POST['password'])){
        require(__DIR__ . '/../configs/connection.php');
        $sql = 'SELECT * FROM `users` WHERE username = :username';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':username', $_POST['username']);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $user = new User($row['username'], $row['password'],$row['role']);
        }
        if ($username == $user->getUsername() and $password == $user->getPassword()){
            $_SESSION['username'] = $user->getUsername();
            if($user->getRole() == 1){
                $_SESSION['role'] = 'admin';
                header('Location: /tlunews/views/admin/dashboard.php');
            }
            else{
                $_SESSION['role'] = 'user';
                header('Location: /tlunews/views/index.php');
            }
        }
        else{
            $_SESSION['error'] = "Thông tin đăng nhập không chính xác!";
            header('Location: /tlunews/views/admin/login.php?message=Wrong username or password');
        }
    }
?>
