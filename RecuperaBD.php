<?php
$conn =new mysqli('localhost', 'root', '' , 'estadia');

$fechaActual = date('d-m-Y');
$srcfile='D:\Alber\Descargas\estadia'.$fechaActual.'.sql';
$dstfile='C:\xampp\htdocs\Estadia\BD\estadia'.$fechaActual.'.sql';
mkdir(dirname($dstfile), 0777, true);
copy($srcfile, $dstfile);



$query = '';
$sqlScript = file('estadia_ejemplo.sql');
foreach ($sqlScript as $line)   {
        
        $startWith = substr(trim($line), 0 ,2);
        $endWith = substr(trim($line), -1 ,1);
        
        if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
                continue;
        }
                
        $query = $query . $line;
        if ($endWith == ';') {
                mysqli_query($conn,$query) or die('<div class="error-response sql-import-response">Problem in executing the SQL query <b>' . $query. '</b></div>');
                $query= '';             
        }
}
echo '<div class="success-response sql-import-response">SQL file imported successfully</div>';
//header("Location: Administrador.php");
?>