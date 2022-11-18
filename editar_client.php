<?php
include("database.php");
$name = '';
$email= '';
$identificador_fiscal = '';
$telefono	 = '';
$calle = '';
$numero = '';
$colonia = '';
$codigo_postal = '';
$ciudad = '';
$estado= '';
$pais= '';
$notas= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM client WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $name = $row['name'];
    $email= $row['email'];
    $identificador_fiscal = $row['identificador_fiscal'];
    $telefono	 = $row['telefono'];
    $calle = $row['calle'];
    $numero = $row['numero'];
    $colonia = $row['colonia'];
    $codigo_postal = $row['codigo_postal'];
    $ciudad = $row['ciudad'];
    $estado= $row['estado'];
    $pais= $row['pais'];
    $notas= $row['notas'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
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

  $query = "UPDATE client set email = '$email', identificador_fiscal = '$identificador_fiscal', telefono ='$telefono', calle ='$calle', numero = '$numero', colonia = '$colonia' , codigo_postal = '$codigo_postal', ciudad = '$ciudad', estado = '$estado', pais = '$pais', notas ='$notas' WHERE id=$id";
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
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="name" type="text" class="form-control" value="<?php echo $name; ?>" placeholder="Update name">
        </div>
        <div class="form-group">
          <input name="email" type="text" class="form-control" value="<?php echo $email; ?>" placeholder="Update email">
        </div>
        <div class="form-group">
          <input name="identificador_fiscal" type="text" class="form-control" value="<?php echo $identificador_fiscal; ?>" placeholder="Update identificador_fiscal">
        </div>
        <div class="form-group">
          <input name="telefono" type="text" class="form-control" value="<?php echo $telefono; ?>" placeholder="Update telefono">
        </div>
        <div class="form-group">
          <input name="calle" type="text" class="form-control" value="<?php echo $calle; ?>" placeholder="Update calle">
        </div>
        <div class="form-group">
          <input name="numero" type="text" class="form-control" value="<?php echo $numero; ?>" placeholder="Update numero">
        </div>
        <div class="form-group">
          <input name="colonia" type="text" class="form-control" value="<?php echo $colonia; ?>" placeholder="Update colonia">
        </div>
        <div class="form-group">
          <input name="codigo_postal" type="text" class="form-control" value="<?php echo $codigo_postal; ?>" placeholder="Update codigo_postal">
        </div>
        <div class="form-group">
          <input name="ciudad" type="text" class="form-control" value="<?php echo $ciudad; ?>" placeholder="Update ciudad">
        </div>
        <div class="form-group">
          <input name="estado" type="text" class="form-control" value="<?php echo $estado; ?>" placeholder="Update estado">
        </div>
        <div class="form-group">
          <input name="pais" type="text" class="form-control" value="<?php echo $pais; ?>" placeholder="Update pais">
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
