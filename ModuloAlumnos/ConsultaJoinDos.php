<?php 
	header('Content-Type: application/json');
	require_once "../global.php"; 

	$clase = $_POST['clase'];

	// CONEXION A LA BASE DE DATOS
	$conexion  = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME_BD);

	$consulta = " SELECT COUNT(*) FROM actividadclaseprofesor WHERE codigoclase = '$clase' ";
	$resultado = mysqli_query($conexion,$consulta);

	$filas =  mysqli_fetch_row($resultado);
	$tempora  = 0 ;
	//var_dump($tempora);

		if ( $tempora == 0 )  
		{
			$datos = array(
			'estado' => 'ok',
			'cant' => $filas[0] , 
	
			);
	
		}else
		{
			$datos = array(
			'estado' => 'no',
			'fila' => "0", 
			);
		}

	
	
	echo json_encode($datos, JSON_FORCE_OBJECT);

	mysqli_free_result($resultado);
	mysqli_close($conexion);
	
 ?>