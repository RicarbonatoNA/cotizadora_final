<?php include("database.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_business.php" method="POST">
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="name" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="identificador_fiscal" class="form-control" placeholder="identificador_fiscal" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="direccion_facturacion" class="form-control" placeholder="direccion_facturacion" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="telefono" class="form-control" placeholder="telefono" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="logo" class="form-control" placeholder="logo" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="notas" class="form-control" placeholder="notas" autofocus>
          </div>
          <input type="submit" name="save_business" class="btn btn-success btn-block" value="picame con cuiadado soy una dama x2 ">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>name</th>
            <th>identificador_fiscal</th>
            <th>direccion_facturacion</th>
            <th>telefono</th>
            <th>logo</th>
            <th>notas</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM business ";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['identificador_fiscal']; ?></td>
            <td><?php echo $row['direccion_facturacion']; ?></td>
            <td><?php echo $row['telefono']; ?></td>
            <td><?php echo $row['logo']; ?></td>
            <td><?php echo $row['notas']; ?></td>
            <td>
              <a href="editar_business.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_business.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
