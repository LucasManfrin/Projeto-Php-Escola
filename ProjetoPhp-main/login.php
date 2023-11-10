<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Verifica as credenciais (isso é apenas um exemplo, não use assim em um ambiente real)
    if ($username == "123" && $password == "123") {
        // Login bem-sucedido, redireciona para a página principal ou realiza outras ações necessárias
        header("Location: index.php");
        exit();
    } else {
        // Credenciais inválidas, exibe uma mensagem de erro (também é um exemplo, em um ambiente real, você não deve revelar informações sensíveis)
        echo "Credenciais inválidas. Tente novamente.";
    }
}
?>