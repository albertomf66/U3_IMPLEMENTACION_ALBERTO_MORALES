<?php 
	require_once "../global.php";
	$control =$_POST["control"]; 
	$matricula_profesor = $_POST["mat"];
	 

	// CONEXION A LA BASE DE DATOS
	//$conexion  = mysqli_connect("localhost","root","123","estadia");
    $conexion  = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME_BD);
	$consulta = "UPDATE profesores SET  foto_profesor  = '$control' WHERE matricula_profesor = '$matricula_profesor' ";


	$resultado = mysqli_query($conexion,$consulta);

 


	mysqli_free_result($resultado);
	mysqli_close($conexion);

	
 ?>