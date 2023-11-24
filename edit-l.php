<?php
require_once 'app/config/db.php';
require_once 'app/controller/controller.php';

$bookmodel = new bookmodel($pdo);

$books = new bookControler($pdo);

$livros = $books->listarbook();

if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $autor = $_POST['autor'];
    $capa = $_POST['capa'];
    $editora = $_POST['editora'];
    $quantidade = $_POST['quantidade'];


    $stmt = $pdo->prepare('SELECT COUNT(*) FROM livros WHERE nome = ? AND autor = ? AND editora = ? AND capa = ? AND quantidade = ?');
    $stmt->execute([$nome, $autor, $editora, $capa, $quantidade]);
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        $error = 'Esse perfil já foi cadastrado.';
    } else {
        $stmt = $pdo->prepare('INSERT INTO livros
            (nome, autor, editora, capa, quantidade)
            VALUES (:nome, :autor, :editora, :capa, :quantidade)');
        $stmt->execute([
            'nome' => $nome,
            'autor' => $autor,
            'editora' => $editora,
            'capa' => $capa,
            'quantidade' => $quantidade,
        ]);
    }
    

    if ($stmt->rowCount()) {
        echo '<span>Cadastro realizado com sucesso!</span>';
    } else {
        echo '<span>Erro na realização de cadastro. Tente novamente mais tarde!</span>';
    }
}

?>

<h2>Cadastrar Usuário</h2>

<form method="post">
    <label for="nome">Nome completo:</label>
    <input type="text" name="nome" required>

    <label for="autor">autor:</label>
    <input type="autor" name="autor" required>

    <label for="editora">editora</label>
    <input type="text" name="editora">

    <label for="capa">capa:</label>
    <input type="text" name="capa">

    <label for="quantidade">quantidade:</label>
    <input type="number" name="quantidade" required>

    <button class="botao" type="submit" name="submit" value="cadastrar">Cadastrar-se</button>
</form>
<?php

if (
    isset($_POST['atualizar_nome']) &&
    isset($_POST['atualizar_autor']) &&
    isset($_POST['atualizar_editora']) &&
    isset($_POST['atualizar_capa']) &&
    isset($_POST['atualizar_quantidade'])
) {
    $bookmodel->atualizarbook(
        $_POST['id'],
        $_POST['atualizar_nome'],
        $_POST['atualizar_autor'],
        $_POST['atualizar_editora'],
        $_POST['atualizar_capa'],
        $_POST['atualizar_quantidade'],
    );
}
?>
<h2>Atualizar Usuário</h2>
<form method="post">
    <select name="id">
        <?php foreach ($livros as $book) : ?>
            <option value="<?php echo $book['nome']; ?>">
                <?php echo $book['nome']; ?>
            </option>
        <?php endforeach; ?>
    </select>

    <input type="text" name="atualizar_nome" placeholder="Nome">


    <input type="autor" name="atualizar_autor" placeholder="autor">


    <input type="text" name="atualizar_editora" placeholder="editora">


    <input type="text" name="atualizar_capa" placeholder="capa">


    <input type="password" name="atualizar_quantidade" placeholder="quantidade">

    <button type="submit">Atualizar</button>
    
</form>

<?php

$books->exibirListarbook();

?>

<?php

if (isset($_POST['deletar_book_id'])) {
    $books->deletarbook(
        $_POST['deletar_book_id']
    );
}
?>

<h2>Deletar Livros</h2>
<form method="post">
        <select name="deletar_book_id">
            <?php foreach ($livros as $book): ?>
                <option value="<?php echo $book['id']; ?>">
                    <?php echo $book['nome']; ?>
                </option>
            <?php endforeach; ?>
</select>
<button type="submit">excluir</button>
    </form>