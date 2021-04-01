<?php
include_once getcwd()."\db\MySQL.class.php";

class User{

    public $idUser;
    public $nome;
    public $sobrenome;
    public $setor;
    
    public function __construct($idUser, $nome, $sobrenome, $setor){
        $this->idUser = $idUser;
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->setor = $setor;
    }

    public function inserir(){
        $conexao = new MySQL();
        $sql = "INSERT INTO user(idUser, nome, sobrenome, setor) VALUES ('".$this->idUser."', '".$this->nome."','".$this->sobrenome."','".$this->setor."')";
        $conexao->executa($sql);
    }

    public function consultar(){
        $conexao = new MySQL();
        $sql = "SELECT idUser, nome, sobrenome, setor FROM user";
		$resultados = $conexao->consulta($sql);
		if(!empty($resultados)){
            $users = array();
            foreach($resultados as $resultado){
                $user = new User($resultado['idUser'], $resultado['nome'], $resultado['sobrenome'], $resultado['setor']);
                $users[] = $user;
            }
            return $users;
        }else{
            return false;
        }
    } 

    public function editar($id){
        $conexao = new MySQL();
        $sql = "UPDATE user SET nome='".$this->nome."', sobrenome='".$this->sobrenome."', setor='".$this->setor."' WHERE user.idUser = '" . $id . "'";
        $conexao->executa($sql);
    }

    public static function excluir($id){
        $conexao = new MySQL();
        $sql = "DELETE FROM user WHERE user.idUser = ".$id;
        $conexao->executa($sql);
    }

}
