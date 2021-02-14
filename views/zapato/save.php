<?php include_once('views/templates/header.php'); ?>

<?php include_once('views/templates/nav.php'); ?>

<section class="">
    <div class="container">
        <div class="my-5">
            <h2 class="text-center">Registro de Usuarios</h2>
        </div>

        <div class="row">
            <div class="col-md-10 mx-auto">
                <div><a class="btn-cliente" href="?c=lista">Registros</a></div>
                <div class="card">
                    <div class="card-body">
                        <form action="?c=guardar" enctype="multipart/form-data" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Foto</label>
                                        <input type="file" class="form-control" placeholder="Precio" name="file">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Precio</label>
                                        <input type="text" class="form-control" placeholder="precio" name="txtprecio">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Color</label>
                                        <input type="text" class="form-control" placeholder="Color" name="txtcolor">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Cantidad</label>
                                        <input type="text" class="form-control" placeholder="Cantidad" name="txtcantidad">
                                    </div>
                                </div>

                                <div class="col-md-6 m-auto">
                                    <div class="form-group">
                                        <label for="">Estilos</label>
                                        <select name="cboEstilo" id="" class="form-control">
                                            <?php foreach ($this->MODEL->listarEstilo() as $new) : ?>
                                                <option value="<?php echo $new->id; ?>"><?php echo $new->estilo; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Talla</label>
                                        <select name="cbotalla" id="" class="form-control">
                                            <?php foreach ($this->MODEL->listarTalla() as $new) : ?>
                                                <option value="<?php echo $new->id; ?>"><?php echo $new->talla; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Genero</label>
                                        <select name="cbogenero" id="" class="form-control">
                                            <?php foreach ($this->MODEL->listarGenero() as $new) : ?>
                                                <option value="<?php echo $new->id; ?>"><?php echo $new->genero; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="mt-2">
                                        <input type="submit" class="btn btn-success my-3" name="btnregistrar" value="Registrar Producto">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once('views/templates/footer.php'); ?>