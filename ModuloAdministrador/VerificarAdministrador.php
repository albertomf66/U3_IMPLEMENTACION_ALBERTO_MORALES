<?php 
	header('Content-Type: application/json');
	require_once "../global.php"; 

	$matricula = $_POST['matricula'];

	// CONEXION A LA BASE DE DATOS
	//$conexion  = mysqli_connect("localhost","root","123","estadia");
    $conexion  = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME_BD);
	$consulta = " SELECT * FROM administrador WHERE  matricula_administrador = '$matricula' ";
	$resultado = mysqli_query($conexion,$consulta);

	$filas = mysqli_num_rows($resultado);

		 
		if ( $filas != 0 ){

		
			$datos = array(
			'estado' => 'ok',
			'fila' => 1,
			);
			
		

		}else{
			$datos = array(
			'estado' => 'No',
			'fila' => 0,
			);
			
		}
	
			
	
	echo json_encode($datos, JSON_FORCE_OBJECT);

	mysqli_free_result($resultado);
	mysqli_close($conexion);
	
 ?>