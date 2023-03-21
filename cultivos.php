<?php
include("includes/header.php");
if (isset($_POST['camas'])) {
    echo   $camas = $_POST['camas'];
}
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
    include "includes/sesion.php";

    ?>






    <!-- Blank Start -->
    <form action="cultivos.php?inv=<?php if (isset($_GET['inv'])) echo $_GET['inv']; ?>&nav=CU" method="POST">
        <div class="container-fluid pt-4 px-4">

            <div class="container text-center">

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <select class="form-select" id="invernaderos" aria-label="Floating label select example">
                                <option selected>invernaderos</option>
                                <?php
                                $id = $_SESSION['id'];
                                $consulta = "SELECT * FROM invernadero where id_jefe=$id";
                                $abreConsulta = mysqli_query($conexion, $consulta);
                                while ($columna = mysqli_fetch_assoc($abreConsulta)) { ?>

                                    <option value="<?php echo $columna['id_invernadero']; ?>"> <?php echo $columna['nombre']; ?></option>
                                <?php   }
                                ?>
                            </select>
                            <label for="floatingSelect">seleciona un invernadero </label>
                        </div>
                    </div>



                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <select class="form-select" id="camas" name="camas" aria-label="Floating label select example">
                                <?php
                                if (isset($_GET['inv'])) {
                                    $id = $_GET['inv'];
                                    $consulta = "SELECT * FROM cama where id_invernadero  = $id AND cama <> 'Disponible' ";
                                    $abreConsulta = mysqli_query($conexion, $consulta);
                                    while ($columna = mysqli_fetch_assoc($abreConsulta)) { ?>
                                        <option value="<?php echo $columna['id_cama']; ?>"> <?php echo $columna['cama']; ?></option>
                                <?php   }
                                }
                                ?>


                            </select>
                            <label for="floatingSelect">Seleciona una cama</label>
                        </div>

                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary rounded-pill m-4">Buscar</button>
                    </div>
                </div>


            </div>
    </form>
    <?php
    if (isset($_POST['camas'])) {
        $_SESSION['cama'] = $_POST['camas'];
        $_SESSION['invernadero'] = $_GET['inv'];
        $idC = $_SESSION['cama'];
        $consultaC = "SELECT c.id_cama, c.cama,c.fecha_ingreso,c.fecha_cosecha,c.fecha_plantula,s.nombre as semilla from cama c
        INNER JOIN semilla s on c.id_semilla = s.id_semilla
        where id_cama=$idC";
        $resp = mysqli_query($conexion, $consultaC);
        $sem = "";
        while ($columna = mysqli_fetch_assoc($resp)) {
            $_SESSION['cultivo'] = $columna['id_cama'];
            $sem = $columna['id_cama'];

            echo '<table class="table table-striped table-dark">
        <thead>
          <tr>
            <th scope="col">Id Cama</th>
            <th scope="col">Nombre cama</th>
            <th scope="col">Semilla plantada</th>
            <th scope="col">Fecha ingreso</th>
            <th scope="col">Fecha cosecha</th>
            <th scope="col">Fecha plantula</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">' . $idC . '</th>
            <td>' . $columna['cama'] . '</td>
            <td>' . $columna['semilla'] . '</td>
            <td>' . $columna['fecha_ingreso'] . '</td>
            <td>' . $columna['fecha_plantula'] . '</td>
            <td>' . $columna['fecha_cosecha'] . '</td>
          </tr>
        </tbody>
      </table>';
        }
        $consultaC = "SELECT * from cama c  
     inner join semilla s on s.id_semilla=c.id_semilla
     where c.id_cama=$sem";
        $resp = mysqli_query($conexion, $consultaC);
        while ($columna = mysqli_fetch_assoc($resp)) {
            $_SESSION['semillaNombre'] = $columna['nombre'];
        }

        echo "
    <h1 class='mb-4' align='center'> En esta cama se planto: " . $_SESSION['semillaNombre'] . "</h1>";
    }
    ?>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">AGUA TEMPERATURA (CANAL DE HIDROPONIA) </h6>
                    <canvas id="myChart"></canvas>
                </div>
            </div>

            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">TIERRA TEMPERATURA(GRADOS)</h6>
                    <canvas id="humedad"></canvas>
                </div>
            </div>

            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">AGUA PH(CANAL DE HIDROPONIA)</h6>
                    <canvas id="phAgua"></canvas>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">TIERRA PH(CAMA CULTIVO)</h6>
                    <canvas id="phTierra"></canvas>
                </div>
            </div>

            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4"> TIERRA HUMEDAD</h6>
                    <canvas id="phTierra_humedad"></canvas>
                </div>
            </div>







        </div>
    </div>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Descargar reporte</h6>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">FECHA</th>
                            <th scope="col">TIPO ARCHIVO</th>
                            <th scope="col">REPORTE</th>
                            <th scope="col">CAMA</th>
                            <th scope="col">ACCION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_POST['camas']) && isset($_GET['inv'])) {

                        ?>
                            <tr hidden>
                                <td><?php echo date('d-m-Y'); ?></td>
                                <td>EXCEL</td>
                                <td>TEMPERATURA</td>
                                <td><?php echo $_SESSION['cama']; ?></td>
                                <td><a class="btn btn-sm btn-primary" href="excel.php?cultivo=<?php echo $_SESSION['cultivo']; ?>&cate=t">Descargar</a></td>
                            </tr>
                            <tr hidden>
                                <td><?php echo date('d-m-Y'); ?></td>
                                <td>EXCEL</td>
                                <td>HUMEDAD</td>
                                <td><?php echo $_SESSION['cama']; ?></td>
                                <td><a class="btn btn-sm btn-primary" href="excel.php?cultivo=<?php echo $_SESSION['cultivo']; ?>&cate=h">Descargar</a></td>
                            </tr>
                            <tr>
                                <td><?php echo date('d-m-Y'); ?></td>
                                <td>EXCEL</td>
                                <td>PH TIERRA</td>
                                <td><?php echo $_SESSION['cama']; ?></td>
                                <td><a class="btn btn-sm btn-primary" href="excel.php?cultivo=<?php echo $_SESSION['cultivo']; ?>&cate=pt">Descargar</a></td>
                            </tr>
                            <tr>
                                <td><?php echo date('d-m-Y'); ?></td>
                                <td>EXCEL</td>
                                <td>PH AGUA</td>
                                <td><?php echo $_SESSION['cama']; ?></td>
                                <td><a class="btn btn-sm btn-primary" href="excel.php?cultivo=<?php echo $_SESSION['cultivo']; ?>&cate=pa">Descargar</a></td>
                            </tr>
                            <tr>
                                <td><?php echo date('d-m-Y'); ?></td>
                                <td>EXCEL</td>
                                <td>PH TIERRA HUMEDAD</td>
                                <td><?php echo $_SESSION['cama']; ?></td>
                                <td><a class="btn btn-sm btn-primary" href="excel.php?cultivo=<?php echo $_SESSION['cultivo']; ?>&cate=pah">Descargar</a></td>
                            </tr>
                        <?php
                        }
                        ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Blank End -->


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


    <script>
        $(document).ready(function() {
            $("#invernaderos").change(function() {

                // var selectedVal = $("#invernaderos option:selected").text();


                var selectedVal = $("#invernaderos option:selected").val();

                location.href = 'cultivos.php?inv=' + selectedVal + '&nav=CU';

            });


        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Obtener el elemento canvas

        var ctx2 = document.getElementById('phAgua');
        var ctx3 = document.getElementById('phTierra');
        var ctx4 = document.getElementById('humedad');
        var ctx5 = document.getElementById('myChart');
        var ctx6 = document.getElementById('phTierra_humedad');

        // Crear un objeto Chart y especificar los datos y opciones del gráfico

        var miGrafica2 = new Chart(ctx2, {
            type: "line",
            data: {
                labels: [
                    <?php
                    $idCul = $_SESSION['cultivo'];
                    $sql = "select fechahora from bitacoraphagua where id_cama=$idCul";
                    $result = mysqli_query($conexion, $sql);
                    while ($registros = mysqli_fetch_array($result)) {
                    ?> '<?php echo  $registros["fechahora"] ?>',
                    <?php
                    }
                    ?>
                ],
                datasets: [{

                    data: [
                        <?php
                        $idCul = $_SESSION['cultivo'];
                        $query = "select phagua from bitacoraphagua where id_cama=$idCul";
                        $resultados = mysqli_query($conexion, $query);
                        while ($rows = mysqli_fetch_array($resultados)) {
                        ?>
                            <?php echo $rows["phagua"] ?>,
                        <?php
                        }
                        ?>
                    ],
                    backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"]
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: ""
                }
            }
        });
        var miGrafica3 = new Chart(ctx3, {
            type: "line",
            data: {
                labels: [
                    <?php
                    $idCul = $_SESSION['cultivo'];
                    $sql = "select fechahora from bitacoraphtierra where id_cama=$idCul";
                    $result = mysqli_query($conexion, $sql);
                    while ($registros = mysqli_fetch_array($result)) {
                    ?> '<?php echo  $registros["fechahora"] ?>',
                    <?php
                    }
                    ?>
                ],
                datasets: [{

                    data: [
                        <?php
                        $idCul = $_SESSION['cultivo'];
                        $query = "select phtierra from bitacoraphtierra where id_cama=$idCul";
                        $resultados = mysqli_query($conexion, $query);
                        while ($rows = mysqli_fetch_array($resultados)) {
                        ?>
                            <?php echo $rows["phagua"] ?>,
                        <?php
                        }
                        ?>
                    ],
                    backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"]
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: ""
                }
            }
        });
        var miGrafica4 = new Chart(ctx4, {
            type: "line",
            data: {
                labels: [
                    <?php
                    $idCul = $_SESSION['cultivo'];
                    $sql = "select fechahora from bitacoratierratemp where id_cama=$idCul";
                    $result = mysqli_query($conexion, $sql);
                    while ($registros = mysqli_fetch_array($result)) {
                    ?> '<?php echo  $registros["fechahora"] ?>',
                    <?php
                    }
                    ?>
                ],
                datasets: [{

                    data: [
                        <?php
                        $idCul = $_SESSION['cultivo'];
                        $query = "select temperatura_tierra from bitacoratierratemp where id_cama=$idCul";
                        $resultados = mysqli_query($conexion, $query);
                        while ($rows = mysqli_fetch_array($resultados)) {
                        ?>
                            <?php echo $rows["temperatura_tierra"] ?>,
                        <?php
                        }
                        ?>
                    ],
                    backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"]
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: ""
                }
            }
        });
        var miGrafica5 = new Chart(ctx5, {
            type: "line",
            data: {
                labels: [
                    <?php
                    $idCul = $_SESSION['cultivo'];
                    $sql = "select fechahora from bitacoratemp where id_cama=$idCul";
                    $result = mysqli_query($conexion, $sql);
                    while ($registros = mysqli_fetch_array($result)) {
                    ?> '<?php echo  $registros["fechahora"] ?>',
                    <?php
                    }
                    ?>
                ],
                datasets: [{

                    data: [
                        <?php
                        $idCul = $_SESSION['cultivo'];
                        $query = "select temperatura from bitacoratemp where id_cama=$idCul";
                        $resultados = mysqli_query($conexion, $query);
                        while ($rows = mysqli_fetch_array($resultados)) {
                        ?>
                            <?php echo $rows["temperatura"] ?>,
                        <?php
                        }
                        ?>
                    ],
                    backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"]
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: ""
                }
            }
        });
        var miGrafica6 = new Chart(ctx6, {
            type: "line",
            data: {
                labels: [
                    <?php
                    $idCul = $_SESSION['cultivo'];
                    $sql = "select fechahora from bitacoraphtierrahumedad where id_cama=$idCul";
                    $result = mysqli_query($conexion, $sql);
                    while ($registros = mysqli_fetch_array($result)) {
                    ?> '<?php echo  $registros["fechahora"] ?>',
                    <?php
                    }
                    ?>
                ],
                datasets: [{

                    data: [
                        <?php
                        $idCul = $_SESSION['cultivo'];
                        $query = "select phtierra_humedad from bitacoraphtierrahumedad where id_cama=$idCul";
                        $resultados = mysqli_query($conexion, $query);
                        while ($rows = mysqli_fetch_array($resultados)) {
                        ?>
                            <?php echo $rows["phtierra_humedad"] ?>,
                        <?php
                        }
                        ?>
                    ],
                    backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"]
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: ""
                }
            }
        });
    </script>

    <?php

    //include("./includes/graficas.php");

    include("./includes/creditos.php");
    include("./includes/footer.php");
