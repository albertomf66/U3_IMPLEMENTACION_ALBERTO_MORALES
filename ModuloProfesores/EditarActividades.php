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
		array($ResultadoClase['codigoclase']));
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
						
						<h2 class="margeninterno">Mis Actividades  </h2>
					
						<div class="row">
							 <?php 
						 	// RECORREMOS EL ARRAY DONDE GUARDAMOS LA INFORMACION DE LA CONSULTA DE LAS 
							// CLASES QUE TIENE CADA PROFESOR
						 	for ($i=0; $i <(sizeof($ClaseProfesor['Clase'])); $i++) { 


						 	$temp = $ClaseProfesor['Clase'][$i][0];
						   $conexion2  = new PDO('mysql:host=localhost;dbname=estadia',"root","");

    					   $res_idact = $conexion2->query("SELECT idActividadClaseProfesor,idActividades  from actividadclaseprofesor WHERE codigoclase = '$temp' ");


						


						  

						  	?>	



						  	<div class="col-12">
						  		
									  <div class="card-header">
									    Clase <?php echo $ClaseProfesor['Clase'][$i][0] ?>
									  </div>
									  <div class="card-body ">
									    <h2 class="card-title text-center"> </h2>
									  	<?php 
									  	 foreach ($res_idact as $fila) 
										    {

										      $temp2 = $fila ["idActividades"];	
										      
    					   					  $res_act = $conexion2->query("SELECT idActividades, nombre_actividad,descripcion_actividad,tipo_evidencia,FechaEntrega,HoraEntrega from actividades WHERE idActividades  = '$temp2' ");

										       foreach ($res_act as $fila2) 
										    	{
										    		//echo $fila2 ["nombre_actividad"];
										    		//echo '<br>';
										    		 ?>
									   			<div class="row">
									   				<div class="col-lg-12"> 
														<div class="card estilos_card" >
															<div class="card-header">
															     <?php echo $fila2["nombre_actividad"]; ?>
															     <input type="text"  value="<?php echo $fila2["idActividades"]; ?>" hidden = "true" name= "idacthide" id= "idacthide">
															</div>
															<div class="card-body ">
															  	<div class="row">

															  		<div class="col-lg-6">
															  		   <div class="form-floating mb-3">
																          <input type="text" class="form-control" id="nomact<?php echo$i ?>" name ="nomact<?php echo$i ?>"  value="<?php echo $fila2["nombre_actividad"]; ?>"
																          >
																          <label for="nomact">
																         	Nombre de Actividad: 
																          </label>
																	   </div>
															  	   </div>

															  	   <div class="col-lg-6">
															  		   <div class="form-floating mb-3">
																          <input type="text" class="form-control" id="descAct<?php echo$i ?>" name ="descAct<?php echo$i ?>"  value	="<?php echo $fila2["descripcion_actividad"]; ?>"
																          >
																          <label for="descAct">
																         	Descripción de Actividad: 
																          </label>
																	   </div>
															  	   </div>
															  	</div>


															  	<div class="row">
															  	   <div class="col-lg-4">
															  		   <div class="form-floating mb-3">
																          <input type="text" class="form-control" id="tipoEv<?php echo$i ?>" name ="tipoEv<?php echo$i ?>"  value	="<?php echo $fila2["tipo_evidencia"]; ?>"
																          >
																          <label for="tipoEv">
																         	Tipo de Evidencia: 
																          </label>
																	   </div>
															  	   </div>

															  	   <div class="col-lg-4">
															  		   <div class="form-floating mb-3">
																          <input type="text" class="form-control" id="dateEnt<?php echo$i ?>" name ="dateEnt<?php echo$i ?>"  value	="<?php echo $fila2["FechaEntrega"]; ?>"
																          >
																          <label for="dateEnt">
																         	Fecha Entrega: 
																          </label>
																	   </div>
															  	   </div>


															  	   <div class="col-lg-4">
															  		   <div class="form-floating mb-3">
																          <input type="text" class="form-control" id="timeEnt<?php echo$i ?>" name ="timeEnt<?php echo$i ?>"  value	="<?php echo $fila2["HoraEntrega"]; ?>"
																          >
																          <label for="timeEnt">
																         	Fecha Entrega: 
																          </label>
																	   </div>
															  	   </div>
															  	</div>

															  	<div class="row">
															  		<div class="col-4">
															  			<button type="button" class="btn btn-warning"   
								  	 										onclick="EditarAct('<?php echo$i ?>', '<?php echo $fila2["idActividades"]; ?>')"> Editar <i class="fas fa-edit"></i>
								  	 									</button>
															  		</div>


															  		<div class="col-4">
															  			<button type="button" class="btn btn-danger" 
										  									onclick="EliminarAct( '<?php echo $fila2["idActividades"]; ?>' )">
																		    Eliminar <i class="fas fa-trash"></i>
																		</button>
															  		</div>
															  	</div>		
															   
															</div>  
														</div>	
												    </div>
									   			</div>	
																    			




													<?php 
										    	}
										    	
										    }
										 


									  	 ?>
									   
									  </div>
									  
								
						  	</div>

						  	<?php } ?>
						</div>
						
				</div>
			</div>
</body>
</html>