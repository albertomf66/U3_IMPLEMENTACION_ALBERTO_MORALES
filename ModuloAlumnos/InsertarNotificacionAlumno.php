<?php 
	require_once "../global.php"; 
	$Descripcion = $_POST["des"];
	$tipo  =$_POST["tipo"];
	$matricula_alumno = $_POST["UsuarioProfe"];


	// CONEXION A LA BASE DE DATOS
	$conexion  = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME_BD);

	$consulta = " INSERT INTO notificacion_alumno ( tipo, Descripcion, matricula_alumno) VALUES (  
     '$tipo', '$Descripcion', '$matricula_alumno')";
	$resultado = mysqli_query($conexion,$consulta);

	$filas = mysqli_fetch_row($resultado);

 


	mysqli_free_result($resultado);
	mysqli_close($conexion);

	 //header("Location: Profesor.php");
	
 ?>