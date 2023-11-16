<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style_pagina_compra.css">
    <style>
        
    </style>
</head>
<body>
    <h1>SELECIONE OS ITEMS</h1>
    <form action="processa_formulario.php" method="post">
        <label for="brahma">Brahma - R$5,00</label>
        <input type="number" name="brahma" id="brahma">
        <label for="skol">Skol - R$3,00</label>
        <input type="number" name="skol" id="skol">
        <button id="enviar" type="submit">ENVIAR</button>
    </form>
    <script src="scripts_pagina_compra.js"></script>
</body>
</html>
