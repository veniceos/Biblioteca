<?php

require_once 'app/config/db.php';
require_once 'app/model/model.php';

class userController{

    private $usermodel;

    public function __construct($pdo)
    {
        $this->usermodel = new usermodel($pdo);
    }

    public function criaruser($id, $nome_c, $data_n, $email, $telefone, $cpf, $senha)
    {
        $this->usermodel->criaruser($id, $nome_c, $data_n, $email, $telefone, $cpf, $senha);
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

    public function atualizarbook($id, $nome, $autor, $editora, $capa, $quantidade)
    {
        $this->bookmodel->atualizarbook($id, $nome, $autor, $editora, $capa, $quantidade);
    }

    public function deletarbook($id) {
        $this->bookmodel->deletarbook($id);
    }
}


class EmprestimoController {

    private $user;
    private $livros;
    private $empretimo; // A variável $empretimo parece um erro de digitação, talvez você quis dizer $emprestimo.
    private $emprestimoModel;

    // Corrigindo a assinatura do construtor
    public function __construct($pdo) {
        // Você provavelmente quer inicializar $this->emprestimoModel aqui
        $this->emprestimoModel = new EmprestimoModel($pdo);
    }

    // Corrigindo a assinatura do método emprestar
    public function emprestar($id, $nome_c, $email, $nome, $capa, $quantidade, $data_e, $data_d, $quantidade_e, $devolvido) {
        $this->emprestimoModel->emprestar($id, $nome_c, $email, $nome, $capa, $quantidade, $data_e, $data_d, $quantidade_e, $devolvido);
    }

    // Corrigindo a assinatura do método devolucao
    public function devolucao($id, $devolvido, $quantidade, $quantidade_e) {
        $this->emprestimoModel->devolucao($id, $devolvido, $quantidade, $quantidade_e);
    }

    public function listarEmprestimo()
    {
        return $this->emprestimoModel->listarEmprestimo();
    }

    public function exibirListarEmprestimo()
    {
        $emprestimo = $this->emprestimoModel->listarEmprestimo();
        include_once 'app/view/emprestimo/listar.php';
    }
}

