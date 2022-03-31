<?php 
	require_once "../global.php";
	$matricula_profesor =$_POST["matricula_profesor"]; 
	$nombre_profesor  =$_POST["nombre_profesor"];
	$paterno_profesor = $_POST["paterno_profesor"];
	$materno_profesor = $_POST["materno_profesor"];
	$correo_profesor = $_POST["correo_profesor"];
	$psw_profesor = $_POST["psw_profesor"];
	 

	// CONEXION A LA BASE DE DATOS
	//$conexion  = mysqli_connect("localhost","root","123","estadia");
    $conexion  = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME_BD);
	$consulta = "UPDATE profesores SET  nombre_profesor  = '$nombre_profesor', paterno_profesor = '$paterno_profesor' ,materno_profesor = '$materno_profesor' ,  correo_profesor = '$correo_profesor'
	,psw_profesor = '$psw_profesor'  WHERE matricula_profesor = '$matricula_profesor' ";


	$resultado = mysqli_query($conexion,$consulta);

 


	mysqli_free_result($resultado);
	mysqli_close($conexion);

	
 ?>