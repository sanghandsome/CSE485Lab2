<?php

class category
{
    private $id;
    private $name;

//    public function __construct($id ,$name){
//        $this->id = $id;
//        $this->name = $name;
//    }
    public function __construct()
    {
    }

    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }

    public function getAllCategories(){
        include_once (__DIR__ . '/../configs/connection.php');
        $sql = "SELECT * FROM categrories";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}