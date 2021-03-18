<?php
include_once getcwd()."\db\MySQL.class.php";

class User{

    public $idUser;
    public $name;
    public $lastname;
    public $office;
    
    public function __construct($idUser, $name, $lastname, $office){
        $this->idUser = $idUser;
        $this->name = $name;
        $this->lastname = $lastname;
        $this->office = $office;
    }




}
