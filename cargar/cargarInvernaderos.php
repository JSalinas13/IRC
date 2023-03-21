<?php
require_once('../conexion/conexion.php');

$id_jefe = $_POST['jefe'];
$consulta = "SELECT * FROM invernadero WHERE id_jefe = $id_jefe";
$abreConsulta = mysqli_query($conexion, $consulta);
$arreglo = array();

while ($resul = mysqli_fetch_array($abreConsulta)) {
    $arreglo[] = $resul;
}

echo json_encode($arreglo);

$abreConsulta->close();
