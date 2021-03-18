<?php
include_once getcwd()."\db\MySQL.class.php";

class Windows{

    public $idWindows;
    public $name;
    public $numberLicences;

    public function __construct($idWindows, $name, $numberLicences){
        $this->idWindows = $idWindows;
        $this->name = $name;
        $this->numberLicences = $numberLicences;
    }
}
