<?php

session_start();

    if (isset($_SESSION['user_id'])) {
        header('Location: /cotizador final');
    }

    require 'database.php';

    if (!empty($_POST['email']) && !empty($_POST['email'])) {
        $records = $conn->prepare('SELECT id, email, password FROM users WHERE email=:email');
        $records->bindParam(':email', $_POST['email']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);    

        $message = '';

        if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
            $_SESSION['user_id'] = $results['id'];
            header('Location: /cotizador final');
        } else {
            $message = 'Lo siento, esta cuenta no existe';
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia Sesion</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php require 'partials/header.php' ?>
    
    <h1>Inicia Sesion</h1>

    <?php if(!empty($message)) : ?>
        <p><?= $message ?></p>
    <?php endif; ?>

    <form action="login.php" method="post">
        <input type="text" name="email" placeholder="Escribe tu correo">
        <input type="password" name="password" placeholder="Escribe tu contraseña">
        <input type="submit" valor="Send">
    </form>
    <span>o <a href="singup.php">Registrate</a></span>
</body>
</html>