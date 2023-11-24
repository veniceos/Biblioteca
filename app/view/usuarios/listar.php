<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados</title>
</head>
<body>
    <h1>Dados dos usuários</h1>
    <table>
        <tr>
            <th>Nome</th>
            <th>Data de nascimento</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>CPF</th>
            <th>Senha</th>
            <th>Deletar</th>
        </tr>

        <?php foreach ($users as $user): ?>
           
            <tr>
                <td><?php echo $user['nome_c']; ?></td>
                <td><?php echo $user['data_n']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['telefone']; ?></td>
                <td><?php echo $user['cpf']; ?></td>
                <td><?php echo $user['senha']; ?></td>
                <td><a href="view/usuarios/deletar.php?id="<?php echo $user['id']; ?>>Deletar</a></td>
            </tr>

            <?php endforeach; ?>
            
    </table>
</body>
</html>