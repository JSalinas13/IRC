<?php
class Metodos
{
    public function generarCamas(int $numCamas, int $id_invernadero)
    {
        require_once("../conexion/conexion.php");
        $consulta = "SELECT count(id_cama) AS camas_creadas FROM cama where id_invernadero = $id_invernadero";
        $abreConsulta = mysqli_query($conexion, $consulta);
        $columna = mysqli_fetch_row($abreConsulta);
        echo 'CAMAS CREADAS: ' . $columna['camas_creadas'];
    }
}
