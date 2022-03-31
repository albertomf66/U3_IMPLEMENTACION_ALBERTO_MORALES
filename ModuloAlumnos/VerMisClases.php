
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

	// ARRAY QUE GUARDARA DENTRO DE SI CADA UNA DE LOS DATOS EXTRAIDOS DE LA TABLA MEDIANTE LA CONSULTA 
	$ClasesAlumno = [
         'Clase' => []
     ];
    // ASIGNACIÓN DE VARUABLE DE SESIÓN PARA CONOCER LA MATRICULA DEL PROFESOR 
     $matricula = $_SESSION['Usuario'];
	// CONEXION A LA BASE DE DATOS
	//$conexion  = mysqli_connect("localhost","root","123","estadia");
	$conexion  = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME_BD);
	// CONSULTA REALIZADA A LA BASE DE DATOS PARA SABER 
	$consulta = " Select * from clase_alumno_profesor where matricula_alumno = '$matricula' ";
	// SE GUARDA EL RESULTADO OBTENIDO DE LA VARIABLE
	$resultado = mysqli_query($conexion,$consulta);

	$ClasesAlumno = array('Clase' => array());
	// MEDIANTE UN CICLO GUARDAREMOS CADA UNO DE LOS DATOS EN UN ARRAY 
	while ($ResultadoClase=mysqli_fetch_array($resultado))
	{
		array_push($ClasesAlumno['Clase'],
		array($ResultadoClase['matricula_alumno'],$ResultadoClase['codigoclase']));
	}
	//$filas = mysqli_fetch_row($resultado);

	$ClaseProfesor = [
         'Clase' => []
     ];


	$consulta2 = " Select codigoclase, NombreClase from claseprofesor ";
	$resultado2 = mysqli_query($conexion,$consulta2);


	$ClaseProfesor = array('Clase' => array());
	while ($ResultadoClase=mysqli_fetch_array($resultado2))
	{
		array_push($ClaseProfesor['Clase'],
		array($ResultadoClase['codigoclase'],$ResultadoClase['NombreClase']));
	}

	
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
					
						<h2 class="margeninterno">Usuario de Alumno: <?php echo strtoupper( $_SESSION['Usuario'])  ?></h2>
										
				</div>
			</div>


			<div class="row "> 
				<div class="col-10 text-left centro" style="margin-top: 20px">
						
						<h2 class="margeninterno">Mis Clases  </h2>
						<div class="row">

						 <?php 
						 	// RECORREMOS EL ARRAY DONDE GUARDAMOS LA INFORMACION DE LA CONSULTA DE LAS 
							// CLASES QUE TIENE CADA PROFESOR
						 	for ($i=0; $i <(sizeof($ClasesAlumno['Clase'])); $i++) { 
								
				
						  ?>	
							<div class="col-lg-3"> 
								<div class="card estilos_card" >
									  <div class="card-header">
									    Clase <?php echo ($i +1)." De: ".strtoupper( $_SESSION['Usuario'])  ?>
									  </div>
									  <div class="card-body ">
									  	<h6 class=""> Nombre de Clase: </h6>
									    <h3 class="card-title  " style="font-size: 20px;"> 

									    <?php 

								   for ($c=0; $c <(sizeof($ClaseProfesor['Clase'])); $c++) 
								   {
									  if ($ClaseProfesor['Clase'][$c][0] ==  $ClasesAlumno['Clase'][$i][1])
									   {
									   	echo $ClaseProfesor['Clase'][$c][1];
								   	   }
								   }
								

									   	 ?>
 										

									     </h3>
									    <h6 class=""> Código de Clase: </h6>
									      <h2 class="card-title text-center"> <?php echo $ClasesAlumno['Clase'][$i][1] ?></h2>
									  	<div class="text-center">
									      <form action="Clase.php" method="POST">

									      <?php 

										   for ($c=0; $c <(sizeof($ClaseProfesor['Clase'])); $c++) 
										   {
											  if ($ClaseProfesor['Clase'][$c][0] ==  $ClasesAlumno['Clase'][$i][1])
											   {
											   	?>

									  		<input type="text"  hidden="true" name="name_clase" value="<?php echo $ClaseProfesor['Clase'][$c][1];?>" id = "NombreTomado">
									  		<?php 
										   	   }
										   }
								

									   	 ?>
 										



											 <input  hidden="true" type="text" name="cod_clase" value="<?php echo $ClasesAlumno['Clase'][$i][1]; ?>" >

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