<?php 

	require_once "./global.php"; 
	$codigoregistro = $_POST['idcodigo'];	
	
	

	$consulta = " SELECT * FROM codigoregistro WHERE  cod_reg = '$codigoregistro' ";
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