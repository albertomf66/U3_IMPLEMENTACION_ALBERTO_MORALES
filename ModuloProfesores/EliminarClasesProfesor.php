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
						
						<h2 class="margeninterno">  Eliminar Clases </h2>
					
					<div id="EliminarClaseProfesor">

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
									  	<h6 class="" > Nombre de Clase: </h6>
									    <h3 class="card-title " style="font-size: 20px;"> <?php echo $ClaseProfesor['Clase'][$i][3] ?></h3>
									    <h6 class=""> Código de Clase: </h6>
									      <h2 class="card-title text-center"> <?php echo $ClaseProfesor['Clase'][$i][0] ?></h2>
									  	<div class="text-center">

									     <button type="submit"  class="btn btn-danger" value="Eliminar Clase" id="" name="Eliminar" onclick="AddId(  '<?php echo $ClaseProfesor['Clase'][$i][0] ?>', '<?php echo $_SESSION['Usuario'] ?>') " >	Eliminar <i class="fas fa-trash"></i>
									     </button>

									    </div>

									  </div>
									  
								</div>
							</div>
							<?php 	} ?>

						
						</div>	<!-- TERMINA ROW  interno-->
						
					</div>	
				</div> <!-- TERMINA COL -->
				
			</div> <!-- TERMINA  ROW PRINCIPAL -->
			
</body>
</html>