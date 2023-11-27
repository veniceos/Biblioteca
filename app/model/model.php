<?php
class usermodel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo; 
    }

    //Método para criar user
public function criaruser($nome_c, $data_n, $email, $telefone, $cpf, $senha) {
    $sql = "INSERT INTO usuario (nome_c, data_n, email, telefone, cpf, senha)
    VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$nome_c, $data_n, $email, $telefone, $cpf, $senha]);
}

//Model para listar users
public function listarusers() {
    $sql = "SELECT * FROM usuario";
    $stmt = $this->pdo->query($sql);
    return $stmt->fetchALL(PDO:: FETCH_ASSOC);
}

//Model para atualizar users
public function atualizaruser($id, $nome_c, $data_n, $email, $telefone, $cpf, $senha) {
    $sql = "UPDATE usuario SET nome_c = ?, data_n = ?, email = ?, telefone = ?, cpf = ?, senha = ?
    WHERE id = ?";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$nome_c, $data_n, $email, $telefone, $cpf, $senha]);
} 

public function deletaruser($id) {
    $sql ="DELETE FROM usuario WHERE id = ?";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$id]);
}

}

class bookmodel{
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo; 
    }

    public function criarbook($nome, $autor, $editora, $capa, $quantidade){
        $sql = "INSERT INTO livros (nome, autor, editora, capa, quantidade)
        VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $autor, $editora, $capa, $quantidade]);
    }

    public function listarbook() {
        $sql = "SELECT * FROM livros";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchALL(PDO:: FETCH_ASSOC);
    }

    public function atualizarbook($id, $nome, $autor, $editora, $capa, $quantidade) {
        $sql = "UPDATE livros SET nome = ?, autor = ?, editora = ?, capa = ?, quantidade = ?
        WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $autor, $editora, $capa, $quantidade, $id]);
    } 
    
    public function deletarbook($id) {
        $sql ="DELETE FROM livros WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }
}

class EmprestimoModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function emprestar($nome_c, $email, $nome, $capa, $quantidade, $data_e, $data_d, $quantidade_e, $devolvido) {
        // Corrigindo a consulta SQL para um único comando INSERT
        $sql = "INSERT INTO usuario (nome_c, email) VALUES (?, ?);
                INSERT INTO livros (nome, capa, quantidade) VALUES (?, ?, ?);
                INSERT INTO emprestimo (data_e, data_d, quantidade_e, devolvido) VALUES(?, ?, ?, ?)";

        // Preparando a consulta
        $stmt = $this->pdo->prepare($sql);

        // Executando a consulta com os parâmetros
        $stmt->execute([$nome_c, $email, $nome, $capa, $quantidade, $data_e, $data_d, $quantidade_e, $devolvido]);
    }

    public function devolucao($id, $devolvido, $quantidade, $quantidade_e) {
        // Corrigindo a tabela na consulta SQL para 'emprestimo'
        $sql = "UPDATE emprestimo SET devolvido = ?, quantidade_e = ?
                WHERE id = ?";

        // Preparando a consulta
        $stmt = $this->pdo->prepare($sql);

        // Executando a consulta com os parâmetros
        $stmt->execute([$devolvido, $quantidade_e, $id]);
    }

    public function listarEmprestimo() {
        $sql = "SELECT * FROM emprestimo";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchALL(PDO:: FETCH_ASSOC);
    }
}


?>