

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


			<div class="row "  id="UnirmeClaseAlumno"> 
				<div class="col-10 text-left centro" style="margin-top: 20px">
						
						<h2 class="margeninterno">  Unirme a una Clase  </h2>
						
						<div class="row ">
							
							<div class="col-12">
	                    		 <div style=" padding-top: 15px; margin-left: 15px; margin-bottom: 10px;">
	                                <label for="Nombre de clase" class="estilos_label"> Introduce el Código de clase:</label>
	                             </div>
	                    	</div>


							<div class="col-lg-10">
								 <div style="text-align: justify; margin-left: 15px; margin-right: 15px; padding-bottom: 20px;">
		                               <div class="input-group flex-nowrap">
		                               	 <span class="input-group-text" id="addon-wrapping"><i class="fas fa-plus-square"></i></span>
		                                  <input type="text" class="form-control estilos_input" aria-label="addcodigo" aria-describedby="addon-wrapping" id="addcodigo"   maxlength="6" placeholder="Ingresa Código de Clase">
		                                </div>
	                             </div>
							</div>
						
						</div>	

                         <div class="row separacion_input-sesion text-center">
                           <div class="col" style="margin-bottom: 20px;">
       
                           	<input type="submit" name="btn_unirmeclase" class="btn btn-primary estilos_boton" id="btn_unirmeclase" value="Unirme a Clase" onclick="Unirme( '<?php  echo $_SESSION['Usuario'] ?> ' )">

                           </div>
                         </div>
						
				</div>
			</div>


</body>
</html>