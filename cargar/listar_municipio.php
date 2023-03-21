<?php
require_once('../conexion/conexion.php');

$idestado = $_POST['idestado'];

$consulta = "SELECT * FROM municipio WHERE id_estado = $idestado ORDER BY 2 ASC";
$abreConsulta = mysqli_query($conexion, $consulta);
$arreglo = array();

while ($resul = mysqli_fetch_array($abreConsulta)) {
    $arreglo[] = $resul;
}

echo json_encode($arreglo);
$abreConsulta->close();
