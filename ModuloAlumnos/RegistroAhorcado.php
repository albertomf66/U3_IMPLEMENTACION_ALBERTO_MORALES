<?php 
	header('Content-Type: application/json');
	require_once "../global.php"; 

	$idActividad = $_POST['id'];
	$limit  = $_POST['limit'];

	// CONEXION A LA BASE DE DATOS
	$conexion  = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME_BD);

	$consulta = " SELECT * FROM preguntasactividad WHERE idActividades = '$idActividad' LIMIT $limit,1 ";
	$resultado = mysqli_query($conexion,$consulta);

	$filas =  mysqli_fetch_row($resultado);
	$tempora  = 0 ;
	//var_dump($tempora);

		if ( $tempora == 0 )  
		{
			$datos = array(
			'estado' => 'ok',
			'idPreguntasActividad ' => $filas[0] , 
			'Pregunta'=> $filas[2] , 
			'Responde'=> $filas[3],
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