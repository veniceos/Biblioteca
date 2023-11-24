<?php

require_once 'app/config/db.php';
require_once 'app/model/model.php';

class userController{

    private $usermodel;

    public function __construct($pdo)
    {
        $this->usermodel = new usermodel($pdo);
    }

    public function criaruser($id, $nome_c, $data_n, $email, $telefone, $cpf, $senha, $emprestimo_l, $emprestimo_q, $emprestimo_d)
    {
        $this->usermodel->criaruser($id, $nome_c, $data_n, $email, $telefone, $cpf, $senha, $emprestimo_l, $emprestimo_q, $emprestimo_d);
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

    public function atualizaruser($id, $nome_c, $data_n, $email, $telefone, $cpf, $senha, $emprestimo_l, $emprestimo_q, $emprestimo_d)
    {
        $this->usermodel->atualizaruser($id, $nome_c, $data_n, $email, $telefone, $cpf, $senha, $emprestimo_l, $emprestimo_q, $emprestimo_d);
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

    public function criarbook($id, $nome, $autor, $editora, $capa, $quantidade)
    {
        $this->bookmodel->criarbook($id, $nome, $autor, $editora, $capa, $quantidade);
    }

    public function listarbook()
    {
        return $this->bookmodel->listarbook();
    }

    public function exibirListarbook()
    {
        $books = $this->bookmodel->listarbook();
        include_once 'app/view/livros/listar.php';
    }

    public function atualizarbook($id, $nome, $autor, $editora, $capa, $quantidade, $quantidade_e)
    {
        $this->bookmodel->atualizarbook($id, $nome, $autor, $editora, $capa, $quantidade, $quantidade_e);
    }

    public function deletarbook($id) {
        $this->bookmodel->deletarbook($id);
    }
}
