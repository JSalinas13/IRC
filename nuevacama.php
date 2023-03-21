    <?php
    require_once("./conexion/conexion.php");



    if (isset($_POST['fecha_ingreso']) && isset($_POST['semilla']) && isset($_POST['nombre_cama']) && isset($_POST['cama']) && isset($_POST['invernadero']) && $_POST['invernadero'] > 0 && $_POST['cama'] > 0 && !empty($_POST['nombre_cama'])) {
        $id_cama = $_POST['cama'];
        $semilla = $_POST['semilla'];
        $fecha = $_POST['fecha_ingreso'];
        $nombre_cama = $_POST['nombre_cama'];


        $consulta = "SELECT * FROM semilla where id_semilla = $semilla";
        $abreConsulta = mysqli_query($conexion, $consulta);
        $columna = mysqli_fetch_assoc($abreConsulta);
        $plantula_fija = $columna['plantula_fija'];
        $cosecha_fija = $columna['cosecha_fija'];

        if (mysqli_query($conexion, "UPDATE cama set cama = '$nombre_cama', 
                                                     id_semilla = $semilla, 
                                                     fecha_ingreso = '$fecha',
                                                     fecha_plantula = '$fecha' + INTERVAL $plantula_fija DAY,
                                                     fecha_cosecha  = '$fecha'+ INTERVAL $cosecha_fija DAY
                                                WHERE id_cama = $id_cama")) {
            echo '<script> window.location.assign("./camas.php?nav=CA&res=S"); </script>';
        } else {
            echo '<script> window.location.assign("./camas.php?nav=CA&res=err"); </script>';
        }
    } else {
        echo '<script> window.location.assign("./camas.php?nav=CA&res=i"); </script>';
    }
