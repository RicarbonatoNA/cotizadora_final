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
        <form action="save_client.php" method="POST">
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="name" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="email" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="identificador_fiscal" class="form-control" placeholder="identificador_fiscal" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="telefono" class="form-control" placeholder="telefono" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="calle" class="form-control" placeholder="calle" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="numero" class="form-control" placeholder="numero" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="colonia" class="form-control" placeholder="colonia" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="codigo_postal" class="form-control" placeholder="codigo_postal" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="ciudad" class="form-control" placeholder="ciudad" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="estado" class="form-control" placeholder="estado" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="pais" class="form-control" placeholder="pais" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="notas" class="form-control" placeholder="notas" autofocus>
          </div>
          <input type="submit" name="save_client" class="btn btn-success btn-block" value="picame con cuiadado soy una dama x2 ">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>name</th>
            <th>email</th>
            <th>identificador_fiscal</th>
            <th>telefono</th>
            <th>calle</th>
            <th>numero</th>
            <th>colonia</th>
            <th>codigo_postal</th>
            <th>ciudad</th>
            <th>estado</th>
            <th>pais</th>
            <th>notas</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM client ";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['identificador_fiscal']; ?></td>
            <td><?php echo $row['telefono']; ?></td>
            <td><?php echo $row['calle']; ?></td>
            <td><?php echo $row['numero']; ?></td>
            <td><?php echo $row['colonia']; ?></td>
            <td><?php echo $row['codigo_postal']; ?></td>
            <td><?php echo $row['ciudad']; ?></td>
            <td><?php echo $row['estado']; ?></td>
            <td><?php echo $row['pais']; ?></td>
            <td><?php echo $row['notas']; ?></td>
            <td>
              <a href="editar_client.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_client.php?id=<?php echo $row['id']?>" class="btn btn-danger">
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
