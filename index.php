<html lang="es">

<head>
    <meta charset="utf-8">
    <title>IRC</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <!-- esto es una prueba se puede borrar-->
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->




        <!-- Sign In Start -->
        <div class="container-fluid">

            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <?php
                        if (isset($_GET['E'])) {
                            if ($_GET['E'] == 'Err') {
                                echo '<div class="alert alert-danger" role="alert">
                Usuario o contraseñas incorrectos
              </div>';
                            }
                        }
                        ?>
                        <div class="d-flex align-items-center justify-content-between mb-3">

                            <a href="index.php" class="">
                                <h3 class="text-primary"><i class="fas fa-seedling"></i>IRC</h3>
                            </a>
                            <h3>Iniciar sesion</h3>
                        </div>
                        <form action="conexion/verificacion.php" method="POST">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="email">
                                <label for="floatingInput">usuario</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                                <label for="floatingPassword">contraseña</label>
                            </div>

                            <button type="submit" name="mandar" class="btn btn-primary py-3 w-100 mb-4">iniciar sesion</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <?php
    include("./includes/footer.php");

    ?>