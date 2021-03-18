<?php
include_once getcwd()."\db\MySQL.class.php";

class Software{

    public $idSoftware;
    public $name;
    public $numberLicences;

    public function __construct($idSoftware, $name, $numberLicences){
        $this->idSoftware = $idSoftware;
        $this->name = $name;
        $this->numberLicences = $numberLicences;
    }

}
