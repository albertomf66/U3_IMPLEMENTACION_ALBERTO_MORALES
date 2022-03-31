
  <?php
// db config
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "estadia";
// db connect
$pdo = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
// file header stuff
$output = "-- PHP MySQL Dump\n--\n";
$output .= "-- Host: $dbhost\n";
$output .= "-- Generated: " . date("r", time()) . "\n";
$output .= "-- PHP Version: " . phpversion() . "\n\n";
$output .= "SET SQL_MODE=\"NO_AUTO_VALUE_ON_ZERO\";\n\n";
$output .= "START TRANSACTION;\n\n";
//$output .= "SET time_zone = "+00:00"\";\n\n";
$output .= "--\n-- Database: `$dbname`\n--\n";
// get all table names in db and stuff them into an array
$tables = array();
$stmt = $pdo->query("SHOW TABLES");
while($row = $stmt->fetch(PDO::FETCH_NUM)){
$tables[] = $row[0];
}


$tablaordenada = array();
$tablaordenada[] = "";

 $cont = 7; 
//echo $tables;
//var_dump($tables[0]);
for ($i=0; $i < 18 ; $i++) {
 
  if ( $tables[$i] == "actividades")
  {
     $tablaordenada[0] = $tables[$i];
  }else if ( $tables[$i] == "alumnos")
  {
     $tablaordenada[1] = $tables[$i];
  } else if ( $tables[$i] == "profesores")
  {
     $tablaordenada[2] = $tables[$i];
  }else  if ( $tables[$i] == "claseprofesor")
  {
     $tablaordenada[3] = $tables[$i];
  }else if ( $tables[$i] == "actividadclaseprofesor")
  {
     $tablaordenada[4] = $tables[$i];
  }else if ( $tables[$i] == "clase_alumno_profesor")
  {
     $tablaordenada[5] = $tables[$i];
  }else  if ( $tables[$i] == "actividadentregar")
  {
     $tablaordenada[6] = $tables[$i];
  }else {
      $tablaordenada[$cont] = $tables[$i];
      $cont = $cont +1;

      //echo "\n".$tables[$i];
  }




}

//for ($i=0; $i < 18 ; $i++) { 
//   echo  "\n".$tablaordenada[$i];
//}


for ($i=0; $i < 18 ; $i++) { 
    $fields = "";
    $sep2 = "";
    $output .= "\n-- " . str_repeat("-", 60) . "\n\n";
    $output .= "--\n-- Table structure for table `$tablaordenada[$i]`\n--\n\n";
    // get table create info
    $stmt = $pdo->query("SHOW CREATE TABLE $tablaordenada[$i]");
    $row = $stmt->fetch(PDO::FETCH_NUM);
    $output.= $row[1].";\n\n";
    // get table data
    $output .= "--\n-- Dumping data for table `$tablaordenada[$i]`\n--\n\n";
    $stmt = $pdo->query("SELECT * FROM $tablaordenada[$i]");
    while($row = $stmt->fetch(PDO::FETCH_OBJ)){
    // runs once per table - create the INSERT INTO clause
    if($fields == ""){
    $fields = "INSERT INTO `$tablaordenada[$i]` (";
    $sep = "";
    // grab each field name
    foreach($row as $col => $val){
    $fields .= $sep . "`$col`";
    $sep = ", ";
    }
    $fields .= ") VALUES";
    $output .= $fields . "\n";
    }
    // grab table data
    $sep = "";
    $output .= $sep2 . "(";
    foreach($row as $col => $val){
    // add slashes to field content
    $val = addslashes($val);
    // replace stuff that needs replacing
    $search = array("\'", "\n", "\r");
    $replace = array("''", "\\n", "\\r");
    $val = str_replace($search, $replace, $val);
    $output .= $sep . "'$val'";
    $sep = ", ";
    }
    // terminate row data
    $output .= ")";
    $sep2 = ",\n";
    }
    // terminate insert data
    $output .= ";\n";
}
$output .= "');\n";
 $fechaActual = date('d-m-Y');
header('Content-Description: File Transfer');
header('Content-type: application/octet-stream');
header('Content-Disposition: attachment; filename=' . $dbname .$fechaActual. '.sql');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . strlen($output));
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Expires: 0');
header('Pragma: public');
echo $output;

?>

