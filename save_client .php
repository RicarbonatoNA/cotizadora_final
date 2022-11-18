<?php

include('database.php');

if (isset($_POST['save_taks'])) {
  $name = $_POST['name'];
  $email= $_POST['email'];
  $identificador_fiscal = $_POST['identificador_fiscal'];
  $telefono	 = $_POST['telefono'];
  $calle = $_POST['calle'];
  $numero = $_POST['numero'];
  $colonia = $_POST['colonia'];
  $codigo_postal = $_POST['codigo_postal'];
  $ciudad = $_POST['ciudad'];
  $estado= $_POST['estado'];
  $pais= $_POST['pais'];
  $notas= $_POST['notas'];


 

  $query = "INSERT INTO client(name, email, identificador_fiscal, telefono, calle, numero, colonia, codigo_postal, ciudad, estado, pais, notas ) VALUES ('$name', '$email', '$identificador_fiscal', '$telefono', '$calle', '$numero', '$colonia', '$codigo_postal', '$ciudad', '$estado', '$pais', '$notas' )";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: client.php');

}

?>
