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
        $password = $_POST["password"];

       
        $query = $pdo->prepare("SELECT * FROM usuarios WHERE username = :username AND password = :password");
        $query->bindParam(':username', $username);
        $query->bindParam(':password', $password);

        
        $query->execute();

        
        if ($query->rowCount() > 0) {
            header('Location: pagina_compra.php');
            exit();
        } else {
            echo "Credenciais inválidas. Tente novamente.";
        }
    }
} catch (PDOException $e) {
    echo 'Erro de conexão com o banco de dados: ' . $e->getMessage();
    
}
?>