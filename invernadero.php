<?php
// PAGINA PRINCIPAL INVERNADEROS
include("./includes/header.php");

?>
<div class="container-xxl position-relative bg-white d-flex p-0">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">cargando...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Sidebar Start -->
    <?php
    include "./includes/sesion.php";
    ?>

    <!-- Blank Start -->
    <div class="container-fluid pt-4 px-4">

        <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">

            <div class="col-sm-12 col-xl-6">
                <?php
                if (isset($_GET['resul'])) {
                    if ($_GET['resul'] == "i") {
                        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fa fa-exclamation-circle me-2"></i>An icon & dismissing primary alert—check it out!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                    } else if ($_GET['resul'] == "e") {
                        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fa fa-exclamation-circle me-2"></i>An icon & dismissing primary alert—check it out!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                    } elseif ($_GET['resul'] == "p") {
                        echo ' <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <i class="fa fa-exclamation-circle me-2"></i>An icon & dismissing primary alert—check it out!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                    }
                }
                ?>

                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">INVERNADERO NUEVO</h6>

                    <div class="form mb-3">
                        <form action="conexion/verificacion.php" method="POST">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="nombre">
                                <label for="floatingInput">Nombre del invernadero</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" name="camas" class="form-control" id="floatingInput" value="" maxlength="9" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                                <label for="floatingInput">Número de camas</label>
                            </div>


                            <!-- SELECT2 -->
                            <!-- ESTADO -->
                            <div class="form mb-3">
                                <label for="floatingSelect">Seleccione un estado:</label>
                                <select id="estados" class="js-example-basic-single form-select" name="state" aria-label="Floating label select example">

                                </select>
                            </div>

                            <!-- MUNICIPIO -->
                            <div class="form mb-3">
                                <label for="floatingSelect">Seleccione un municipio:</label>
                                <select id="municipios" class="js-example-basic-single form-select" name="state" aria-label="Floating label select example">

                                </select>
                            </div>

                            <!-- LOCALIDAD -->
                            <div class="form mb-3">
                                <label for="floatingSelect">Seleccione un estado:</label>
                                <select id="localidades" class="js-example-basic-single form-select" name="state" aria-label="Floating label select example">

                                </select>
                            </div>
                            <!-- FIN SELECT2 -->

                            <!-- CALLE -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="nombre">
                                <label for="floatingInput">Calle: </label>
                            </div>

                            <!-- DATOS EXTRA DIRECCION -->
                            <div class="container form-floating mb-3">
                                <div class="row row-cols-2 row-cols-lg-3 g-2 g-lg-3">

                                    <!-- Número exterior-->
                                    <div class="form-floating mb-3 col">
                                        <input type="text" name="camas" class="form-control" width="100%" id="floatingInput" value="" maxlength="9" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                                        <label for="floatingInput">Número exterior: </label>
                                    </div>

                                    <!-- Número interior -->
                                    <div class="form-floating mb-3 col">
                                        <input type="text" name="camas" class="form-control" id="floatingInput" value="" maxlength="9" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                                        <label for="floatingInput">Número interior: </label>
                                    </div>

                                    <!-- CP -->
                                    <div class="form-floating mb-3 col">
                                        <input type="text" name="camas" class="form-control" id="floatingInput" value="" maxlength="9" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                                        <label for="floatingInput">CP: </label>
                                    </div>
                                </div>
                            </div>

                            <!-- JEFE -->
                            <div class="form mb-3">
                                <label for="floatingSelect">Seleccione un Jefe:</label>
                                <select id="estados" class="js-example-basic-single form-select" name="state" aria-label="Floating label select example">
                                    <?php
                                    $consulta = "SELECT id_jefe, concat(nombre,' ', primer_apellido,' ',segundo_apellido) as nombre FROM jefe";
                                    $abreConsulta = mysqli_query($conexion, $consulta);
                                    while ($columna = mysqli_fetch_assoc($abreConsulta)) {
                                    ?>
                                        <option value="<?php echo $columna['id_jefe']; ?>"> <?php echo $columna['nombre']; ?></option>
                                    <?php   } ?>
                                </select>
                            </div>
                        </form>
                    </div>

                    <button type="button" class="btn btn-danger rounded-pill m-2" data-bs-toggle="modal" data-bs-target="#exampleModal">resetear cama</button>
                    <button type="button" class="btn btn-success rounded-pill m-2">guardar cama</button>

                </div>
            </div>

        </div>
    </div>
    <!-- Blank End -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                            <option selected>UBICACION</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <label for="floatingSelect">SELECIONAR UBICACION</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                            <option selected>CAMA</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <label for="floatingSelect">SELECIONAR EL CAMA</label>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <?php
    include("./includes/creditos.php");
    include("./includes/footer.php");

    // FIN PAGINA PRINCIPAL
    if (isset($_POST['nuevoInver'])) {
    }
