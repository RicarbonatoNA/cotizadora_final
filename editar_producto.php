<?php
include("database.php");
$title = '';
$name = '';
$sku = '';
$description = '';
$precio_compra = '';
$precio_venta = '';
$divisa = '';
$impuesto = '';
$unidad = '';
$imagen = '';
$notas= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM products WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $name = $row['name'];
    $sku = $row['sku'];
    $description = $row['descripcion'];
    $precio_compra = $row['precio_compra'];
    $precio_venta = $row['precio_venta'];
    $divisa = $row['divisa'];
    $impuesto = $row['impuesto'];
    $unidad = $row['unidad'];
    $imagen = $row['imagen'];
    $notas= $row['notas'];
}
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
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

  $query = "UPDATE products set name = '$name', sku= '$sku' ,description = '$description', precio_compra ='$precio_compra', precio_venta ='$precio_venta', divisa= '$divisa', 
  impuesto= '$impuesto', unidad = '$unidad', imagen = '$imagen', notas = '$notas'
  WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: productos.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="editar_producto.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="name" type="text" class="form-control" value="<?php echo $name; ?>" placeholder="Update name">
        </div>
        <div class="form-group">
          <input name="sku" type="text" class="form-control" value="<?php echo $sku; ?>" placeholder="Update sku">
        </div>
        
        <div class="form-group">
          <input name="precio_compra" type="text" class="form-control" value="<?php echo $precio_compra; ?>" placeholder="Update precio_compra">
        </div>
        <div class="form-group">
          <input name="precio_venta" type="text" class="form-control" value="<?php echo $precio_venta; ?>" placeholder="Update precio_venta">
        </div>
        <div class="form-group">
          <input name="divisa" type="text" class="form-control" value="<?php echo $divisa; ?>" placeholder="Update divisa">
        </div>
        <div class="form-group">
          <input name="impuesto" type="text" class="form-control" value="<?php echo $impuesto; ?>" placeholder="Update impuesto">
        </div>
        <div class="form-group">
          <input name="unidad" type="text" class="form-control" value="<?php echo $unidad; ?>" placeholder="Update unidad">
        </div>
        <div class="form-group">
          <input name="$imagen " type="text" class="form-control" value="<?php echo $$imagen ; ?>" placeholder="Update $imagen ">
        </div>
        <div class="form-group">
        <textarea name="notas" class="form-control" cols="30" rows="10"><?php echo $notas;?></textarea>
        </div>
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
