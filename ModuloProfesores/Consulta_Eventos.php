<?php 
	
header('Content-Type: application/json');
	require_once "../global.php"; 


	// CONEXION A LA BASE DE DATOS
	$conexion  = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME_BD);

	$consulta = "SELECT idEventosActividad, title , start, color FROM eventosprofesor";
	$resultado = mysqli_query($conexion,$consulta);

	$filas =  mysqli_fetch_row($resultado);

	//$tempora  =intval($filas[0]);
	//var_dump($tempora);

	echo json_encode($filas, JSON_UNESCAPED_UNICODE);

	mysqli_free_result($resultado);
	mysqli_close($conexion);




 

 ?>