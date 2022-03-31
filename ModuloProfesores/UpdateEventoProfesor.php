<?php 
	require_once "../global.php"; 
	$nombreevento = $_POST["nombreevento"];
	$Fecha  =$_POST["Fecha"];
	$Mat_Profe = $_POST["Mat_Profe"];
	$Color = $_POST["Color"];
	$importancia = $_POST["importancia"];
	$id = $_POST["Id"];
		$control = $_POST["control"];
	// CONEXION A LA BASE DE DATOS
	$conexion  = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME_BD);

	$consulta = " UPDATE eventosprofesor  SET title = '$nombreevento', start= '$Fecha',importancia = '$importancia', color = '$Color' WHERE idEventosActividad = '$id '  ";
	$resultado = mysqli_query($conexion,$consulta);

	$filas = mysqli_fetch_row($resultado);

 


	mysqli_free_result($resultado);
	mysqli_close($conexion);

	 //header("Location: Profesor.php");
	
 ?>