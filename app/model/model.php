<?php
class usermodel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo; 
    }

    //Método para criar user
public function criaruser($nome_c, $data_n, $email, $telefone, $cpf, $senha) {
    $sql = "INSERT INTO usuario (nome_c, data_n, email, telefone, senha)
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
    $stmt->execute([$nome_c, $data_n, $email, $telefone, $cpf, $senha, $id]);
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

    public function criarbook($nome, $autor, $editora, $capa, $quantidade, $quantidade_e, $data_e){
        $sql = "INSERT INTO livros (nome, autor, editora, capa, quantidade, quantidade_e, data_e)
        VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $autor, $editora, $capa, $quantidade, $quantidade_e, $data_e]);
    }

    public function listarbook() {
        $sql = "SELECT * FROM livros";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchALL(PDO:: FETCH_ASSOC);
    }

    public function atualizarbook($id, $nome, $autor, $editora, $capa, $quantidade, $quantidade_e, $data_e) {
        $sql = "UPDATE livros SET nome = ?, autor = ?, editora = ?, capa = ?, quantidade = ?, quantidade_e = ?, data_e = ?
        WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $autor, $editora, $capa, $quantidade, $quantidade_e, $data_e, $id]);
    } 
    
    public function deletarbook($id) {
        $sql ="DELETE FROM livros WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }
}

?>