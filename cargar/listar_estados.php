<?php
require_once('../conexion/conexion.php');

$consulta = "SELECT id_estado, estado FROM estado ORDER BY 2 ASC";
$abreConsulta = mysqli_query($conexion, $consulta);
$arreglo = array();

while ($resul = mysqli_fetch_array($abreConsulta)) {
    $arreglo[] = $resul;
}

echo json_encode($arreglo);

$abreConsulta->close();
