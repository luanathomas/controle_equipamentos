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

    public function inserir(){
        $conexao = new MySQL();
        $sql = "INSERT INTO software(idSoftware, nome, numeroLicencas) VALUES ('".$this->idSoftware."', '".$this->nome."','".$this->numeroLicencas."')";
        $conexao->executa($sql);
    }

    public function consultar(){
        $conexao = new MySQL();
        $sql = "SELECT idSoftware, nome, numeroLicencas FROM software";
		$resultados = $conexao->consulta($sql);
		if(!empty($resultados)){
            $softwares = array();
            foreach($resultados as $resultado){
                $software = new Software($resultado['idSoftware'], $resultado['nome'], $resultado['numeroLicencas']);
                $softwares[] = $software;
            }
            return $softwares;
        }else{
            return false;
        }
    } 

    public function editar($id){
        $conexao = new MySQL();
        $sql = "UPDATE software SET nome='".$this->nome."', nuemroLicencas='".$this->numeroLicencas."' WHERE software.idSoftware = '" . $id . "'";
        $conexao->executa($sql);
    }

    public static function excluir($id){
        $conexao = new MySQL();
        $sql = "DELETE FROM software WHERE software.idSoftware = ".$id;
        $conexao->executa($sql);
    }
}
