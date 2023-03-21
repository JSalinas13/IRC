<?php
require_once('../conexion/conexion.php');

$inver = $_POST['inver'];
$consulta = "SELECT id_cama, cama, id_invernadero, concat('id_cama: ',id_cama,';cama: ',cama) as mos FROM cama WHERE id_invernadero = $inver AND cama = 'Disponible';";
$abreConsulta = mysqli_query($conexion, $consulta);
$arreglo = array();

while ($resul = mysqli_fetch_array($abreConsulta)) {
    $arreglo[] = $resul;
}

echo json_encode($arreglo);

$abreConsulta->close();
