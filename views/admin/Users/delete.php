<?php
require_once(__DIR__ . '/../../../controllers/UsersController.php');
$controller = new UsersController();
$controller->delete();
header('Location:http://localhost/tlunews/views/?action=users');