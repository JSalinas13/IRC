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


                <!-- RESPUESTA DE ELIMINAR CAMA -->
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
                    } else if ($_GET['res'] == 'cno') {
                        echo '<div class="alert alert-danger" role="alert">
                        Contraseña incorrecta!
                      </div>';
                    }
                }
                ?>

                <h6 class="mb-4">DESOCUPAR CAMA</h6>
                <div class="form mb-3">

                    <form class="row g-3" novalidate action="eliminarCama.php" method="POST">

                        <!-- LISTADO DE INVERNADEROS -->
                        <div class="form mb-3">
                            <label for="floatingSelect">Seleccione un invernadero:</label>
                            <select id="inver2" class="js-example-basic-single form-select" name="invernadero2" aria-label="Floating label select example">

                            </select>
                        </div>

                        <!-- LISTADO DE CAMAS -->
                        <div class="form mb-3">
                            <label for="floatingSelect">Camas disponibles:</label>
                            <select id="camas2" class="js-example-basic-single form-select" name="cama2" aria-label="Floating label select example">

                            </select>
                        </div>

                        <div class="container text-center">
                            <div class="row">
                                <div class="col">
                                    <button type="button" class="btn btn-danger rounded-pill m-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Desocupar</button>
                                </div>
                            </div>
                        </div>
                        <!-- MODAL PASSWORD -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-floating mb-4">
                                            <input type="password" class="form-control" id="floatingPassword" name="con" placeholder="Password">
                                            <label for="floatingPassword">Contraseña</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="eliminarC">Aceptar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>





    <!-- ELIMINAR CAMA -->
    <?php
    if (isset($_POST['eliminarC'])) {
        $consulta = "SELECT * FROM usuario WHERE id_usuario = $id_user";
        if ($resul = mysqli_query($conexion, $consulta)) {
            $res = mysqli_fetch_row($resul);


            if (isset($_POST['con']) && md5($_POST['con']) == $res[2]) {
                if ($_POST['invernadero2'] > 0 && $_POST['cama2'] > 0) {
                    $inver = $_POST['invernadero2'];
                    $cama = $_POST['cama2'];
                    $consulta = "SELECT id_cama FROM cama WHERE id_cama = $cama";
                    $resul = mysqli_query($conexion, $consulta);

                    $columna = mysqli_fetch_row($resul);

                    $eliminar = "UPDATE cama SET cama = 'Disponible',
                                                 id_semilla = NULL, 
                                                 fecha_ingreso = '0000-00-00',
                                                 fecha_plantula = NULL, 
                                                 fecha_cosecha = NULL, 
                                                 phagua_temperatura = NULL, 
                                                 phtierra_temperatura = NULL, 
                                                 phagua = NULL, 
                                                 phtierra = NULL, 
                                                 phtierra_humedad = NULL
                                                  WHERE id_cama = $cama";
                    if (mysqli_query($conexion, $eliminar)) {
                        //if (mysqli_query($conexion, "DELETE FROM cama WHERE id_cama = $columna[0]")) {
                        echo '<script> window.location.assign("./camas.php?nav=CA&res=d"); </script>';
                        /*} else {
                            echo '<div class="alert alert-warning" role="alert">
                            OCURRIO ALGO CON ELIMINAR CULTIVO
                          </div>';
                        }*/
                    } else {
                        echo '<div class="alert alert-warning" role="alert"> 
                        OCURRIO ALGO CON ACTUALIZAR LA CAMA
                          </div>';
                    }
                } else {
                    echo '<script> window.location.assign("./eliminarCama.php?nav=CA&res=i"); </script>';
                }
            } else {
                echo '<script> window.location.assign("./eliminarCama.php?nav=CA&res=cno"); </script>';
            }
        }
    }

    ?>







    <?php
    include("./includes/creditos.php");
    include("./includes/footer.php");
    ?>