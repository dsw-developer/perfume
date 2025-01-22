<?php
$host = 'localhost'; // ou o endereço do seu servidor
$user = 'root';      // seu usuário
$password = '';      // sua senha
$database = 'BE_SPORTY'; // nome do banco de dados

// Criação da conexão
$conn = new mysqli($host, $user, $password, $database);

// Verificação de erro na conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
