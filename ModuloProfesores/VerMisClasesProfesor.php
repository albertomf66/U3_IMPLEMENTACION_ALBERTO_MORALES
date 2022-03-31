
<?php
 require_once "../global.php"; 
	
	
	// CONVERTIMOS CADA RESULTADO DE LA CONSULTA EN UN ARRAY 
	// POR LO TANTO CADA REGISTRO DE LA TABLA CLASEPROFESOR SE REPRESENTA COMO UN ARRAY 
	// PARA ACCEDER A SU VALOR ES DE LA SIGUIENTE MANERA 
    // $ResultadoCLase['Clase'] ACCEDEMOS AL ARRAY PRINCIPAL
	// CON $ResultadoCLase['Clase'][INDICE] ACCEDEMOS DIRECTAMENTE A LA CANTIDAD DE ARRAY, SEGUN LA CONSULTA, POR EJEMPLO, SI TENEMOS DOS REGISTROS EL SIZE OF SERA DE (2) 
    // POR ÚLTIMO CON $ResultadoCLase['Clase'][INDICE][INDICE_2] ACCEDEMOS DIRECTAMENTE AL VALOR QUE GUARDA DICHO ARRAY 
    // POR EJEMPLO TENEMOS CODIGOCLASE [0], Descripcion [1], ENTONCES SI QUIERO ACCEDER A LA DESCIPRCIÓN DEBO ACCEDER DE LA SIGUIENTE MANERA 
	
	// ACCEDER A LA DESCRIPCION DEL TERCER REGISTRO DEL ARRAY 
	// $ResultadoCLase['Clase'][2][1]

	
	$ClaseProfesor = [
         'Clase' => []
     ];
    // ASIGNAMOS LA VARIABLE DE SESIÓN QUE CONTIENE LA MATRICULA DEL PROFESOR.
     $matricula = $_SESSION['Usuario'];
	// CONEXION A LA BASE DE DATOS
	$conexion  = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME_BD);
	//CONSULTA PARA SABER QUE CLASES TIENE EL PROFESOR CON X MATRICULA
	$consulta = " Select * from claseprofesor where matricula_profesor = '$matricula' ";
	// REUSLTADO OBTENITO DE LA CONSULTA REALIZADA A LA BASE DE DATOS
	$resultado = mysqli_query($conexion,$consulta);
	// DECLARAMOS EL ARRAY PARA SU POSTERIOR USO 
	$ClaseProfesor = array('Clase' => array());
	// MEDIANTE UN CICLO WHILE COMENZAMOS A GUARDAR LOS DATOS OBTENIDOS
	// EN UN ARRAY INDIVIDUAL PARA SU POSTERIOR UTILIZACIÓN. 
	while ($ResultadoClase=mysqli_fetch_array($resultado))
	{
		array_push($ClaseProfesor['Clase'],
		array($ResultadoClase['codigoclase'],$ResultadoClase['Descripcion'],$ResultadoClase['matricula_profesor'],$ResultadoClase['NombreClase']));
	}
	//$filas = mysqli_fetch_row($resultado);

	

	
 ?>


<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<div class="row ">
				<div class="col-10 text-left centro">
					
						<h2 class="margeninterno">Profesor: <?php echo strtoupper( $_SESSION['Usuario'])  ?></h2>
										
				</div>
			</div>


			<div class="row "> 
				<div class="col-10 text-left centro" style="margin-top: 20px">
						
						<h2 class="margeninterno">Mis Clases  </h2>
						
						<div class="row">

						 <?php 
						 	// RECORREMOS EL ARRAY DONDE GUARDAMOS LA INFORMACION DE LA CONSULTA DE LAS 
							// CLASES QUE TIENE CADA PROFESOR
						 	for ($i=0; $i <(sizeof($ClaseProfesor['Clase'])); $i++) { 
									
						  ?>	
							<div class="col-lg-3"> 
								<div class="card estilos_card" >
									  <div class="card-header">
									    Clase <?php echo ($i +1)." De: ".strtoupper( $_SESSION['Usuario'])  ?>
									  </div>
									  <div class="card-body ">
									  	<h6 class=""> Nombre de Clase: </h6>
									    <h3 class="card-title  " style="font-size: 20px;"> <?php echo $ClaseProfesor['Clase'][$i][3] ?></h3>
									    <h6 class=""> Código de Clase: </h6>
									      <h2 class="card-title text-center"> <?php echo $ClaseProfesor['Clase'][$i][0] ?></h2>
									  	<div class="text-center">
										   <form action="Clase.php" method="POST">
									  		<input hidden="true" type="text" name="name_clase" value="<?php echo $ClaseProfesor['Clase'][$i][3];?>" >

											 <input  hidden="true" type="text" name="cod_clase" value="<?php echo $ClaseProfesor['Clase'][$i][0]; ?>" >

										    <button class="btn  btn-dark" type="submit">
										    	Ver Clase <i class="fas fa-eye"></i>
										    </button>
										</form>
									    </div>
									   
									  </div>
									  
								</div>	
							</div>
							<?php 	} ?>

						</div>	<!-- TERMINA EL ROW  -->
						
						
						
				</div>
			</div>
</body>
</html>