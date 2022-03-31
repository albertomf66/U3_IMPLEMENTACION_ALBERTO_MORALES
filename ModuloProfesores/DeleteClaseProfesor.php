<?php 
	require_once "../global.php"; 
	$codigoclase = $_POST['CodigoClase'];

	// CONEXION A LA BASE DE DATOS
	//$conexion  = mysqli_connect("localhost","root","123","estadia");
	 $conexion  = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME_BD);
	$consulta = " DELETE  FROM claseprofesor WHERE codigoclase = '$codigoclase' ";
	$resultado = mysqli_query($conexion,$consulta);

	//$filas = mysqli_fetch_row($resultado);

 


	//mysqli_free_result($resultado);
	mysqli_close($conexion);

	 //header("Location: Profesor.php");
	
 ?>