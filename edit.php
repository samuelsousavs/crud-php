<?php
require 'db.php';

$pdo = conectar();
$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM cursos WHERE id = ?');
$stmt->execute([$id]);

$curso = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$curso) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $categoria = $_POST['categoria'];
    $professor = $_POST['professor'];
    $ativo = $_POST['ativo'];

    if (empty($professor)) {
        $professor = "Sem Professor";
    }

    $stmt = $pdo->prepare("UPDATE cursos SET nome = ?, categoria = ?, professor = ?, ativo = ? WHERE ID = ?");
    $stmt->execute([$nome, $categoria, $professor, $ativo, $id]);

    header("Location: index.php");
    exit;

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar curso</title>
    <link rel="stylesheet" href="style/create.css">
    <link rel="stylesheet" href="style/global.css">
</head>
<body>
    <h1>Editar Curso</h1>
    <form action="edit.php?id=<?= $curso['id']?>" id="cursos-form" method="post">
        <input type="text" placeholder="Nome" name="nome" required value='<?= $curso['nome'] ?>'>
        <input type="text" placeholder="Categoria" name="categoria" required value='<?= $curso['categoria'] ?>'>
        <input type="text" placeholder="Professor(a)" name="professor" value='<?= $curso['professor']?>'>
        <select name="ativo" id="" required>
            <option value="" disabled selected>Ativo</option>
            <option value="Sim" <?= $curso['ativo'] === 'Sim' ? 'selected' : ''?>>Sim</option>
            <option value="Não" <?= $curso['ativo'] === 'Não' ? 'selected' : ''?>>Não</option>
        </select>

    </form>

    <button type="submit" form="cursos-form" class="btn-default">Cadastrar</button>
</body>
</html>