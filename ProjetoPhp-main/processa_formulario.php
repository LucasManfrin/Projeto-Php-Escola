<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eduardo";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Erro de conexão com o banco de dados: " . $conn->connect_error);
}




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $quantidade_brahma = $_POST['brahma'];
    $quantidade_skol = $_POST['skol'];

    
    $preco_brahma = 5.00;
    $preco_skol = 3.00;

    
    $valor_total = ($quantidade_brahma * $preco_brahma) + ($quantidade_skol * $preco_skol);

    
    date_default_timezone_set('America/Sao_Paulo');
    $hora_clicou = date("Y-m-d H:i:s");

    
    $sql = "INSERT INTO consulta_cervejas (brahma, skol, hora_pedido, valor_pedido) VALUES ('$quantidade_brahma', '$quantidade_skol', '$hora_clicou', '$valor_total')";

    if ($conn->query($sql) === TRUE) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados: " . $conn->error;
    }
}


$conn->close();
?>
