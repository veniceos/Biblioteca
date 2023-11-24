<?php
require_once 'app/config/db.php';
require_once 'app/controller/controller.php';

$usermodel = new usermodel($pdo);

$users = new userController($pdo);
$usuario=$users->listarusers();


if (isset($_POST['submit'])) {
    $nome_c = $_POST['nome_c'];
    $data_n = $_POST['data_n'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
    $emprestimo_l = $_POST['emprestimo_l'];
    $emprestimo_q = $_POST['emprestimo_q'];
    $emprestimo_d = $_POST['emprestimo_d'];


    $stmt = $pdo->prepare('SELECT COUNT(*) FROM usuario WHERE nome_c = ? AND data_n = ? AND email = ? AND telefone = ? AND cpf = ? AND senha = ? AND emprestimo_l = ? AND emprestimo_q = ? AND emprestimo_d = ?');
    $stmt->execute([$nome_c, $data_n, $email, $telefone, $cpf, $senha, $emprestimo_l, $emprestimo_q, $emprestimo_d]);
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        $error = 'Esse perfil já foi cadastrado.';
    } else {
        $stmt = $pdo->prepare('INSERT INTO usuario (nome_c, data_n, email, telefone, cpf, senha, emprestimo_l, emprestimo_q, emprestimo_d)
                    VALUES (:nome_c, :data_n, :email, :telefone, :cpf, :senha, :emprestimo_l, :emprestimo_q, :emprestimo_d)');
        $stmt->execute([
            'nome_c' => $nome_c,
            'data_n' => $data_n,
            'email' => $email,
            'telefone' => $telefone,
            'cpf' => $cpf,
            'senha' => $senha,
            'emprestimo_l' => $emprestimo_l,
            'emprestimo_q' => $emprestimo_q,
            'emprestimo_d' => $emprestimo_d
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
    <label for="nome_c">Nome completo:</label>
    <input type="text" name="nome_c" required>

    <label for="data_n">Data de nacimento:</label>
    <input type="date" name="data_n">

    <label for="email">Email:</label>
    <input type="email" name="email" required>

    <label for="telefone">Telefone</label>
    <input type="text" name="telefone">

    <label for="cpf">CPF:</label>
    <input type="text" name="cpf">

    <label for="senha">Senha:</label>
    <input type="password" name="senha" required>

    <button class="botao" type="submit" name="submit" value="cadastrar">Cadastrar-se</button>
</form>
<?php

if (
    isset($_POST['atualizar_nome_c']) &&
    isset($_POST['atualizar_data_n']) &&
    isset($_POST['atualizar_email']) &&
    isset($_POST['atualizar_telefone']) &&
    isset($_POST['atualizar_cpf']) &&
    isset($_POST['atualizar_senha']) &&
    isset($_POST['']) &&
    isset($_POST['']) &&
    isset($_POST['']) 
) {
    $usermodel->atualizaruser(
        $_POST['id'],
        $_POST['atualizar_nome_c'],
        $_POST['atualizar_data_n'],
        $_POST['atualizar_email'],
        $_POST['atualizar_telefone'],
        $_POST['atualizar_cpf'],
        $_POST['atualizar_senha'],
        $_POST['emprestimo_l'],
        $_POST['emprestimo_q'],
        $_POST['emprestimo_d'],
    );
}
?>
<h2>Atualizar Usuário</h2>
<form method="post">
    <select name="id">
        <?php foreach ($usuario as $user) : ?>
            <option value="<?php echo $user['id']; ?>">
                <?php echo $user['nome_c']; ?>
            </option>
        <?php endforeach; ?>
    </select>
    <input type="text" name="atualizar_nome_c" placeholder="Nome">
    <input type="date" name="atualizar_data_n" placeholder="Data de nascimento">
    <input type="email" name="atualizar_email" placeholder="Email">
    <input type="text" name="atualizar_telefone" placeholder="Telefone">
    <input type="text" name="atualizar_cpf" placeholder="CPF">
    <input type="password" name="atualizar_senha" placeholder="Senha">
    <button type="submit">Atualizar</button>
    
</form>

<?php

$users->exibirlistausers();

?>

<?php

if (isset($_POST['deletar_user_id'])) {
    $users->deletaruser(
        $_POST['deletar_user_id']
    );
}
?>

<h2>Deletar Usuário</h2>
<form method="post">
        <select name="deletar_user_id">
            <?php foreach ($usuario as $user): ?>
                <option value="<?php echo $user['id']; ?>">
                    <?php echo $user['nome_c']; ?>
                </option>
            <?php endforeach; ?>
</select>
<button type="submit">excluir</button>
    </form>