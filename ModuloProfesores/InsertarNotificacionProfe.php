<?php 
	require_once "../global.php"; 
	$Descripcion = $_POST["des"];
	$tipo  =$_POST["tipo"];
	$matricula_profesor = $_POST["UsuarioProfe"];


	// CONEXION A LA BASE DE DATOS
	$conexion  = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME_BD);

	$consulta = " INSERT INTO notificacion_profesor ( tipo, Descripcion, matricula_profesor) VALUES (  
     '$tipo', '$Descripcion', '$matricula_profesor')";
	$resultado = mysqli_query($conexion,$consulta);

	$filas = mysqli_fetch_row($resultado);

 


	mysqli_free_result($resultado);
	mysqli_close($conexion);

	 //header("Location: Profesor.php");
	
 ?>