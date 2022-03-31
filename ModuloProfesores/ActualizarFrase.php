<?php 
	require_once "../global.php";
	$frase =$_POST["frase"]; 
	$matricula_profesor = $_POST["mat"];
	 

	// CONEXION A LA BASE DE DATOS
	//$conexion  = mysqli_connect("localhost","root","123","estadia");
    $conexion  = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME_BD);
	$consulta = "UPDATE perfil_profesor SET  frase_profesor  = '$frase' WHERE matricula_profesor = '$matricula_profesor' ";


	$resultado = mysqli_query($conexion,$consulta);

 


	mysqli_free_result($resultado);
	mysqli_close($conexion);

	
 ?>