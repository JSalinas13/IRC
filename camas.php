<?php

include("./includes/header.php");
require_once("./conexion/metodos.php");

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

                if ($_SESSION['pri'] == "JEFE") {
                    $id_user = $_SESSION['id'];
                } else {
                    $id = $_SESSION['id'];
                    $consulta = "SELECT * FROM empleado where id_empleado = $id";
                    $abreConsulta = mysqli_query($conexion, $consulta);
                    $columna = mysqli_fetch_assoc($abreConsulta);
                    $id_user = $columna['id_jefe'];
                }
                ?>



                <div class="bg-light rounded h-100 p-4">

                    <!-- RESPUESTA DE INSERT, UPDATW -->
                    <?php
                    if (isset($_GET['res'])) {
                        if ($_GET['res'] == 'S') {
                            echo ' <div class="alert alert-success" role="alert">
                            Se registro la cama con exito!
                        </div>';
                        } else if ($_GET['res'] == 'i') {
                            echo '<div class="alert alert-warning" role="alert">
                            Por favor llene todos los campos!
                          </div>';
                        } else if ($_GET['res'] == 'd') {
                            echo '<div class="alert alert-danger" role="alert">
                            Se desocupó la cama
                          </div>';
                        } else if ($_GET['res'] == 'err') {
                            echo '<div class="alert alert-danger" role="alert">
                            Error al actualizar la cama
                          </div>';
                        }
                    }
                    ?>



                    <h6 class="mb-4">CAMAS</h6>

                    <div class="form mb-3">
                        <!-- ---------------------------------------------------------------- -->


                        <form class="row g-3 needs-validation" novalidate action="nuevacama.php" method="POST">

                            <!-- LISTADO DE INVERNADEROS -->
                            <div class="form mb-3">
                                <label for="floatingSelect">Seleccione un invernadero:</label>
                                <select id="inver" class="js-example-basic-single form-select" name="invernadero" aria-label="Floating label select example">

                                </select>
                            </div>

                            <!-- LISTADO DE CAMAS -->
                            <div class="form mb-3">
                                <label for="floatingSelect">Camas disponibles:</label>
                                <select id="camas" class="js-example-basic-single form-select" name="cama" aria-label="Floating label select example">

                                </select>
                            </div>

                            <!-- NOMBRE CAMA -->
                            <div class="form mb-3">
                                <label for="validationCustom01" class="form-label">Nombre de la cama: </label>
                                <input type="text" class="form-control" id="validationCustom01" name="nombre_cama" placeholder="Nombre de la cama:">
                            </div>

                            <!-- SEMILLA -->
                            <div class="form mb-3">
                                <label for="floatingSelect">Seleccione la semilla:</label>
                                <select id="" class="js-example-basic-single form-select" name="semilla" aria-label="Floating label select example">
                                    <?php
                                    $consulta = "SELECT nombre,id_semilla FROM semilla";
                                    $abreConsulta = mysqli_query($conexion, $consulta);
                                    while ($columna = mysqli_fetch_assoc($abreConsulta)) {
                                    ?>

                                        <option value="<?php echo $columna['id_semilla']; ?>"> <?php echo $columna['nombre']; ?>
                                        </option>

                                    <?php   } ?>

                                </select>
                            </div>


                            <!-- FECHA -->
                            <div class="form-floating mb-3">
                                <input name="fecha_ingreso" type="date" class="form-control" id="floatingPassword" value="<?php echo date('Y-m-d'); ?>">
                                <label for="floatingPassword">FECHA DE INGRESO</label>
                            </div>
                            
                            <!--
                            <div class="form-floating mb-3">
                                <input name="fecha_plantula" type="date" class="form-control" id="floatingPassword" value="<?php echo date('Y-m-d'); ?>">
                                <label for="floatingPassword">FECHA PLANTULA</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input name="fecha_cosecha" type="date" class="form-control" id="floatingPassword" value="<?php echo date('Y-m-d'); ?>">
                                <label for="floatingPassword">FECHA DE COSECHA</label>
                            </div>
                            -->
                            <div class="container text-center">
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-success rounded-pill m-2" name="guardarC">Guardar cama</button>
                                    </div>

                                </div>
                            </div>

                        </form>

                        <form class="row g-3 needs-validation" novalidate action="eliminarCama.php?nav=CA" method="POST">
                            <div class="container text-center">
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-danger rounded-pill m-2">Desocupar cama</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>



        <!-- Blank End -->

    
    <?php
    include("./includes/creditos.php");
    include("./includes/footer.php");

    ?>


    <!-- 
     Funcion para crear total camas
     El codigo arduino que envie phagua, temp_phagua, hum_phagua, phtierra, hum_phtierra
     Aviso de quitar plantula
     Aviso cunado este cosecha 
    -->