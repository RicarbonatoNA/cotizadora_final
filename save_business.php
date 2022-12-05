
<?php

include('database.php');

if (isset($_POST['save_business'])) {
  $name = $_POST['name'];
  $direccion_facturacion= $_POST['direccion_facturacion'];
  $identificador_fiscal = $_POST['identificador_fiscal'];
  $telefono	 = $_POST['telefono'];
  $logo= $_POST['logo'];
  $notas= $_POST['notas'];


 

  $query = "INSERT INTO business(name, identificador_fiscal, direccion_facturacion, telefono, logo, notas ) VALUES ('$name', '$identificador_fiscal', '$direccion_facturacion', '$telefono', '$logo', '$notas' )";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: business.php');

}

?>