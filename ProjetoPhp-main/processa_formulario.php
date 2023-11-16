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

    // Preços das cervejas
    $preco_brahma = 5.00;
    $preco_skol = 3.00;

    // Calcular o valor total do pedido
    $valor_total = ($quantidade_brahma * $preco_brahma) + ($quantidade_skol * $preco_skol);

    // Incluir a hora no formato Y-m-d H:i:s
    date_default_timezone_set('America/Sao_Paulo');
    $hora_clicou = date("Y-m-d H:i:s");

    // Inserir dados no banco de dados com a hora e valor total
    $sql = "INSERT INTO consulta_cervejas (brahma, skol, hora_pedido, valor_pedido) VALUES ('$quantidade_brahma', '$quantidade_skol', '$hora_clicou', '$valor_total')";

    if ($conn->query($sql) === TRUE) {
        $mensagem = "Dados inseridos com sucesso!";
    } else {
        $mensagem = "Erro ao inserir dados: " . $conn->error;
    }
}

// Fechar a conexão
$conn->close();
?>
