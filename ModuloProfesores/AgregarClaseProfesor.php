<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body >
	
	<div class="row ">
				<div class="col-10 text-left centro">
					
						<h2 class="margeninterno">Profesor: <?php echo strtoupper( $_SESSION['Usuario'])."            "  ?> </h2>
										
				</div>
			</div>


			<div class="row "> 
			 <form action="InsertarClaseProfesor.php" method="POST" id="AgregarClasesProfe">
				<div class="col-12 text-left centro" style="margin-top: 20px">
						
						<h2 class="margeninterno">  Agregar una Clase</h2>
						
							<div class="row" style="padding-bottom: 20px; margin-left: 10px; margin-right: 10px;">
								<?php $codigo = include "GenerarCodigoClase.php" ;?>
								<div class="col-lg-2" >
									<div class="row">
										<div class="col">
											<label for="Clase" class="estilos_label margenbot"> Código: </label>
										</div>
									</div>
									<div class="row ">
										<div class="col-lg-10 ">
									 		 <input type="text" class="form-control text-center" id="CodigoClase" value="<?php echo $codigo; ?>" disabled="true" >
										</div>
									</div>

								</div>


								<div class="col-lg-5" >
										<div class="row">
										<div class="col">
											<label for="NombreClase" class="estilos_label margenbot"> Nombre de Clase: </label>
										</div>
									</div>
									<div class="row ">
										<div class="col-lg-12 ">
									 		 <div class="form-floating mb-3">
												  <input type="text" class="form-control" id="NombreClase" placeholder="Logica de programacion" name="NombreClase" pattern="[a-zA-ZÀ-ÿ\s]{1,40}$" required>
												  <label for="floatingInput" style="color: #767576;">Logica de programacion</label>
												</div>


										</div>
									</div>
								</div>


									<div class="col-lg-5" >
										<div class="row">
										<div class="col">
											<label for="descripcion" class="estilos_label margenbot"> Descripción (Opcional): </label>
										</div>
									</div>
									<div class="row ">
										<div class="col-lg-12 ">
									 	 <div class="form-floating">
											  <textarea class="form-control" placeholder="Leave a comment here" id="Descripcion" style="height: 150px" name="Descripcion"></textarea>
											  <label for="floatingTextarea2" style="color: #767576;">Escribe tu Descripción</label>
											</div>
									</div>
								</div>
								
							</div>	


	                         <div class="row separacion_input-sesion text-center">
	                           <div class="col">
	                               <button class="btn btn-primary estilos_boton" id="btn_crearclase" >Agregar</button>
	                           </div>
	                         </div>

	                         <input type="hidden" id="UsuarioProfe" name="UsuarioProfe" value="<?php  echo  $_SESSION['Usuario'] ?> ">
	                          <input type="hidden" id="CodigoClase"	name = "CodigoClase" value="<?php echo $codigo ?> ">
							
					</div>
				</div> <!-- DONDE SE ENCERRA TODO EL CONTENIDO  -->
			</form>		
		   </div>
			
</body>
</html>