<?php
$dsn = 'mysql:host=localhost;dbname=eduardo;charset=utf8mb4';
$username = 'root';
$password = '';


$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];

        
        if ($password != $confirm_password) {
            echo "As senhas não coincidem. Tente novamente.";
        } else {
            
            $query = $pdo->prepare("INSERT INTO usuarios (username, email, password) VALUES (:username, :email, :password)");
            $query->bindParam(':username', $username);
            $query->bindParam(':email', $email);
            $query->bindParam(':password', $password);

            
            $query->execute();

            header('Location: index.php');
            exit();
        }
    }
} catch (PDOException $e) {
    echo 'Erro de conexão com o banco de dados: ' . $e->getMessage();
}
?>