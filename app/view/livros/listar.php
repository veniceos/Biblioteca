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
            <th>Autor</th>
            <th>Editora</th>
            <th>Capa</th>
            <th>Quantidade</th>
        </tr>

        <?php foreach ($books as $book): ?>
           
            <tr>
                <td><?php echo $book['nome']; ?></td>
                <td><?php echo $book['autor']; ?></td>
                <td><?php echo $book['editora']; ?></td>
                <td><?php echo $book['capa']; ?></td>
                <td><?php echo $book['quantidade']; ?></td>
                <td><a href="view/livros/deletar.php?id="<?php echo $book['id']; ?>>Deletar</a></td>
            </tr>

            <?php endforeach; ?>
            
    </table>
</body>
</html>