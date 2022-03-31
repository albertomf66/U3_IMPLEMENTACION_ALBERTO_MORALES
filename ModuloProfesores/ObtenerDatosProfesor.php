<?php 
	
	require_once "../global.php"; 
	$_SESSION['Usuario'] = $Usuario;


	// CONEXION A LA BASE DE DATOS
	$conexion  = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME_BD);

	$consulta = " Select nombre_profesor, paterno_profesor,materno_profesor, foto_profesor from profesores where  matricula_profesor = '$Usuario'";
	$resultado = mysqli_query($conexion,$consulta);

	$filas = mysqli_fetch_row($resultado);

 


	mysqli_free_result($resultado);
	mysqli_close($conexion);
	
 ?>