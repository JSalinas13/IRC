<?php
$usuario = "root";
$password = "";
$servidor = "localhost";
$basededatos = "id20209243_sembradiodos";


// $usuario = "id20209243_adminsem";
// $password = "Qh6I!x@V0coCN~fp";
// $servidor = "localhost";
// $basededatos = "id20209243_sembradiodos";

$conexion = mysqli_connect($servidor, $usuario, $password) or die("No se ha podido conectar al servidor de Base de datos");
$db = mysqli_select_db($conexion, $basededatos) or die("Upps! Pues va a ser que no se ha podido conectar a la base de datos");
