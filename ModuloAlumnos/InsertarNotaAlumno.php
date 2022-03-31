<?php 
	require_once "../global.php"; 
	$nombre =$_POST["NombreNota"]; 
	$Descripcion  =$_POST["Descripcion"];
	$matricula_alumno = $_POST["matricula"];
	$fecha = $_POST["fecha"];


	// CONEXION A LA BASE DE DATOS
	//$conexion  = mysqli_connect("localhost","root","123","estadia");
	 $conexion  = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME_BD);
	$consulta = "INSERT INTO notasalumno (nombre_nota,Fechanota,matricula_alumno,descripcion) VALUES 
	( '$nombre' , '$fecha' , '$matricula_alumno' , '$Descripcion' )";
	$resultado = mysqli_query($conexion,$consulta);

 


	mysqli_free_result($resultado);
	mysqli_close($conexion);

	
 ?>