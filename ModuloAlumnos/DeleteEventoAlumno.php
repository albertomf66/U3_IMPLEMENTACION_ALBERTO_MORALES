<?php 
	require_once "../global.php"; 
	$id = $_POST['Id'];

	// CONEXION A LA BASE DE DATOS
	 $conexion  = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME_BD);
	//$conexion  = mysqli_connect("localhost","root","123","estadia");

	$consulta = " DELETE  FROM eventosalumno WHERE idEventosActividad = '$id' ";
	$resultado = mysqli_query($conexion,$consulta);

	//$filas = mysqli_fetch_row($resultado);

 


	//mysqli_free_result($resultado);
	mysqli_close($conexion);

	 //header("Location: Profesor.php");
	
 ?>