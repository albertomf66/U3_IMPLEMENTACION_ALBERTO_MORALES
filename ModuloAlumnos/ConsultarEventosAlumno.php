<?php 
	
	$conexion  = new PDO('mysql:host=localhost;dbname=estadia',"root","");
    $res_gnral = $conexion->query("SELECT idEventosActividad as id,  title,start,color,
      matricula_alumno FROM eventosalumno WHERE matricula_alumno = '$Usuario' AND control != '1'");

    $res_asc = $conexion->query("SELECT idEventosActividad as id,  title,start,color,
    matricula_alumno FROM eventosalumno WHERE matricula_alumno = '$Usuario' AND control != '1' ORDER BY start ASC");

    $res_desc = $conexion->query("SELECT idEventosActividad as id,  title,start,color,
      matricula_alumno FROM eventosalumno WHERE matricula_alumno = '$Usuario' AND control != '1' ORDER BY start DESC");


    $res_import = $conexion->query("SELECT idEventosActividad as id,  title,start,color,
      matricula_alumno,importancia FROM eventosalumno WHERE matricula_alumno = '$Usuario' AND control != '1' ORDER BY start,importancia asc");



  $conexion  = new PDO('mysql:host=localhost;dbname=estadia',"root","");
    $res_gnral_2 = $conexion->query("SELECT idEventosActividad as id,  title,start,color,
      matricula_alumno FROM eventosalumno WHERE matricula_alumno = '$Usuario' AND control != '0'");



    $res_asc_2 = $conexion->query("SELECT idEventosActividad as id,  title,start,color,
    matricula_alumno FROM eventosalumno WHERE matricula_alumno = '$Usuario' AND control != '0' ORDER BY start ASC");

    $res_desc_2 = $conexion->query("SELECT idEventosActividad as id,  title,start,color,
      matricula_alumno FROM eventosalumno WHERE matricula_alumno = '$Usuario' AND control != '0' ORDER BY start DESC");


    $res_import_2 = $conexion->query("SELECT idEventosActividad as id,  title,start,color,
      matricula_alumno,importancia FROM eventosalumno WHERE matricula_alumno = '$Usuario' AND control != '0' ORDER BY start,importancia asc");


    //foreach ($res_gnral as $fila) 
    //{
    //	 echo $fila ["start"];
    //	 echo '<br>';
    //}
   //echo '<br>';

   //foreach ($res_asc as $fila) 
   // {
   /// 	 echo $fila ["start"];
   // 	 echo '<br>';
    //}
//echo '<br>';
   //  foreach ($res_desc as $fila) 
   // {
   // 	 echo $fila ["start"];
    //	 echo '<br>';
  //  }

 ?>