<?php
require 'db.php';

$pdo = conectar();

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM cursos WHERE id = ?");
$stmt->execute([$id]);
$curso = $stmt->fetch(PDO::FETCH_ASSOC);


if (!$curso) {
    header ('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/global.css">
    <link rel="stylesheet" href="style/vizualizar.css">
    <title>Vizualizar Cursos</title>
</head>
<body>
    <h1>Cursos</h1>

    <div class="container">
        <div class="item-curso">
            <?= $curso['nome'] ?>
        </div>
        <div class="item-cell">
            Curso: <?= $curso['nome'] ?>
        </div>
        <div class="item-cell">
            Categoria: <?= $curso['categoria'] ?>
        </div>
        <div class="item-cell">
            Professor: <?= $curso['professor'] ?>
        </div>
        <div class="item-cell">
            Criado em: <?= $curso['criado_em']?>
        </div>
    </div>

    <div class="btns">
        <a href="edit.php?id=<?= $curso['id'] ?>" class="editar">Editar curso</a>
        <a href="excluir.php?id=<?= $curso['id'] ?>" class="excluir">Excluir Curso</a>
    </div>
</body>
</html>