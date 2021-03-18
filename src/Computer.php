<?php
include_once getcwd()."\db\MySQL.class.php";

class Computer{

    public $idComputer;
    public $idUser;
    public $name;
    public $cpu;
    public $ram;
    public $storage;
    public $video;
    public $idWindows;


    public function __construct($idComputer, $idUser, $name, $cpu, $ram, $storage, $video, $idWindows){
        $this->idComputer = $idComputer;
        $this->idUser = $idUser;
        $this->name = $name;
        $this->cpu = $cpu;
        $this->ram = $ram;
        $this->storage = $storage;
        $this->video = $video;
        $this->idWindows = $idWindows;
    }

    







}


