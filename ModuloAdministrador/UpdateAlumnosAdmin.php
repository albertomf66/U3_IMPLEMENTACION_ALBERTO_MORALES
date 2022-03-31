<?php 
	require_once "../global.php";
	$matricula_alumno =$_POST["matricula_alumno"]; 
	$nombre_alumno  =$_POST["nombre_alumno"];
	$paterno_alumno = $_POST["paterno_alumno"];
	$materno_alumno = $_POST["materno_alumno"];
	$correo_alumno = $_POST["correo_alumno"];
	$psw_alumno = $_POST["psw_alumno"];


	// CONEXION A LA BASE DE DATOS
	//$conexion  = mysqli_connect("localhost","root","123","estadia");
     $conexion  = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME_BD);
	$consulta = "UPDATE alumnos SET  nombre_alumno  = '$nombre_alumno', paterno_alumno = '$paterno_alumno' ,materno_alumno = '$materno_alumno' ,  correo_alumno = '$correo_alumno'
	,psw_alumno = '$psw_alumno'  WHERE matricula_alumno = '$matricula_alumno' ";


	$resultado = mysqli_query($conexion,$consulta);

 


	mysqli_free_result($resultado);
	mysqli_close($conexion);

	
 ?>