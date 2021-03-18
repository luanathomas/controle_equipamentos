<?php
include_once getcwd()."\db\MySQL.class.php";

class Notebook{

    public $idNotebook;
    public $idUser;
    public $nameNotebook;
    public $cpu;
    public $ram;
    public $storage;
    public $video;
    public $idWindows;

    public function __construct($idNotebook, $idUser, $nameNotebook, $cpu, $ram, $storage, $video, $idWindows){
        $this->idNotebook = $idNotebook;
        $this->idUser = $idUser;
        $this->nameNotebook = $nameNotebook;
        $this->cpu = $cpu;
        $this->ram = $ram;
        $this->storage = $storage;
        $this->video = $video;
        $this->idWindows = $idWindows;
    }





}
