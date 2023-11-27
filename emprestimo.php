<?php
require_once 'app/config/db.php';
require_once 'app/controller/controller.php';

$usermodel = new usermodel($pdo);
$users = new userController($pdo);
$usuario=$users->listarusers();

$bookmodel = new bookmodel($pdo);
$books = new bookControler($pdo);
$livros = $books->listarbook();

$emprestimoModel = new emprestimoModel($pdo);
$emprestimos = new emprestimoController($pdo);
$emprestados = $emprestimos->listarEmprestimo();

if (isset($_POST['submit'])) {
    $nome_c = $_POST['nome_c'];
    $nome = $_POST['nome'];
    $data_e = $_POST['data_e'];
    $data_d = $_POST['data_d'];
    $quantidade_e = $_POST['quantidade_e'];
    $devolvido = $_POST['devolvido'];


    $stmt = $pdo->prepare('SELECT COUNT(*, *, *) FROM usuario WHERE nome_c = ? AND email = ?, 
    FROM livros nome = ? AND capa = ? AND quantidade = ?, 
    FROM emprestimo data_e = ? AND data_d = ? AND quantidade_e = ? AND devolvido = ?');
    $stmt->execute([$nome_c, $email, $nome, $capa, $quantidade, $data_e, $data_d, $quantidade_e, $devolvido]);
    $count = $stmt->fetchColumn();

    if ($quantidade>$quantidade_e) {
        $estoque=$quantidade-$quantidade_e;
    }
    else {
        echo "Estamos sem estoque deste livro.";
    }
    }
?>

<h2>Emprestimo:</h2>

<form method="post">

<label for="nome_c">Usuário:</label>
        <select name="nome_c">
            <?php foreach ($usuario as $user): ?>
                <option value="<?php echo $user['id']; ?>">
                    <?php echo $user['nome_c']; ?>
                </option>
            <?php endforeach; ?>
</select>

<label for="nome">Livro:</label>
<select name="nome">
        <?php foreach ($livros as $book) : ?>
            <option value="<?php echo $book['nome']; ?>">
                <?php echo $book['nome']; ?>
            </option>
        <?php endforeach; ?>
</select>

<label for="data_e">Data do Emprestimo:</label>
<input type="date" name="data_e">

<label for="data_d">Data da Devolução</label>
<input type="date" name="data_d">

input

<button type="submit" name="devolido" value="Nao">Emprestar</button>
    </form>


    <?php

if (isset($_POST['devolucao'])) {
    $emprestimo->devolucao(
        $_POST['devolucao']
    );
}

if ($devolvido="Sim") {
    $estoque = $quantidade + $quantidade_e;
}
?>


    <h2>Devolver</h2>

    <form method="post">
    <select name="devolucao">
        <?php foreach ($emprestimoModel as $emprestimo): ?>
            <option value="<?php echo $emprestimo['id']; ?>">
                <?php echo $emprestimo['id']; ?>
            </option>
        <?php endforeach; ?>
    </select>
</form>

</select>
<button type="submit" value="Sim">Devolver</button>
    </form>