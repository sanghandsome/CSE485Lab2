<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "tlunews";
$conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
require(__DIR__ . '/../controllers/NewsController.php');
require_once(__DIR__ . '/../controllers/UsersController.php');
require_once(__DIR__ . '/../controllers/CategoryController.php');
session_start();
if(!isset($_SESSION['username'])){
    header("Location: /tlunews/views/admin/login.php");
}
else if($_SESSION['role'] == 'admin' and $_GET['action'] == 'news'){
    $controller = new NewsController($conn);
    $controller->index();
}
else if($_SESSION['role'] == 'admin' and $_GET['action'] == 'users'){
    $controller = new UsersController();
    $controller->index();
}
else if($_SESSION['role'] == 'admin' and $_GET['action'] == 'categories'){
    $controller = new CategoryController() ;
    $controller->index();
}
else{
    header("Location: /tlunews/views/home/index.php");
}
