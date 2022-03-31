<?php 
	require_once "../global.php"; 
	$nomact =$_POST["nomact"]; 
	$descAct  =$_POST["descAct"];
	$tipoEv  = $_POST["tipoEv"];
	$dateEnt  =$_POST["dateEnt"];
	$timeEnt  = $_POST["timeEnt"];
	$id  = $_POST["id"];
	
	// CONEXION A LA BASE DE DATOS
	$conexion  = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME_BD);

	$consulta = " UPDATE actividades  SET nombre_actividad = '$nomact', descripcion_actividad = '$descAct'  , tipo_evidencia = '$tipoEv' , FechaEntrega = '$dateEnt' , HoraEntrega = '$timeEnt'  WHERE idActividades  = '$id'  ";
	$resultado = mysqli_query($conexion,$consulta);

	$filas = mysqli_fetch_row($resultado);

 


	mysqli_free_result($resultado);
	mysqli_close($conexion);

	 //header("Location: Profesor.php");
	
 ?>