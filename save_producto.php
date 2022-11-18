<?php

include('database.php');

if (isset($_POST['save_products'])) {
  $name = $_POST['name'];
  $sku = $_POST['sku'];
  $description = $_POST['description'];
  $precio_compra = $_POST['precio_compra'];
  $precio_venta = $_POST['precio_venta'];
  $divisa = $_POST['description'];
  $impuesto = $_POST['impuesto'];
  $unidad = $_POST['unidad'];
  $imagen = $_POST['imagen'];
  $notas= $_POST['notas'];

  $query = "INSERT INTO products (name, sku, description, precio_compra, precio_venta, divisa, impuesto, unidad, imagen, notas ) VALUES ('$name', '$sku', '$description','$precio_compra', '$precio_venta', '$divisa', '$impuesto', '$unidad', '$imagen', '$notas' )";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: productos.php');

}

?>
