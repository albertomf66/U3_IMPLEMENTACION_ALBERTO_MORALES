<?php 
	require_once "../global.php"; 
	$codigoclase = $_POST["CodigoClase"];
	$Descripcion  =$_POST["Descripcion"];
	$matricula_profesor = $_POST["UsuarioProfe"];
	$NombreClase = $_POST["NombreClase"];

	if ( $Descripcion == "" ){
		$Descripcion  = "Sin Descripcion";
	}

	// CONEXION A LA BASE DE DATOS
	$conexion  = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME_BD);

	$consulta = " INSERT INTO claseprofesor ( codigoclase, Descripcion, matricula_profesor, NombreClase) VALUES (  
     '$codigoclase', '$Descripcion', '$matricula_profesor', '$NombreClase'   )";
	$resultado = mysqli_query($conexion,$consulta);

	$filas = mysqli_fetch_row($resultado);

 


	mysqli_free_result($resultado);
	mysqli_close($conexion);

	 //header("Location: Profesor.php");
	
 ?>