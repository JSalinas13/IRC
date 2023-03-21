<?php
if (isset($_GET['cate']) && isset($_GET['cultivo'])) {
  $DB_TBLName = "";
  $nombre_Archivo = "";
  $id_c = $_GET['cultivo'];
  if ($_GET['cate'] == 't') {
    $DB_TBLName = "bitacoratemp";
    $nombre_Archivo = "temperatura";
  } else if ($_GET['cate'] == 'h') {
    $DB_TBLName = "bitacorahum";
    $nombre_Archivo = "humedad";
  } elseif ($_GET['cate'] == 'pt') {
    $DB_TBLName = "bitacoraphtierra";
    $nombre_Archivo = "phtierra";
  } elseif ($_GET['cate'] == "pa") {
    $DB_TBLName = "bitacoraphagua";
    $nombre_Archivo = "phagua";
  }

  // $usuario = "id20209243_adminsem";
  // $password = "Qh6I!x@V0coCN~fp";
  // $servidor = "localhost";
  // $basededatos = "id20209243_sembradiodos";

  $xls_filename = 'reporte_' . date('Y-m-d') . $nombre_Archivo . '.csv';

  //$conn = new mysqli("localhost", "id20209243_irc", "<xHYGw1V1j$0zDS1", "id20209243_sembradio");
  // $conn = new mysqli("localhost", "id20209243_adminsem", "Qh6I!x@V0coCN~fp", "id20209243_sembradiodos");
  $conn = new mysqli("localhost", "root", "", "id20209243_sembradio");
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "Select fechahora, $nombre_Archivo from $DB_TBLName where id_cama='$id_c'";
  $conn->query("SET NAMES 'utf8'");
  $data = array();
  $result = $conn->query($sql);
  $fields_Name = [];
  if ($result) {
    $finfo = $result->fetch_fields();
    foreach ($finfo as $val) {

      array_push($fields_Name, $val->name);
    }
  }


  header("Content-Type: application/xls");
  header("Content-Disposition: attachment; filename=$xls_filename");
  header("Pragma: no-cache");
  header("Expires: 0");

  echo chr(0xEF) . chr(0xBB) . chr(0xBF);

  $sep = ",";


  foreach ($fields_Name as $value) {
    echo $value .  $sep;
  }
  print("\n");


  while ($row = $result->fetch_assoc()) {
    $schema_insert = "";
    foreach ($fields_Name as $value) {
      if (!isset($row[$value])) {
        $schema_insert .= "NULL" . $sep;
      } elseif ($row[$value] != "") {
        $field_value = $row[$value];
        $field_value = str_replace($sep, "", $field_value);
        $schema_insert .= $field_value . $sep;
      } else {
        $schema_insert .= "" . $sep;
      }
    }
    $schema_insert = str_replace($sep . "$", "", $schema_insert);
    $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
    $schema_insert .= $sep;
    print(trim($schema_insert));
    print "\n";
  }
  $conn->close();
}
