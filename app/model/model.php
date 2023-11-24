<?php
class usermodel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo; 
    }

    //Método para criar user
public function criaruser($nome_c, $data_n, $email, $telefone, $cpf, $senha, $emprestimo_l, $emprestimo_q, $emprestimo_d) {
    $sql = "INSERT INTO usuario (nome_c, data_n, email, telefone, cpf, senha, emprestimo_l, emprestimo_q, emprestimo_d)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$nome_c, $data_n, $email, $telefone, $cpf, $senha, $emprestimo_l, $emprestimo_q, $emprestimo_d]);
}

//Model para listar users
public function listarusers() {
    $sql = "SELECT * FROM usuario";
    $stmt = $this->pdo->query($sql);
    return $stmt->fetchALL(PDO:: FETCH_ASSOC);
}

//Model para atualizar users
public function atualizaruser($id, $nome_c, $data_n, $email, $telefone, $cpf, $senha, $emprestimo_l, $emprestimo_q, $emprestimo_d) {
    $sql = "UPDATE usuario SET nome_c = ?, data_n = ?, email = ?, telefone = ?, cpf = ?, senha = ?, emprestimo_l, emprestimo_q, emprestimo_d=?1
    WHERE id = ?";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$nome_c, $data_n, $email, $telefone, $cpf, $senha, $emprestimo_l, $emprestimo_q, $emprestimo_d, $id]);
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

class emprestimo{
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo; 
    }
}

?>