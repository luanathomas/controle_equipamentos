<?php
include_once getcwd()."\db\MySQL.class.php";

class Notebook{

    public $idNotebook;
    public $idUser;
    public $nome;
    public $cpu;
    public $ram;
    public $armazenamento;
    public $video;
    public $idWindows;

    public function __construct($idNotebook, $idUser, $nome, $cpu, $ram, $armazenamento, $video, $idWindows){
        $this->idNotebook = $idNotebook;
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
        $sql = "INSERT INTO notebook(idNotebook, idUser, nome, cpu, ram, armazenamento, video, idWindows) VALUES ('".$this->idNotebook."', '".$this->idUser."','".$this->nome."', '".$this->cpu."', '".$this->ram."', '".$this->armazenamento."', '".$this->video."', '".$this->idWindows."')";
        $conexao->executa($sql);
    }

    public function consultar(){
        $conexao = new MySQL();
        $sql = "SELECT idNotebook, idUser, nome, cpu, ram, armazenamento, video, idWindows FROM notebook";
		$resultados = $conexao->consulta($sql);
		if(!empty($resultados)){
            $notebooks = array();
            foreach($resultados as $resultado){
                $notebook = new Notebook($resultado['idNotebook'], $resultado['idUser'], $resultado['nome'], $resultado['cpu'], $resultado['ram'], $resultado['armazenamento'], $resultado['video'], $resultado['idWindows']);
                $notebooks[] = $notebook;
            }
            return $notebooks;
        }else{
            return false;
        }
    } 

    public function editar($id){
        $conexao = new MySQL();
        $sql = "UPDATE notebook SET idUser='".$this->idUser."', nome='".$this->nome."', cpu='".$this->cpu."', ram='".$this->ram."', armazenamento='".$this->armazenamento."', video='".$this->video."', idWindows='".$this->idWindows."' WHERE notebook.idNotebook = '" . $id . "'";
        $conexao->executa($sql);
    }

    public static function excluir($id){
        $conexao = new MySQL();
        $sql = "DELETE FROM notebook WHERE notebook.idNotebook = ".$id;
        $conexao->executa($sql);
    }


}
