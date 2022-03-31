<?php
	require_once "../global.php"; 

	$Idpregunta =$_POST["Idpregunta"];
	$Idrespuesta  =$_POST["Idrespuesta"];
	$IdActividadPregunta = $_POST["IdActividadPregunta"];
	

	// CONEXION A LA BASE DE DATOS
	$conexion  = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME_BD);

	$consulta = "INSERT INTO preguntasactividad ( idActividades  , Pregunta , Respuesta ) VALUES 
	( '$IdActividadPregunta' , '$Idpregunta' , '$Idrespuesta' )";


	$resultado = mysqli_query($conexion,$consulta);

	  


	mysqli_free_result($resultado);
	mysqli_close($conexion);

	
 ?>