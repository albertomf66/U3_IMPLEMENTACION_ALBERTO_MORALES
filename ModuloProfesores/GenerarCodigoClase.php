<?php 
	require_once "../global.php"; 	
   return  $codigo = buscarcodigo();
		


	function buscarcodigo()
	{
		 $codigoclase = "";
	    //caracteres a ser utilizados
	    $seleccion="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	    //el maximo de caracteres a usar
	    $max=strlen($seleccion)-1;
	    //creamos un for para generar el codigo aleatorio utilizando parametros min y max
	    for($i=0;$i < 6;$i++)
	    {
	        $codigoclase.=$seleccion[rand(0,$max)];
	    }


	    // SE REALIZA LA CONEXIÓN A  LA BASE DE DATOS 
	     $conexion  = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME_BD);
	     // $conexion  = mysqli_connect("localhost","root","123","estadia");

	    // LA CONSULTA BUSCA SI HAY ALGUNA COINCIDENCIA ENTRE CODIGOS DE CLASE REGISTRADOS 
		$consulta = " Select codigoclase from claseprofesor where  codigoclase = '$codigoclase' ";
		// LA CONSULTA SE IMPLEMENTA MEDIANTE LA CONEXIÓN CON RELACIÓN A LA CONSULTA GENERADA. 
		$resultado = mysqli_query($conexion,$consulta);

		// EL RESULTADO GENERADO SE GUARDA DENTRO DE LA VARIABLE FILAS 
		$filas = mysqli_fetch_row($resultado);

		// SI EL RESULTADO GUARDADO EN FILAS, ES MAYOR A CERO, SIGNIFICA QUE SE ENCONTRO UNA COINCIDENCIA DENTRO DE LOS REGISTROS DE LA BASE DE DATOS, POR LO TANTO VOLVERA A LLAMARSE A LA FUNCIÓN buscarcodigo() , PARA NUEVAMENTE GENERAR LA BUSQUEDA 
	 	if ($filas>0) {
	 		buscarcodigo();
	 	}else{ 

	 		// SI ES CORRECTO SE RETORNA EL NUEVO CODIGO DE CLASE GENERADO.
	 		 return $codigoclase;
	 	}  

	}

   

  
	mysqli_free_result($resultado);
	mysqli_close($conexion);




   





 ?>