<?php
session_start();
if (isset($_REQUEST['mandar'])) {
   require_once 'conexion.php';


   $email = $_POST['email'];

   $pass = $_POST['password'];

   // Creamos la consulta para verificar los datos
   $clave = md5($pass); // encriptamos la contra

   $co = "SELECT * FROM usuario WHERE usuario='$email' AND contrasena='$clave'"; ///se realiza la consulta 
   if ($r = mysqli_query($conexion, $co)) { // se ejecuta 
      //si esta todo bien redirecciona al panel
      //header('Location: ../Panel.php');
      $columna = mysqli_fetch_assoc($r);

      if ($columna['usuario'] == $email && $columna['contrasena'] == $clave) {
         $_SESSION['user'] = $columna['usuario'];

         $_SESSION['nombre'] = $columna['usuario'];
         $_SESSION['correo'] = $columna['correo'];
         $_SESSION['id_user'] = $columna['id_usuario'];
         //buscar en las tablas
         $temp = $_SESSION['id_user'];

         $bucaJ = "SELECT * FROM jefe WHERE id_usuario=$temp";
         $abre = mysqli_query($conexion, $bucaJ);
         //busca en empleado
         $bucaE = "SELECT * FROM empleado WHERE id_usuario=$temp";
         $abreE = mysqli_query($conexion, $bucaE);
         if ($cop = mysqli_fetch_assoc($abre)) {
            $_SESSION['pri'] = "JEFE";
            $_SESSION['id'] = $cop['id_jefe'];
            $id_jefe = $cop['id_jefe'];

            // GENERA CAMAS
            $consulta = "SELECT * FROM invernadero WHERE id_jefe = $id_jefe";
            $abrea = mysqli_query($conexion, $consulta);
            while ($invernaderos = mysqli_fetch_array($abrea)) {
               echo $invernaderos[0];
               $con2 = "SELECT count(id_cama) as cant FROM cama WHERE id_invernadero = $invernaderos[0]";
               if ($abrec = mysqli_query($conexion, $con2)) {
                  $res = mysqli_fetch_row($abrec);
                  print_r($res);
                  if ($res[0] == 0) {
                     for ($i = 0; $i < $invernaderos[2]; $i++) {
                        $con3  = "SELECT crearCama($invernaderos[0])";
                        if ($abrecre = mysqli_query($conexion, $con3)) {
                           $crea = mysqli_fetch_row($abrecre);
                           echo 'CAMA CREADA';
                        }
                     }
                  } else {
                     // echo 'NO2';
                  }
               } else {
                  echo 'NO';
               }
               // FIN CREA CAMA
            }
         } elseif ($cop = mysqli_fetch_assoc($abreE)) {
            $_SESSION['pri'] = "EMPLEADO";
            $_SESSION['id'] = $cop['id_empleado'];
            $id_jefe = $cop['id_jefe'];

            // GENERA CAMAS
            $consulta = "SELECT * FROM invernadero WHERE id_jefe = $id_jefe";
            $abrea = mysqli_query($conexion, $consulta);
            while ($invernaderos = mysqli_fetch_array($abrea)) {
               echo $invernaderos[0];
               $con2 = "SELECT count(id_cama) as cant FROM cama WHERE id_invernadero = $invernaderos[0]";
               if ($abrec = mysqli_query($conexion, $con2)) {
                  $res = mysqli_fetch_row($abrec);
                  print_r($res);
                  if ($res[0] == 0) {
                     for ($i = 0; $i < $invernaderos[2]; $i++) {
                        $con3  = "SELECT crearCama($invernaderos[0])";
                        if ($abrecre = mysqli_query($conexion, $con3)) {
                           $crea = mysqli_fetch_row($abrecre);
                           echo 'CAMA CREADA';
                        }
                     }
                  } else {
                     // echo 'NO2';
                  }
               } else {
                  echo 'NO';
               }
               // FIN CREA CAMA
            }
         }

?>

         <!-- QUITAR COMENTARIOS -->
         <script>
            window.location.assign("../datosCliente.php?nav=dC")
         </script>

      <?php

         //header('Location: ../menu/menu.php?N=M');
      } else {

      ?>
         <!-- QUITAR COMENTARIOS -->

         <script>
            window.location.assign("../index.php?E=Err")
         </script>

<?php
         //header('Location: ../index.php?E=Err');
      }
   }
}
