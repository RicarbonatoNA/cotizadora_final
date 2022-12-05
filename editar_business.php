<?php
include("database.php");
$name = '';
$identificador_fiscal = '';
$direccion_facturacion= '';
$telefono	 = '';
$logo= '';
$notas= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM business WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $name = $row['name'];
    $identificador_fiscal = $row['identificador_fiscal'];
    $direccion_facturacion= $row['direccion_facturacion'];
    $telefono	 = $row['telefono'];
    $logo= $row['logo'];
    $notas= $row['notas'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $name=$_POST['name'];
  $identificador_fiscal=$_POST['identificador_fiscal'];
  $direccion_facturacion=$_POST['direccion_facturacion'];
  $telefono=$_POST['telefono'];
  $logo=$_POST['logo'];
  $notas=$_POST['notas'];

  $query = "UPDATE business set identificador_fiscal = '$identificador_fiscal', direccion_facturacion ='$direccion_facturacion', telefono ='$telefono', logo = '$logo', notas ='$notas' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: business.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="editar_business.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="name" type="text" class="form-control" value="<?php echo $name; ?>" placeholder="Update name">
        </div>
        <div class="form-group">
          <input name="identificador_fiscal" type="text" class="form-control" value="<?php echo $identificador_fiscal; ?>" placeholder="Update identificador_fiscal">
        </div>
        <div class="form-group">
          <input name="direccion_facturacion" type="text" class="form-control" value="<?php echo $direccion_facturacion; ?>" placeholder="Update direccion_facturacion">
        </div>
        <div class="form-group">
          <input name="telefono" type="text" class="form-control" value="<?php echo $telefono; ?>" placeholder="Update telefono">
        </div>
        <div class="form-group">
          <input name="logo" type="text" class="form-control" value="<?php echo $logo; ?>" placeholder="Update logo">
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
