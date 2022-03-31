<?php 
		
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
<body id="ContenidoReportes">
	<div class="row ">
				<div class="col-10 text-left centro">
					
						<h2 class="margeninterno">Alumno: <?php echo strtoupper( $_SESSION['Usuario'])  ?></h2>
										
				</div>
			</div>


			<div class="row "> 
				<div class="col-10 text-left centro" style="margin-top: 10px">
						
						<h2 class="margeninterno">  Reportes </h2>
						
						<div class="row margeninterno OcultarElemento" style="margin-bottom: 10px;">
							<div class="col-3">
								<input type="button" name="btn_indice" class="btn btn-primary" value="Indice de Entrega" id="btn_indice" onclick="IndiceBtn()">
							</div>

							<div class="col-3 OcultarElemento">
								<input type="button" name="btn_calificaciones" class="btn btn-primary" value="Indice de Calificaciones" id="btn_calificaciones" onclick="Calificacionesbtn()">
							</div>

							
						</div>	
						
				</div>
			</div>


			<div class="row">
				<div class="col-10 text-left centro" style="margin-top: 20px">
					<h2 class="margeninterno">  Indice de Entregas: </h2>

					<div class="row margeninterno" >
						<div class="col-5 OcultarElemento">
							<h4> Comparar Entre Dos Clases</h4>
						</div>

						<div class="col-5 text-center">
							<h4> Saber Indice de Una clase</h4>
						</div>
					</div>

					<div class="row margeninterno" style="margin-bottom: 10px;">
							<div class="col-5 OcultarElemento">
								<div class="form-floating mb-3">
								  <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
								  <label for="floatingInput">Clase 1</label>
								</div>
								 <h3 class="text-center">VS </h3>
								<div class="form-floating">
								  <input type="text" class="form-control" id="clase1" placeholder="Password">
								  <label for="clase1">Clase 2 </label>
								</div>
							</div>


							<div class="col-5">
								<div class="form-floating mb-3">
								  <input type="text" class="form-control" id="unicamenteuno" placeholder="name@example.com">
								  <label for="unicamenteuno">Clase </label>
								</div>
								
							</div>
						</div>	

						<div class="row margeninterno" style="margin-bottom: 10px;">
							<div class="col-5 OcultarElemento">
								<input type="button" name="CompararClases" class="btn btn-primary" value="Comparar" id="CompararClases" onclick="ComparaClase()">
							</div>

							<div class="col-5 text-center">
								<input type="button" name="unaclase" class="btn btn-primary" value="Comparar" id="unaclase" 
								onclick="IndiceUno( '<?php echo $_SESSION['Usuario'] ?>' )">
							</div>
						</div>	


				</div>

			</div>


			<div class="row">
				<div class="col-10 text-left centro" style="margin-top: 20px">
					<h2 class="margeninterno"> Resultados: </h2>

					<div class="row">
						<div class="col-4 text-center">
							<h4> CANTIDAD TOTAL DE ACTIVIDADES QUE HA ENTREGADO EL ALUMNO </h4>
							<h4 id = "cant_total_act"> </h4>
						</div>

						<div class="col-4 text-center">
							<h4> CANTIDAD TOTAL DE ACTIVIDADES ENTREGADAS A LA CLASE CONSULTADA</h4>
							<h4 id = "cant_act_entregadas"> </h4>
						</div>

						<div class="col-4 text-center">
							<h4> CANTIDAD TOTAL DE ACTIVIDADES DE CLASE </h4>
							<h4 id = "cant_act_por_clase"> </h4>
						</div>
					</div>



					<div class="row ">
						<div class="col-12 text-center">
							<h4 id = "porcentaje_entrega"> </h4>
						</div>
					</div>
				</div>
			</div>
</body>
</html>