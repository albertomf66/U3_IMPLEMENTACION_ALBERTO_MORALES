<?php 
require_once "../global.php"; 	// CONVERTIMOS CADA RESULTADO DE LA CONSULTA EN UN ARRAY 
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

 	$matricula =  $_SESSION['Usuario'];
 	$conexion  = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME_BD);
	//$conexion  = mysqli_connect("localhost","root","123","estadia");

	$consulta = "SELECT * FROM claseprofesor WHERE matricula_profesor = '$matricula' ";
	$resultado = mysqli_query($conexion,$consulta);


	$ClaseProfesor = array('Clase' => array());
	while ($ResultadoClase=mysqli_fetch_array($resultado))
	{
		array_push($ClaseProfesor['Clase'],
		array($ResultadoClase['codigoclase'],$ResultadoClase['Descripcion'],$ResultadoClase['matricula_profesor'],$ResultadoClase['NombreClase']));
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
					
						<h2 class="margeninterno">Profesor: <?php echo strtoupper( $_SESSION['Usuario'])  ?></h2>
										
				</div>
			</div>

		<form action="#" method="POST" id="InsersionActSimple">
 		
			<div class="row "> 
				<div class="col-10 text-left centro" style="margin-top: 20px">
						
					<h2 class="margeninterno">  Crear Actividad Simple</h2>
					
					<div class="row">
						 
						<div class="col-lg-5" style="padding-left: 20px; padding-right: 20px;" >
							  <label for="clase_actividad" class="estilos_label margenbot">  Clase:  </label>
						  <select class="form-select form-select-lg  " name="clase_actividad"  id="clase_actividad" style=" padding-bottom: 15px; padding-top: 10px;">


							 <option selected>Selecciona la Clase</option>
							

							  <?php  

		


					 for ($i=0; $i <(sizeof($ClaseProfesor['Clase'])); $i++) 
					 	{ echo "<option value='".$ClaseProfesor['Clase'][$i][0]."'>".$ClaseProfesor['Clase'][$i][3]."</option>"; } 

								
           					  ?>

							  
						   </select>
						</div> <!-- FINALIZA DIV COL DE SELECT DE ACTIVIDADES -->
						
						
						<div class="col-lg-7">
						   <label for="clase_actividad" class="estilos_label margenbot">  
						   		Nombre de Actividad:  
						   </label>
						  <div class="form-floating mb-3">
						     <input type="text" class="form-control" id="activity-name" placeholder="   Nombre de Actividad" name="activity-name" required>
						     <label for="activity-name">Nombre de Actividad</label>
						  </div>
						</div>

					</div> <!-- FINALIZA PRIMER ROW INTERNO  -->

					<div class="row" style="margin-bottom: 20px;">
						<div class="col-lg-5" style="padding-left: 20px; ">
							<label for="evidencia" class="estilos_label margenbot">  
						   		Tipo de Evidencia:  
						   </label>

						   <select  id= "evidencia" name = "evidencia" class="form-select form-select-lg  " style="padding-bottom: 15px; padding-top: 10px;">
						   	   <option selected>Tipo de Evidencia</option>
						   	  <option value="EP">Evidencia de Producto</option>
						   	  <option value="ED">Evidencia de Desempeño</option>
						   	  <option value="EC">Evidencia de Conocimiento</option>
						   	  <option value="AC">Actividad de Clase</option>	
						  </select>
						</div>
			
						  <div class="col-lg-7 " >
							<label for="clase_actividad" class="estilos_label margenbot">  
						   		Fecha de Entrega:  
						   </label>

						     <input  type="datetime-local"  class="form-control" id="fecha_entrega" name="fecha_entrega" 
						     style="padding-bottom: 15px; padding-top: 15px;" required  />
						  </div>

				    </div>

				    <div class="row" style="margin-bottom: 20px;">
				    	<div class="col-lg-7" style="padding-left: 20px; padding-right: 20px;">

				    		<label for="clase_actividad" class="estilos_label margenbot">  
						   		Descripcion de Evidencia:  
						   </label>


				    		<div class="form-floating">
 								 <textarea class="form-control" placeholder="Leave a comment here" id="Descripcionact" style="height: 100px; resize: none;"></textarea>
 								 <label for="Descripcionact">Inserta la Descripción</label>
							</div>
				    	</div>


				    	<div class="col-lg-3" style="padding-left: 20px; padding-right: 20px;">
				    		<label for="clase_actividad" class="estilos_label margenbot">  
						    	Archivo de Evidencia:  
						  	</label>

						  	<div class="form-group">
						  	   <form action="CargarArchivo.php">
						  		 	<input type="file" class="form-control-file" id="archivo" name="archivo">	
						  	   </form>
						   
						  </div>

				    	</div>
				    </div>	

				    <div class="row text-center" style="margin-bottom: 20px;">
						 <div class="col-lg-4 text-center">
						   <div class="text-center">

						   	<input hidden="true"  type="text" name="Mat_Profe_Even" id="Mat_Profe_Even" value="<?php echo $matricula ?>">

						   	<input type="submit" name=""  class="btn btn-primary" tyle="padding-bottom: 10px; padding-top: 10px;" value="Crear Actividad" id="Crear_actividad">
						   </div>
						 </div>				    		
				    </div>





					</div><!-- END SEGUNDO ROW INTERNO  -->
					
					
						
				</div>
			

		</form>	<!-- AQUI TEMRINA EL FORM  -->
		
</body>
</html>