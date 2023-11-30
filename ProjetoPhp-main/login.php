<?php
// Configurações do banco de dados
$dsn = 'mysql:host=localhost;dbname=eduardo;charset=utf8mb4';
$username = 'root';
$password = '';

// Configuração da conexão PDO
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);

    // Verificando se o formulário foi submetido
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Prepara a consulta SQL para verificar o login
        $query = $pdo->prepare("SELECT * FROM usuarios WHERE username = :username AND password = :password");
        $query->bindParam(':username', $username);
        $query->bindParam(':password', $password);

        // Executa a consulta
        $query->execute();

        // Verifica se o login é bem-sucedido
        if ($query->rowCount() > 0) {
            header('Location: pagina_compra.php');
            exit();
        } else {
            echo "Credenciais inválidas. Tente novamente.";
        }
    }
} catch (PDOException $e) {
    echo 'Erro de conexão com o banco de dados: ' . $e->getMessage();
    // Trate o erro de conexão de alguma forma apropriada para sua aplicação
}
?>