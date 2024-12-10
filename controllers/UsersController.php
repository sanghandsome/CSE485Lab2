<?php
require_once(__DIR__ . '/../models/user.php');
class UsersController
{
    public function index(){
        $users = new User();
        $users = $users->getAllUsers();
        require __DIR__ . '/../views/admin/users/index.php';
    }

    public function add(){
        $data = [
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'role' => $_POST['role']
        ];
        $user = new User();
        $user->createUsers($data);
    }
    public function edit(){
        $id = $_POST['id'];
        $data = [
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'role' => $_POST['role']
        ];
        $user = new User();
        $user->updateUsers($data, $id);
    }

    public function delete(){
        $id = $_GET['id'];
        $user = new User();
        $user->deleteUser($id);
    }
}