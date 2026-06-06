<?php
function conectar() {
    $servidor = 'localhost';
    $nomeBanco = 'crud_cursos';
    $usuario = 'root';
    $senha = '';

    try {
        $pdo = new PDO("mysql:host=$servidor; dbname=$nomeBanco", $usuario, $senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Erro na conexão: " . $e->getMessage());
    }
}
