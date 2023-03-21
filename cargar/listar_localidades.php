<?php
require_once('../conexion/conexion.php');

$idmunicipio = $_POST['idmunicipio'];

$consulta = "SELECT * FROM localidad WHERE id_municipio = $idmunicipio ORDER BY 2 ASC";
$abreConsulta = mysqli_query($conexion, $consulta);
$arreglo = array();

while ($resul = mysqli_fetch_array($abreConsulta)) {
    $arreglo[] = $resul;
}

echo json_encode($arreglo);
$abreConsulta->close();
