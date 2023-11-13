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
    $sql = "UPDATE usuario SET nome_c = ?, data_n = ?, email = ?, telefone = ?, senha = ?
    WHERE id = ?";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$nome_c, $data_n, $email, $cpf, $telefone, $senha, $id]);
} 

public function deletaruser($id, $nome_c, $data_n, $email, $cpf, $telefone, $senha) {
    $sql ="DELETE FROM usuario WHERE id = ?";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$id]);
}

}

?>