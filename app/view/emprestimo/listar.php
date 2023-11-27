<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados</title>
</head>
<body>
    <h1>Dados dos livros</h1>
    <table>
        <tr>
            <th>Nome Completo</th>
            <th>Email</th>
            <th>Nome do Livro</th>
            <th>Data do Emprestimo</th>
            <th>Data da Devolução</th>
            <th>Quantidade Emprestada</th>
            <th>Devolvido?</th>
        </tr>

        <?php foreach ($users as $userk): ?>
           
            <tr>
                <td><?php echo $user['nome_c']; ?></td>
                <td><?php echo $user['email']; ?></td>
        <?php endforeach; ?>
        <?php foreach ($books as $book): ?>
                <<td><?php echo $book['nome']; ?></td>
        <?php endforeach; ?>
        <?php foreach ($emprestimoModel as $emprestimo): ?>
            <td><?php echo $emprestimo['data_e']; ?></td>
            <td><?php echo $emprestimo['data_d']; ?></td>
            <td><?php echo $emprestimo['quantidade_e']; ?></td>
            <td><?php echo $emprestimo['devolvido']; ?></td>
            </tr>

            <?php endforeach; ?>
            
    </table>
</body>
</html>