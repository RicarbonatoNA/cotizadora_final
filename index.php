<?php 
session_start();

require 'database.php';

if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id' );
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
        $user = $results;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MI Cotizadora</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <?php require 'partials/header.php' ?>

    <?php if(!empty($user)): ?>
        <br>Bienvenido. <?= $user['email']?>
        <br>Has ingresado satisfactoriamente
        <a href="logout.php">Cerrar sesion</a>

    <?php else: ?>
        <h1>Inicia sesion o registrate</h1>
        <a href="login.php">Inicia Sesion</a> or 
        <a href="singup.php">Registrate</a> <br><br>
        <a href="productos.php">productos</a> 
    <?php endif; ?>
</body>
</html>