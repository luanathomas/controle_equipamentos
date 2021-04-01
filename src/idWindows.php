<?php
include_once getcwd()."\db\MySQL.class.php";

class idWindows{

    public $idWindows;
    public $nome;
    public $numeroLicencas;

    public function __construct($idWindows, $nome, $numeroLicencas){
        $this->idWindows = $idWindows;
        $this->nome = $nome;
        $this->numeroLicencas = $numeroLicencas;
    }

    public function inserir(){
        $conexao = new MySQL();
        $sql = "INSERT INTO idWindows(idWindows, nome, numeroLicencas) VALUES ('".$this->idWindows."', '".$this->nome."','".$this->numeroLicencas."')";
        $conexao->executa($sql);
    }

    public function consultar(){
        $conexao = new MySQL();
        $sql = "SELECT idWindows, nome, numeroLicencas FROM idWindows";
		$resultados = $conexao->consulta($sql);
		if(!empty($resultados)){
            $idWindows = array();
            foreach($resultados as $resultado){
                $windows = new idWindows($resultado['idWindows'], $resultado['nome'], $resultado['numeroLicencas']);
                $idWindows[] = $windows;
            }
            return $idWindows;
        }else{
            return false;
        }
    } 

    public function editar($id){
        $conexao = new MySQL();
        $sql = "UPDATE idWindows SET nome='".$this->nome."', numeroLicencas='".$this->numeroLicencas."' WHERE idWindows.idWindows = '" . $id . "'";
        $conexao->executa($sql);
    }

    public static function excluir($id){
        $conexao = new MySQL();
        $sql = "DELETE FROM idWindows WHERE idWindows.idWindows = ".$id;
        $conexao->executa($sql);
    }

}
