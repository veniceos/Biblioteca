<?php 

require_once ("../config/db.php");
require_once ('../model/model.php');

class userController{

    private $usermodel;

    public function __construct($pdo) {
        $this->usermodel = new usermodel($pdo);
    }
        
    public function criaruser ($nome_c, $data_n, $email, $telefone, $cpf, $senha) {
        $this->usermodel->criaruser($nome_c, $data_n, $email, $telefone, $cpf, $senha);
    }

    public function listarusers() {
        return $this->usermodel->listarusers();
    }

    public function exibirListausers() {
        $users = $this->usermodel->listarusers();
        include 'views/users/lista.php';
    }
    
    public function atualizaruser($id, $nome_c, $data_n, $email, $telefone, $cpf, $senha) {
        $this->usermodel->atualizaruser($id, $nome_c, $data_n, $email, $telefone, $cpf, $senha);
    }

    public function deletaruser($id, $nome_c, $data_n, $email, $telefone, $cpf, $senha) {
        $this->usermodel->deletaruser($id, $nome_c, $data_n, $email, $telefone, $cpf, $senha);
    }

}


?>