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
                        <form action="" class="row">
                            <div class="form-gruop mb-3 col-md-12">
                                <label for="user">Usuario</label>
                                <input type="text" class="form-control" name="user" id="user">
                            </div>
                            <div class="form-gruop mb-3 col-md-12">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>

                            <div class="form-group col-md-12">
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="record">
                                    <label class="form-check-label" for="record">Recordar datos</label>
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-between">
                                    <button type="submit" class="btn btn-primary">Validar</button>
                                    <a href="<?php echo URL ?>/login/olvido" class="text-decoration-none">¿Olvido su contraseña?</a>
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