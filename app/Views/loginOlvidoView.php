<?php
include_once "header.php";
?>
<main>
    <section class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card mt-4">
                    <div class="card-header text-center">
                        <?php echo $data['subtitulo'] ?>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo URL ?>/login/olvido" method="POST" class="row">
                            <div class="form-gruop mb-3 col-md-12">
                                <label for="email">Correo electronico</label>
                                <input type="text" class="form-control" name="email" id="email">
                            </div>
                            <div class="form-group col-md-12">
                                <div class="d-grid gap-2 d-md-flex justify-content-between">
                                    <button type="submit" class="btn btn-success">Validar</button>
                                    <a href="<?php echo URL ?>" class="btn btn-info">Regresar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
include_once "footer.php";
?>