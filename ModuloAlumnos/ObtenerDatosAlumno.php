<?php 
	 require_once "../global.php"; 

	
	$_SESSION['Usuario'] = $Usuario;
	 
	// CONEXION A LA BASE DE DATOS
	//$conexion  = mysqli_connect("localhost","root","123","estadia");
	 $conexion  = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME_BD);
	$consulta = " Select nombre_alumno, paterno_alumno,materno_alumno, foto_alumno from alumnos where  matricula_alumno = '$Usuario'";
	$resultado = mysqli_query($conexion,$consulta);

	$filas = mysqli_fetch_row($resultado);

 


	mysqli_free_result($resultado);
	//mysqli_close($conexion);
	
 ?>