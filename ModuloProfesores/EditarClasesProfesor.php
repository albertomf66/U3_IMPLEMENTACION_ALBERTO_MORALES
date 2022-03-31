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
						
						<h2 class="margeninterno">  Editar Clase  </h2>
						
					<div class="row">
						
							
							<?php 
							$cont = 1;
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
									    <button class="btn btn-warning" type="button" data-bs-target="#EditClass" data-bs-toggle="modal" data-bs-dismiss="modal" onclick="Editar('<?php echo $_SESSION['Usuario'] ?> ','<?php echo $ClaseProfesor['Clase'][$i][0] ?>')">Editar Clase <i class="fas fa-edit"></i></button>
									    </div>
									  </div>
									  
								</div>
							</div>
							<?php 	} ?>
				
						</div>	<!-- TERMINA ROW  interno-->

				</div>
			</div>


 <div class="modal fade" id="EditClass" aria-hidden="true" aria-labelledby="Editar la Clase" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
          		<div class="modal-body">
					<div class="modal-header">
                   <h5 class="modal-title" id="staticBackdropLabel">Editando Clase</h5>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
     			   </div>
                    <div class="row">

                    
	                    	<div class="col-12">
	                    		 <div style=" padding-top: 15px;">
	                                <label for="Nombre de clase" class="estilos_label"> Código Clase:</label>
	                             </div>
	                    	</div>

	                    	<div class="col-12">
	                    		 <div style="text-align: justify;">
		                               <div class="input-group flex-nowrap">

		                               	 <span class="input-group-text" id="addon-wrapping"></span>
		                                  <input type="text" class="form-control estilos_input" aria-label="NombreClassEdit" aria-describedby="addon-wrapping" id="Cod" disabled>
		                                </div>
	                             </div>
	                    	</div>

	                    	<div class="col-12">
	                    		 <div style="padding-top: 15px;">
	                                <label for="Nombre de clase" class="estilos_label"> Profesor:</label>
	                             </div>
	                    	</div>

	                    	<div class="col-12">

		                    	 <div style="text-align: justify;">
		                               <div class="input-group flex-nowrap">

		                               	 <span class="input-group-text" id="addon-wrapping"></span>
		                                  <input type="text" class="form-control estilos_input" aria-label="NombreClassEdit" aria-describedby="addon-wrapping" id="Profe" disabled>
		                                </div>
	                             </div>
	                    	</div>

                    	


                    	<div class="col-12">
                    		 <div style="text-align: left; padding-top: 15px;">
                                <label for="Nombre de clase" class="estilos_label"> Nombre de Clase:</label>
                             </div>
                    	</div>

                    	<div class="col-12">
                    		 <div style="text-align: justify;">
                               <div class="input-group flex-nowrap">

                                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-edit"></i></span>
                                  <input type="text" class="form-control estilos_input" aria-label="NombreClassEdit" aria-describedby="addon-wrapping" id="NombreClassEdit" name="NombreClassEdit" placeholder = "Nuevo Nombre de la Clase" requiered >
                                </div>
                             </div>
                    	</div>
                    	<div class="col-12">
                    		 <div style="text-align: left; padding-top: 15px;">
                                <label for="Descripcion" class="estilos_label"> Descripción:</label>
                             </div>
                    	</div>
                    	<div class="col-12">
                    		 <div style="text-align: justify;">
                               <div class="input-group flex-nowrap">

                                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-edit"></i></span>
                                  <input type="text" class="form-control estilos_input" aria-label="Descripcion" aria-describedby="addon-wrapping" id="DescripcionEdit" name="Descripcion" placeholder="Nueva Descripcion de Clase">
                                </div>
                             </div>
                    	</div>


                    </div>


                         <div class="row separacion_input-sesion text-center">
                           <div class="col">
                    
                           	<input type="submit" name="" class="btn btn-primary estilos_boton" 
                           		id="btn_editar" value="Aplicar Cambios" onclick="AplicarEdicion()">
                           </div>
                         </div>



          		</div>
          </div>
      </div>
 </div> 



</body>
</html>