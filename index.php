<?php
require "db.php";
$pdo = conectar();
$stmt = $pdo->query("SELECT * FROM cursos ORDER BY criado_em DESC");
$cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud - Create</title>
    <link rel="stylesheet" href="style/index.css?v=<?= filemtime('style/index.css') ?>">
    <link rel="stylesheet" href="style/global.css">
</head>
<body>
    <h1>
        Cursos
    </h1>
    <table>
        <thead>
            <tr class='cols'>
                <th>Curso</th>
                <th>Categoria</th>
                <th>Professor(a)</th>
                <th>Ativo</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($cursos as $curso): ?>
            <tr class='rows' onclick="window.location='vizualizar.php?id=<?=$curso['id'] ?>'">
                <td><?= $curso['nome']?></td>
                <td><?= $curso['categoria']?></td>
                <td><?= $curso['professor']?></td>
                <td><?= $curso['ativo']?></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <button class="btn-default">
        <a href="create.php">Novo curso</a>
    </button>
</body>
</html>