<?php 
	header('Content-Type: application/json');
	require_once "../global.php"; 
	$codigoclase = $_POST['CodigoClase'];
	$matricula = $_POST['matricula'];

	// CONEXION A LA BASE DE DATOS
	//$conexion  = mysqli_connect("localhost","root","123","estadia");
	$conexion  = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME_BD);
	$consulta = " SELECT * FROM claseprofesor WHERE  codigoclase = '$codigoclase' ";
	$resultado = mysqli_query($conexion,$consulta);

	$filas = mysqli_num_rows($resultado);

    
    $consultaExistencia = " SELECT * FROM clase_alumno_profesor WHERE  codigoclase = '$codigoclase' AND matricula_alumno = '$matricula' ";

    $resultadoExistencia = mysqli_query($conexion,$consultaExistencia);

	$filasExitencia = mysqli_num_rows($resultadoExistencia);
		 
		if ( $filas != 0  && $filasExitencia == 0){

		
			$datos = array(
			'estado' => 'ok',
			'codigo' => $codigoclase, 
			'fila' => 1,
			);
			
		

		}else{
			$datos = array(
			'estado' => 'No',
			'codigo' => $codigoclase, 
			'fila' => 0,
			);
			
		}
	
			
	
	echo json_encode($datos, JSON_FORCE_OBJECT);




	mysqli_free_result($resultado);
	mysqli_close($conexion);
	
 ?>