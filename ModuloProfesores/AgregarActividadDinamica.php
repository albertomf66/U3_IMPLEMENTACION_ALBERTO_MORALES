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

			<form action="#" method="POST" id="InsertActDinamica" class="MostrarElemento">
				
				<div class="row " style="margin-top: 25px;">
					<div class="col-10 text-left centro">
						
							<h2 class="margeninterno">  Crear Actividad Dinamica</h2>

							<div class="row">
								<div class="col-lg-5">
									<label for="clase_act_dinamica" class="estilos_label margenbot">  Clase:  </label>
									 <select class="form-select form-select-lg  " name="clase_act_dinamica"  id="clase_act_dinamica" style=" padding-bottom: 15px; padding-top: 10px;">
									    <option selected>Selecciona la Clase</option>
							         <?php  
										 for ($i=0; $i <(sizeof($ClaseProfesor['Clase'])); $i++) 
										 	{ echo "<option value='".$ClaseProfesor['Clase'][$i][0]."'>".$ClaseProfesor['Clase'][$i][3]."</option>"; } 
									  ?>
									</select>
								</div><!-- COL SELECT CLASES -->


								<div class="col-lg-7">
							       <label for="name_act_dinamica" class="estilos_label margenbot">  
							   		 Nombre de Actividad:  
							        </label>
							        <div class="form-floating mb-3">
							           <input type="text" class="form-control" id="name_act_dinamica" placeholder="   Nombre de Actividad" name="name_act_dinamica" required>
							         <label for="name_act_dinamica">Nombre de Actividad</label>
							  		</div>
						    	</div><!-- COL NOMBRE DE ACTIVIDAD -->
						    	

							</div><!-- ROW SELECT CLASES / NOMBRE ACTIVIDAD -->

							
							<div class="row" style="margin-bottom: 20px;">
							
			
							    <div class="col-lg-7 " >
								  <label for="fecha_entrega2" class="estilos_label margenbot">  
							   		  Fecha de Entrega:  
							      </label>

							       <input  type="datetime-local"  class="form-control" id="fecha_entrega2" name="fecha_entrega2" 
							     style="padding-bottom: 15px; padding-top: 15px;" required  />
							   </div>


							   	<div class="col-lg-5" style="padding-left: 20px; ">
									  <input  type="text"  class="form-control" id="tipo_act_dinamica" name="tipo_act_dinamica"  value=" DM" hidden="true" 
							     		style="padding-bottom: 15px; padding-top: 15px;" required  />
								</div>
				             </div>							

						    



						    <div class="row " style="margin-bottom: 20px;">
								 <div class="col-lg-4 text-center">
								   <div class="text-center">

								   	<input hidden="true"  type="text" name="Mat_Profe_Even" id="Mat_Profe_Even" value="<?php echo $matricula ?>">

								   	<input type="submit" name="continua_dinamica"  class="btn btn-primary" tyle="padding-bottom: 10px; padding-top: 10px;" value="Continuar" id="continua_dinamica">
								   </div>
								 </div>				    		
						    </div>


											
					</div><!-- TERMINA COL PRINCIPAL -->
				</div><!-- termina ROW PRINCIPAL -->	
			</form><!-- TERMINA FORM -->
			
			<div class="row OcultarElemento" style="margin-top: 25px;" id="Seguir_Pregunta">
				<div class="col-10 text-left centro">
					<h2 class="margeninterno"> Nueva Pregunta: </h2>		


					<div class="row">	
						<div class="col-8">
							 <label for="pregunta" class="estilos_label margenbot">  
							   		 Pregunta:  
							        </label>
							        <div class="form-floating mb-3" style="margin-top: 15px;"> 
							           <input type="text" class="form-control" id="pregunta" placeholder=" Nombre de Actividad" name="pregunta" required>
							         <label for="pregunta">Pregunta</label>
							        </div>
						</div>


						 		
					</div>


					<div class="row">	
						<div class="col-8">
							 <label for="pregunta" class="estilos_label margenbot">  
							   		 Respuesta:  
							        </label>
							        <div class="form-floating mb-3" style="margin-top: 15px;"> 
							           <input type="text" class="form-control" id="respuesta" placeholder=" Nombre de Actividad" name="respuesta" required>
							         <label for="respuesta">Respuesta</label>
							        </div>
						</div>



						 	
					</div>

					<div class="row" style="margin-bottom: 25px; margin-bottom:15px;">
						<div class="col-lg-4 text-center">
								   <div class="text-center">

								   	<input type="text" id = "IdActividad" name = "IdActividad" hidden="true">

								   	<input type="submit" name="fin_preguntas"  class="btn btn-primary OcultarElemento" tyle="padding-bottom: 10px; padding-top: 10px;" value="Terminar Test" id="fin_preguntas" onclick="TerminarPregunta()" >
								   </div>
						</div>


						<div class="col-lg-4 text-center">
								   <div class="text-center">


								   	<input type="submit" name="sig_pregunta"  class="btn btn-primary" tyle="padding-bottom: 10px; padding-top: 10px;" value="Siguiente Pregunta" id="sig_pregunta" onclick="SiguientePregunta()">
								   </div>
						</div>

					</div>

				</div>
			</div>
		
		
		
</body>
</html>