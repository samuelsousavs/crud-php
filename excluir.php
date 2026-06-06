<?php
require 'db.php';

$pdo = conectar();

$id = $_GET['id'];

$stmt = $pdo->prepare('DELETE FROM cursos WHERE id = ?');

$stmt->execute([$id]);

header('Location: index.php');
exit;

