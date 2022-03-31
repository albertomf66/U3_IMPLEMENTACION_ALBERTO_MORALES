<?php 
	
	require_once "../global.php"; 
	$_SESSION['Usuario'] = $Usuario;


	// CONEXION A LA BASE DE DATOS
	$conexion2  = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME_BD);

	$consulta2 = " Select seleccion_color ,frase_alumno from perfil_alumno where  matricula_alumno = '$Usuario'";
	$resultado2 = mysqli_query($conexion,$consulta2);

	$filas_perfil = mysqli_fetch_row($resultado2);

 


	mysqli_free_result($resultado2);
	mysqli_close($conexion2);
	
 ?>