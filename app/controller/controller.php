<?php

require_once 'app/config/db.php';
require_once 'app/model/model.php';

class userController{

    private $usermodel;

    public function __construct($pdo)
    {
        $this->usermodel = new usermodel($pdo);
    }

    public function criaruser($nome_c, $data_n, $email, $telefone, $cpf, $senha)
    {
        $this->usermodel->criaruser($nome_c, $data_n, $email, $telefone, $cpf, $senha);
    }

    public function listarusers()
    {
        return $this->usermodel->listarusers();
    }

    public function exibirListausers()
    {
        $users = $this->usermodel->listarusers();
        include_once 'app/view/usuarios/listar.php';
    }

    public function atualizaruser($id, $nome_c, $data_n, $email, $telefone, $cpf, $senha)
    {
        $this->usermodel->atualizaruser($id, $nome_c, $data_n, $email, $telefone, $cpf, $senha);
    }

    public function deletaruser($id) {
        $this->usermodel->deletaruser($id);
    }
}

class bookControler{

    private $bookmodel;

    public function __construct($pdo)
    {
        $this->bookmodel = new bookmodel($pdo);
    }

    public function criarbook($nome, $autor, $editora, $capa, $quantidade, $quantidade_e, $data_e)
    {
        $this->bookmodel->criarbook($nome, $autor, $editora, $capa, $quantidade, $quantidade_e, $data_e);
    }

    public function listarbook()
    {
        return $this->bookmodel->listarbook();
    }

    public function atualizarbook($id, $nome, $autor, $editora, $capa, $quantidade, $quantidade_e, $data_e)
    {
        $this->bookmodel->atualizarbook($id, $nome, $autor, $editora, $capa, $quantidade, $quantidade_e, $data_e);
    }

    public function deletarbook($id) {
        $this->bookmodel->deletarbook($id);
    }
}
