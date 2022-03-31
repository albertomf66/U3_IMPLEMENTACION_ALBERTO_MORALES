<?php 
	
	require_once "../global.php";
	$_SESSION['Usuario'] = $Usuario;


	// CONEXION A LA BASE DE DATOS
	//$conexion  = mysqli_connect("localhost","root","123","estadia");
    $conexion  = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME_BD);
	$consulta = " Select nombre_administrador, paterno_administrador,materno_administrador, foto_administrador from administrador where  matricula_administrador = '$Usuario'";
	$resultado = mysqli_query($conexion,$consulta);

	$filas = mysqli_fetch_row($resultado);





	mysqli_free_result($resultado);
	mysqli_close($conexion);
	
 ?>