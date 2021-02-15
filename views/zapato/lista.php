<?php include_once('views/templates/header.php'); ?>

<?php include_once('views/templates/nav.php'); ?>


<section>
  <div class="container">
    <h1 class="text-center">Lista de zapatos</h1>
    <div class="row">
      <div class="col-md-10 mx-auto">
        <div><a class="btn-cliente" href="?c=nuevo">Nuevo Registro</a></div>
        <div class="card">
          <div class="card-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Foto</th>
                  <th>Precio</th>
                  <th>Color</th>
                  <th>Estilo</th>
                  <th>Talla</th>
                  <th>Genero</th>
                  <th>Cantidad</th>
                  <th>Remove</th>
                  <th>Edit</th>
                </tr>
              </thead>

              <tbody>
                <?php /* var_dump($this->MODEL->listarZapatos()) */ ?>
                <?php foreach ($this->MODEL->listarZapatos() as $new) : ?>
                  <tr>
                    <td><?php echo $new->id; ?></td>
                    <td><img src="<?php echo $new->foto; ?>" class="image__width" alt=""></td>
                    <td><?php echo $new->precio; ?></td>
                    <td><?php echo $new->color; ?></td>
                    <td><?php echo $new->estilo; ?></td>
                    <td><?php echo $new->talla; ?></td>
                    <td><?php echo $new->genero; ?></td>
                    <td><?php echo $new->cantidad; ?></td>
                    <td><a href="?c=eliminar&id=<?php echo $new->id; ?>" class="btn btn-danger">Eliminar</a></td>
                    <td><a href="?c=editar&id=<?php echo $new->id; ?>" class="btn btn-info">Editar</a></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<?php include_once('views/templates/footer.php'); ?>