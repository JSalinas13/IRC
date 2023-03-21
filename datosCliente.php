<?php
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

            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">BIENVENIDO A IRC : <?php echo $_SESSION['nombre']; ?></h6>
                <div class="form-floating mb-3">

                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" disabled>
                    <label for="floatingInput"><?php echo $_SESSION['user']; ?></label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" disabled>
                    <label for="floatingPassword">123456</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                        <?php
                        $id = $_SESSION['id'];
                        $consulta = "SELECT * FROM invernadero where id_jefe=$id";
                        $abreConsulta = mysqli_query($conexion, $consulta);
                        while ($columna = mysqli_fetch_assoc($abreConsulta)) {
                            echo "<option value='" . $columna['id_invernadero'] . "'>" . $columna['nombre'] . "</option>";
                        }
                        ?>
                    </select>
                    <label for="floatingSelect">Ver invernaderos</label>
                </div>
                <h6 class="mb-4"  hidden>Cambiar imagen</h6>
                <div class="mb-3" hidden >
                    <input class="form-control" type="file" id="formFile">
                </div>
            </div>
        </div>
        <!-- Blank End -->



        <?php
        include("./includes/creditos.php");
        include("./includes/footer.php");

        ?>