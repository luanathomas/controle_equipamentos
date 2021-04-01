<?php
include_once getcwd()."\db\MySQL.class.php";

class Computador{

    public $idComputador;
    public $idUser;
    public $nome;
    public $cpu;
    public $ram;
    public $armazenamento;
    public $video;
    public $idWindows;


    public function __construct($idComputador, $idUser, $nome, $cpu, $ram, $armazenamento, $video, $idWindows){
        $this->idComputador = $idComputador;
        $this->idUser = $idUser;
        $this->nome = $nome;
        $this->cpu = $cpu;
        $this->ram = $ram;
        $this->armazenamento = $armazenamento;
        $this->video = $video;
        $this->idWindows = $idWindows;
    }

    public function inserir(){
        $conexao = new MySQL();
        $sql = "INSERT INTO computador(idComputador, idUser, nome, cpu, ram, armazenamento, video, idWindows) VALUES ('".$this->idComputador."', '".$this->idUser."','".$this->nome."', '".$this->cpu."', '".$this->ram."', '".$this->armazenamento."', '".$this->video."', '".$this->idWindows."')";
        $conexao->executa($sql);
    }

    public function consultar(){
        $conexao = new MySQL();
        $sql = "SELECT idComputador, idUser, nome, cpu, ram, armazenamento, video, idWindows FROM computador";
		$resultados = $conexao->consulta($sql);
		if(!empty($resultados)){
            $computadores = array();
            foreach($resultados as $resultado){
                $computador = new Computador($resultado['idComputador'], $resultado['idUser'], $resultado['nome'], $resultado['cpu'], $resultado['ram'], $resultado['armazenamento'], $resultado['video'], $resultado['idWindows']);
                $computadores[] = $computador;
            }
            return $computadores;
        }else{
            return false;
        }
    } 
    
    public function editar($id){
        $conexao = new MySQL();
        $sql = "UPDATE computador SET idUser='".$this->idUser."', nome='".$this->nome."', cpu='".$this->cpu."', ram='".$this->ram."', armazenamento='".$this->armazenamento."', video='".$this->video."', idWindows='".$this->idWindows."' WHERE computador.idComputador = '" . $id . "'";
        $conexao->executa($sql);
    }

    public static function excluir($id){
        $conexao = new MySQL();
        $sql = "DELETE FROM computador WHERE computador.idComputador = ".$id;
        $conexao->executa($sql);
    }





}


