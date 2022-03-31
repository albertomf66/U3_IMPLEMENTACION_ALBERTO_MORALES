
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


	$NotasAlumno = [
         'notas' => []
     ];

     $matricula = $_SESSION['Usuario'];
	// CONEXION A LA BASE DE DATOS
	//$conexion  = mysqli_connect("localhost","root","123","estadia");
    $conexion  = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME_BD);
	$consulta = " Select * from notasalumno where matricula_alumno = '$matricula' ";
	$resultado = mysqli_query($conexion,$consulta);


	$NotasAlumno = array('notas' => array());
	while ($ResultadoNotas=mysqli_fetch_array($resultado))
	{
		array_push($NotasAlumno['notas'],
		array($ResultadoNotas['idNotasAlumno'],$ResultadoNotas['nombre_nota'],$ResultadoNotas['Fechanota'],$ResultadoNotas['matricula_alumno'],$ResultadoNotas['descripcion']));
	}
	//$filas = mysqli_fetch_row($resultado);
	$tamano = sizeof($NotasAlumno['notas']);
	

	
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
					
						<h2 class="margeninterno">Alumno: <?php echo strtoupper( $_SESSION['Usuario'])  ?></h2>
										
				</div>
			</div>


			<div class="row "> 
				<div class="col-10 text-left centro" style="margin-top: 20px">
						
						<h2 class="margeninterno">  Ver Mis Notas</h2>
						<?php if ( $tamano == 0 ){

							?>
						

						<div class="row" >
							<div class="col-lg-12" style=" margin-left: 20px; margin-bottom: 30px;">
									<label>Nueva Nota</label>
									<button type="button" class="btn btn-primary"><i class="fas fa-folder-plus" onclick="PrimerNota()"> </i></button>
					
							</div>
						
							<div class="col-lg-5 OcultarElemento" id="PrimerNotaRow"> 
								<div class="card  estilos_card" >
									  <div class="card-header">
									   	 Agregar Primer Nota
									  </div>
									  <div class="card-body">
									   	
									   	<div class="form-floating mb-3">
										  <input type="text" class="form-control" id="NombreNota" name ="NombreNota" placeholder="Apuntes Lógica" required>
										  <label for="NombreNota">Nombre de tu Nota</label>
										</div>
																			   
									    <div class="form-floating">

										<textarea class="form-control" placeholder="Leave a comment here" id="DescripcionNota" name="DescripcionNota" style="height: 100px; resize: none;"></textarea>
										<label for="DescripcionNota" required >Descripcion</label>
										</div>
																			 
									  </div>
									  <div class="card-footer text-muted">
									    <button type="button" class="btn btn-success" onclick="CrearNota('<?php echo $_SESSION['Usuario'] ?>')">Crear Nota</button>
									  </div>
								</div>
							</div>
						</div>	

						<?php }else{ ?>

								<div class="row">

								<div class="col-lg-12" style=" margin-left: 20px; margin-bottom: 30px;">
									<label>Nueva Nota</label>
									<button type="button" class="btn btn-primary"><i class="fas fa-folder-plus"  onclick="NuevaNote()"> </i></button>
							   </div>	

							   <div class="col-lg-4 OcultarElemento" id="NuevaNote"> 
								<div class="card  estilos_card" >
									  <div class="card-header">
									   	 Agregar Nota
									  </div>
									  <div class="card-body">
									   	
									   	<div class="form-floating mb-3">
										  <input type="text" class="form-control" id="NombreNotaNueva" name ="NombreNotaNueva" placeholder="Apuntes Lógica" required>
										  <label for="NombreNota">Nombre de tu Nota</label>
										</div>
																			   
									    <div class="form-floating">

										<textarea class="form-control" placeholder="Leave a comment here" id="DescripcionNotaNueva" name="DescripcionNotaNueva" style="height: 100px; resize: none;"></textarea>
										<label for="DescripcionNota" required >Descripcion</label>
										</div>
																			 
									  </div>
									  <div class="card-footer text-muted">
									    <button type="button" class="btn btn-success" onclick="CrearNota2('<?php echo $_SESSION['Usuario'] ?>')">Crear Nota</button>
									  </div>
								</div>
							</div>

						 <?php 
						 	// RECORREMOS EL ARRAY DONDE GUARDAMOS LA INFORMACION DE LA CONSULTA DE LAS 
							// CLASES QUE TIENE CADA PROFESOR
						 	for ($i=0; $i <(sizeof($NotasAlumno['notas'])); $i++) { 
								
								
							
						  ?>

						  	<div class="col-lg-4 "> 
								<div class="card  estilos_card" >
									  <div class="card-header">
									   	 Nota <?php echo$i+1 ?>
									  </div>
									  <div class="card-body">
									   	
									   	<div class="form-floating mb-3">
										  <input type="text" class="form-control" id="NombreNota<?php echo$i ?>" name ="NombreNota<?php echo$i ?>" placeholder="Apuntes Lógica" disabled>
										  <label for="NombreNota"><?php echo $NotasAlumno['notas'][$i][1] ?></label>
										</div>
																			   
									    <div class="form-floating">

										<textarea class="form-control" placeholder="Leave a comment here" id="DescripcionNota<?php echo$i ?>" name="DescripcionNota<?php echo$i ?>" style="height: 100px; resize: none;" disabled></textarea>
										<label for="DescripcionNota"  >
											<?php echo $NotasAlumno['notas'][$i][4] ?>
										</label>
										</div>

									  </div>
					<div class="card-footer text-muted">
							<div class="row">  
							  <div class="col-lg-2">
							    	<button type="button" class="btn btn-warning"         
								  	 onclick="EditarNota('<?php echo$i?>' )"><i class="fas fa-edit"></i></button>
							  </div>


							   <div class="col-lg-6">
							  	<button type="button" class="btn btn-warning OcultarElemento"  id="AplicarEdit<?php echo$i ?>"
									  	 onclick="AplicarEdicionNotas('<?php echo $NotasAlumno['notas'][$i][0]; ?>','<?php echo$i ?>' )">Aplicar Edición</button>
							  </div>



							   <div class="col-lg-2">  						
									    <button type="button" class="btn btn-danger" 
	  									onclick="EliminarNota( '<?php echo $NotasAlumno['notas'][$i][0]; ?>' )">
									    <i class="fas fa-trash"></i></button>
							  </div>
									 

			

							</div> 		    	
					</div>
								</div>
							</div>




						<?php } ?>
								
							<?php } ?>
								</div>
						
				</div>
			</div>
</body>
</html>