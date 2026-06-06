<?php
require 'db.php';

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $categoria = $_POST['categoria'];
    $professor = $_POST['professor'];
    $ativo = $_POST['ativo'];
    $criado_em = date('Y-m-d');

    if (empty($professor)) {
        $professor = 'Sem professor';
    }

    $pdo = conectar();
    $stmt = $pdo->prepare('INSERT INTO cursos (nome, categoria, professor, ativo, criado_em) VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$nome, $categoria, $professor, $ativo, $criado_em]);

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
    <h1>Cadastrar Cursos</h1>
    <form action="create.php" id="cursos-form" method="post">
        <input type="text" placeholder="Nome" name="nome" required>
        <input type="text" placeholder="Categoria" name="categoria" required>
        <input type="text" placeholder="Professor(a)" name="professor">
        <select name="ativo" id="" required>
            <option value="" disabled selected>Ativo</option>
            <option value="Sim">Sim</option>
            <option value="Não">Não</option>
        </select>

    </form>

    <button type="submit" form="cursos-form" class="btn-default">Cadastrar</button>
</body>
</html>