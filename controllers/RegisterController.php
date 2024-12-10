<?php
    session_start();
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = 0;
    require(__DIR__ . '/../configs/connection.php');
    $sql_select = "SELECT * FROM users WHERE username = :username";
    $stmt_select = $conn->prepare($sql_select);
    $stmt_select->bindParam(':username', $username);
    $stmt_select->execute();
    $users = $stmt_select->fetchAll();
    if(empty($users)){
        $sql_insert = "INSERT INTO users (username, password , role) VALUES (:username, :password, :role)";
        $stmt = $conn->prepare($sql_insert);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password',  $password);
        $stmt->bindParam(':role', $role);
        if ($stmt->execute()) {
            $_SESSION['succes'] = 'Tạo tài khoản thành công';
            header('Location: /tlunews/views/admin/login.php');
        }
        else{
            $_SESSION['error'] = $stmt->errorInfo();
            header('Location: /tlunews/views/admin/register.php');
        }
    }
    else{
        $_SESSION["error"] = "Tên tài khoản đa tồn tại";
        header('Location: /tlunews/views/admin/register.php');
    }
?>
