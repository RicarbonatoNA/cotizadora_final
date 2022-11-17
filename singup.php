<?php
    require 'database.php';

    $message = '';

    if (!empty($_POST['nombre']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $sql = "INSERT INTO users (nombre, email, password) VALUES (:nombre, :email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre', $_POST['nombre']);
        $stmt->bindParam(':email', $_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password);

        if ($stmt -> execute()) {
            $message = "Usuario creado!";
        } else {
            $message = "Ha ocurrido un error al crear el usuario";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrate</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
    <p><?= $message ?></p>
    <?php endif; ?>
    
    <h1>Registrate</h1>
    <form action="singup.php" method="post">
        <input type="text" name="nombre" placeholder="Escribe tu nombre">
        <input type="text" name="email" placeholder="Escribe tu correo">
        <input type="password" name="password" placeholder="Escribe tu contraseña">
        <input type="password" name="password_c" placeholder="Confirma tu contraseña">
        <input type="submit" valor="Send">
    </form>
    <span>o <a href="login.php">Inicia sesion</a></span>
</body>
</html>