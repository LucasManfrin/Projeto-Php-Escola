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
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];

        // Verifica se as senhas coincidem
        if ($password != $confirm_password) {
            echo "As senhas não coincidem. Tente novamente.";
        } else {
            // Prepara a consulta SQL para inserir um novo usuário
            $query = $pdo->prepare("INSERT INTO usuarios (username, email, password) VALUES (:username, :email, :password)");
            $query->bindParam(':username', $username);
            $query->bindParam(':email', $email);
            $query->bindParam(':password', $password);

            // Executa a consulta
            $query->execute();

            header('Location: index.php');
            exit();
        }
    }
} catch (PDOException $e) {
    echo 'Erro de conexão com o banco de dados: ' . $e->getMessage();
    // Trate o erro de conexão de alguma forma apropriada para sua aplicação
}
?>