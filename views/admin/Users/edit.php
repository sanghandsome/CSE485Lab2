<?php
require_once(__DIR__ . '/../../../controllers/UsersController.php');
// Xử lý form gửi qua POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['updateID'];
    $username = $_POST['updateUsername'];
    $password = $_POST['updatePassword'];

    $sql = "UPDATE users SET username = '$username', password = '$password' WHERE id = '$id'";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    header('Location: /tlunews/views/?action=users');
    exit;
}
?>
