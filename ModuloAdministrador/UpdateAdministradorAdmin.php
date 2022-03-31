<?php 
	require_once "../global.php";
	$matricula_administrador =$_POST["matricula_administrador"]; 
	$nombre_administrador  =$_POST["nombre_administrador"];
	$paterno_administrador = $_POST["paterno_administrador"];
	$materno_administrador = $_POST["materno_administrador"];
	$correo_administrador = $_POST["correo_administrador"];
	$psw_administrador = $_POST["psw_administrador"];


	// CONEXION A LA BASE DE DATOS
	//$conexion  = mysqli_connect("localhost","root","123","estadia");
    $conexion  = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME_BD);
	$consulta = "UPDATE administrador SET  nombre_administrador  = '$nombre_administrador', paterno_administrador = '$paterno_administrador' ,materno_administrador = '$materno_administrador' ,  correo_administrador = '$correo_administrador'
	,psw_administrador = '$psw_administrador'  WHERE matricula_administrador = '$matricula_administrador' ";


	$resultado = mysqli_query($conexion,$consulta);

 


	mysqli_free_result($resultado);
	mysqli_close($conexion);

	
 ?>