<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
// Conectar ao banco de dados (substitua os valores conforme necessário)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eduardo";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro de conexão com o banco de dados: " . $conn->connect_error);
}

// Inicializar variáveis para as mensagens
$mensagem = '';

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter valores do formulário
    $quantidade_brahma = $_POST['brahma'];
    $quantidade_skol = $_POST['skol'];

    // Inserir dados no banco de dados
    $sql = "INSERT INTO cervejas (brahma, skol) VALUES ('$quantidade_brahma', '$quantidade_skol')";

    if ($conn->query($sql) === TRUE) {
        $mensagem = "Dados inseridos com sucesso!";
    } else {
        $mensagem = "Erro ao inserir dados: " . $conn->error;
    }
}

// Fechar a conexão
$conn->close();
?>