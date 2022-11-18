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
        <form action="save_task.php" method="POST">
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="name" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="sku" class="form-control" placeholder="sku" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="descripcion" class="form-control" placeholder="descripcion" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="precio_compra" class="form-control" placeholder="precio_compra" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="precio_venta" class="form-control" placeholder="precio_venta" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="divisa" class="form-control" placeholder="divisa" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="impuesto" class="form-control" placeholder="impuesto" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="unidad" class="form-control" placeholder="unidad" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="imagen" class="form-control" placeholder="imagen" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="notas" class="form-control" placeholder="notas" autofocus>
          </div>
          <input type="submit" name="save_products" class="btn btn-success btn-block" value="picame con cuiadado soy una dama  ">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>name</th>
            <th>sku</th>
            <th>descripcion</th>
            <th>precio_compra</th>
            <th>precio_venta</th>
            <th>divisa</th>
            <th>impuesto</th>
            <th>unidad</th>
            <th>imagen</th>
            <th>notas</th>

          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM products";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['sku']; ?></td>
            <td><?php echo $row['descripcion']; ?></td>
            <td><?php echo $row['precio_compra']; ?></td>
            <td><?php echo $row['precio_venta']; ?></td>
            <td><?php echo $row['divisa']; ?></td>
            <td><?php echo $row['impuesto']; ?></td>
            <td><?php echo $row['unidad']; ?></td>
            <td><?php echo $row['imagen']; ?></td>
            <td><?php echo $row['notas']; ?></td>
            <td>
              <a href="editar_producto.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_producto.php?id=<?php echo $row['id']?>" class="btn btn-danger">
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
