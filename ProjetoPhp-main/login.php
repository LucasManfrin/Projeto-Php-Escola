<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Verifica as credenciais 
    if ($username == "123" && $password == "123") {
        // Login bem-sucedido, redireciona para a página principal 
        header("Location: pagina_compra.php");
        exit();
    } else {
        // Credenciais inválidas, exibe uma mensagem de erro 
        echo "Credenciais inválidas. Tente novamente.";
    }
}
?>