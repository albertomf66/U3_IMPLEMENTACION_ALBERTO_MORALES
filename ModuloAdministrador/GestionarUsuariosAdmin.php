<?php 
	include "ConsultarAlumnos.php";
	include "ConsultarProfesores.php";
	include "ConsultarAdministradores.php";
 ?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>


			<div class="row " > <!-- ROW PRINCIPAL QUE ENIERRA TODO -->
			
				<div class="col-lg-12 centro" ><!-- COL PRINCIPAL -->
					<div class="row text-center" style="margin-bottom: 30px;margin-top: 30px ;">
						
						<div class="col-lg-4  " style="margin-bottom: 20px;" >
							<button type="button" class="btn btn-dark" style="width: 90%; height: 65px; " onclick="MostrarAlumnos()">
								<div class="row">
									<div class="col-4">
										<i class="fas fa-graduation-cap fa-3x"></i>
									</div>
									<div class="col-8">
										<p style="font-size: 25px;font-family: 'Barlow'; margin-top: 5px;">Alumnos</p>
									</div>
								</div>
							</button>
						</div>

						<div class="col-lg-4  " style="margin-bottom: 20px;" >
							<button type="button" class="btn btn-dark" style="width: 90%; height: 65px; " onclick="MostrarProfes()">
								<div class="row">
									<div class="col-4">
										<i class="fas fa-chalkboard-teacher fa-3x"></i>
									</div>
									<div class="col-8">
										<p style="font-size: 25px;font-family: 'Barlow'; margin-top: 5px;">Profesores</p>
									</div>
								</div>
							</button>
						</div>


						<div class="col-lg-4  " style="margin-bottom: 20px;" >
							<button type="button" class="btn btn-dark" style="width: 90%; height: 65px; " onclick="MostrarAdmin()">
								<div class="row">
									<div class="col-3">
										<i class="fas fa-user-cog fa-3x"></i>
									</div>
									<div class="col-8" >
										<p style="font-size: 25px;font-family: 'Barlow'; margin-top: 5px;">Administrador</p>
									</div>
								</div>
							</button>
						</div>


						
					
					</div> <!-- TERMINA ROW QUE ENCIERRA LOS BOTONES  -->
					

					<div class="row OcultarElemento" id="AlumnosGestion"><!-- ROW QUE ENCIERRA LA GESTION DE ALUMNOS -->
					
						<div class="col-lg-12" style="">
							<h2>Gestiona Alumnos</h2>

					
				    <div class="row"><!-- ROW DE FOR DE ALUMNOS -->

						<div class="col-lg-12" style=" margin-bottom: 30px;">
									<label>Nuevo Alumno</label>
									<button type="button" class="btn btn-primary"><i class="fas fa-folder-plus" onclick="Agregarlumno()"> </i></button>
					
						</div>

						<div class="col-lg-4 OcultarElemento" id="NewAlumno"><!-- ENCIERRA LA CARD -->
								<div class="card estilos_card" >
									<div class="card-header">
									   Añadir Alumno
								    </div>
								 <div class="card-body">
								  <div class="row">
								    <div class="col-4">
								    	<h6 class="" style="margin-top: 15px;"> Matrícula: </h6>
								    </div>
								    	<div class="col-8" >
								    	  <div class="form-floating">
  											<input type="text" class="form-control" id="alumno_mat" placeholder="MFAO160981"/>
  											
  											<label for="alumno_mat">
  											MFAO160981</label>
										  </div>
								    	</div>
							    	</div>

							      <div class="row" style="margin-top: 10px;">
								    <div class="col-4">
								    	<h6 class="" style="margin-top: 15px;"> Nombre: </h6>
								    </div>
								    	<div class="col-8">
								    	  <div class="form-floating">
  											<input type="text" class="form-control" id="nombre_alum" placeholder="Alberto" />
  											
  											<label for="nombre_alum">Alberto</label>
										  </div>
								    	</div>
							    	</div>						      

								   <div class="row" style="margin-top: 10px;">
								    <div class="col-6">
								    	  <div class="form-floating">
  											<input type="text" class="form-control" id="apellidop_alum" placeholder="Morales"/>
  											
  											<label for="apellidop_alum">Apellido P</label>
										  </div>
								    </div>
								    	<div class="col-6">
								    	  <div class="form-floating">
  											<input type="text" class="form-control" id="apellidom_alum" placeholder="Flores"/>
  											
  											<label for="apellidom_alum">Apellido M</label>
										  </div>
								    	</div>
							    	</div> 
								       
								    

								  <div class="row" style="margin-top: 10px;">
								    <div class="col-6">
								    	  <div class="form-floating">
  											<input type="email" class="form-control" id="mail_alum" placeholder="Correo"/>
  											
  											<label for="mail_alum">Correo</label>
										  </div>
								    </div>
								    	<div class="col-6">
								    	  <div class="form-floating">
  											<input type="password" class="form-control" id="pass_alum" placeholder="Password"/>
  											
  											<label for="pass_alum">Password</label>
										  </div>
								    	</div>
							    	</div> 
								       
								
								         
								       
								   </div>

								      <div class="card-footer text-muted">
								      	<div class="row">
								      		<div class="col-4">
								      		  <button class="btn btn-primary" onclick="InsertarAlumno()">Add
								      		  </button>
								      		</div>
								      		
								      	</div>
								      </div>
								</div>

							</div><!--  END ENCIERRA LA CARD -->

					


							
						<?php 
						 	for ($i=0; $i <(sizeof($Alumno['alum'])); $i++) {
						 ?>	
							<div class="col-lg-4"><!-- ENCIERRA LA CARD -->
								<div class="card estilos_card" >
									<div class="card-header">
									    Alumno <?php echo ($i +1) ?>
								    </div>
							<div class="card-body">
								  <div class="row">
								    <div class="col-4">
								    	<h6 class="" style="margin-top: 15px;"> Matrícula: </h6>
								    </div>
								    	<div class="col-8" >
								    	  <div class="form-floating">
  											<input type="text" class="form-control" id="matricula<?php echo $i?>" placeholder="MFAO160981" disabled>
  											
  											<label for="matricula<?php echo $i?>">
  												<?php echo $Alumno['alum'][$i][0] ?>
  											</label>
										  </div>
								    	</div>
							    	</div>

							      <div class="row" style="margin-top: 10px;">
								    <div class="col-4">
								    	<h6 class="" style="margin-top: 15px;"> Nombre: </h6>
								    </div>
								    	<div class="col-8">
								    	  <div class="form-floating">
  											<input type="text" class="form-control" id="nombre<?php echo $i ?>" placeholder="Alberto" disabled>
  											
  											<label for="nombre<?php echo $i ?>">
  												<?php echo $Alumno['alum'][$i][1] ?></label>
										  </div>
								    	</div>
							    	</div>						      

								   <div class="row" style="margin-top: 10px;">
								    <div class="col-6">
								    	  <div class="form-floating">
  											<input type="text" class="form-control"  placeholder="Morales" disabled id="paterno<?php echo $i ?>">
  											
  											<label for="paterno<?php echo $i ?>"><?php echo $Alumno['alum'][$i][2] ?></label>
										  </div>
								    </div>
								    	<div class="col-6">
								    	  <div class="form-floating">
  											<input type="text" class="form-control" id="materno<?php echo $i ?>" placeholder="Flores" disabled>
  											
  											<label for="materno<?php echo $i ?>">
  											<?php echo $Alumno['alum'][$i][3] ?></label>
										  </div>
								    	</div>
							    	</div> 
								       
								    

								  <div class="row" style="margin-top: 10px;">
								    <div class="col-12">
								    	  <div class="form-floating">
  											<input type="email" class="form-control" id="mail<?php echo $i ?>" placeholder="Correo" disabled>
  											
  											<label for="mail<?php echo $i ?>">
  											<?php echo $Alumno['alum'][$i][4] ?>
  											</label>
										  </div>
								    </div>
								    <div class="col-12" >
								    	  <div class="form-floating" style="margin-top: 10px;">
  											<input type="password" class="form-control" id="psw<?php echo $i ?>" placeholder="Password" disabled>
  											
  											<label for="psw<?php echo $i ?>">
  											<?php echo $Alumno['alum'][$i][5] ?>
  											</label>
										  </div>
								    </div>
							    	</div>     
								  </div>


								      <div class="card-footer text-muted">
								      	<div class="row">
								      		
								      		<div class="col-2">
								      			<button class="btn btn-warning" onclick="EditAlumno(

													'<?php echo$i ?>' )"><i class="fas fa-edit"></i></button>
								      		</div>
								      		<div class="col-6 OcultarElemento" id="AplicaEditAlumno<?php echo $i?>">
								      			<button class="btn btn-warning" onclick="AplicarEditAlumno('<?php echo $i?>' , '<?php echo $Alumno['alum'][$i][0] ?>', 
								      				'<?php echo $Alumno['alum'][$i][1] ?>',
								      				'<?php echo $Alumno['alum'][$i][2] ?>',
								      				'<?php echo $Alumno['alum'][$i][3] ?>',
								      				'<?php echo $Alumno['alum'][$i][4] ?>',
								      				'<?php echo $Alumno['alum'][$i][5] ?>'

								      			)" >Aplicar Edicion </button>
								      		</div>
								      		<div class="col-4">
								      			<button class="btn btn-danger"
								      			onclick="EiminarAlumno('<?php echo $Alumno['alum'][$i][0] ?>')"><i class="fas fa-trash"></i></button>
								      		</div>
								      	</div>
								      </div>
								</div>

							</div><!--  END ENCIERRA LA CARD -->
						 <?php 
						 	}
						  ?>	
							</div><!-- END ROW DE FOR DE ALUMNOS -->
							

						</div><!-- END COL DE LA GESTION DE ALUMNOS -->
					</div><!--END  ROW QUE ENCIERRA LA GESTION DE ALUMNOS -->
					




			<div class="row OcultarElemento" id="ProfesGestion"><!-- ROW QUE ENCIERRA LA GESTION DE PROFESORES -->
					
			   <div class="col-lg-12" style="">
							<h2>Gestiona Profesores</h2>

					
				    <div class="row"><!-- ROW DE FOR DE PROFESORES -->

						<div class="col-lg-12" style=" margin-bottom: 30px;">
									<label>Nuevo Profesor</label>
									<button type="button" class="btn btn-primary"><i class="fas fa-folder-plus" onclick="AgregarProfe()"> </i></button>
					
						</div>

						<div class="col-lg-4 OcultarElemento" id="NewProfe"><!-- ENCIERRA LA CARD -->
								<div class="card estilos_card" >
									<div class="card-header">
									   Añadir Profesor
								    </div>
								 <div class="card-body">
								  <div class="row">
								    <div class="col-4">
								    	<h6 class="" style="margin-top: 15px;"> Matrícula: </h6>
								    </div>
								    	<div class="col-8" >
								    	  <div class="form-floating">
  											<input type="text" class="form-control" id="profesor_mat" placeholder="MFAO160981"/>
  											
  											<label for="profesor_mat">
  											MFAO160981</label>
										  </div>
								    	</div>
							    	</div>

							      <div class="row" style="margin-top: 10px;">
								    <div class="col-4">
								    	<h6 class="" style="margin-top: 15px;"> Nombre: </h6>
								    </div>
								    	<div class="col-8">
								    	  <div class="form-floating">
  											<input type="text" class="form-control" id="nombre_profe" placeholder="Alberto" />
  											
  											<label for="nombre_profe">Alberto</label>
										  </div>
								    	</div>
							    	</div>						      

								   <div class="row" style="margin-top: 10px;">
								    <div class="col-6">
								    	  <div class="form-floating">
  											<input type="text" class="form-control" id="apellidop_profe" placeholder="Morales"/>
  											
  											<label for="apellidop_profe">Apellido P</label>
										  </div>
								    </div>
								    	<div class="col-6">
								    	  <div class="form-floating">
  											<input type="text" class="form-control" id="apellidom_profe" placeholder="Flores"/>
  											
  											<label for="apellidom_profe">Apellido M</label>
										  </div>
								    	</div>
							    	</div> 
								       
								    

								  <div class="row" style="margin-top: 10px;">
								    <div class="col-6">
								    	  <div class="form-floating">
  											<input type="email" class="form-control" id="mail_profe" placeholder="Correo"/>
  											
  											<label for="mail_profe">Correo</label>
										  </div>
								    </div>
								    	<div class="col-6">
								    	  <div class="form-floating">
  											<input type="password" class="form-control" id="pass_profe" placeholder="Password"/>
  											
  											<label for="pass_profe">Password</label>
										  </div>
								    	</div>
							    	</div> 
								       
								
								         
								       
								   </div>


								       <div class="card-footer text-muted">
								      	<div class="row">
								      		<div class="col-4">
								      		  <button class="btn btn-primary" onclick="InsertarProfesor()">Add
								      		  </button>
								      		</div>
								      		
								      	</div>
								      </div>
								</div>

							</div><!--  END ENCIERRA LA CARD -->

					


							
						<?php 
						 	for ($i=0; $i <(sizeof($Profesor['profe'])); $i++) {
						 ?>	
							<div class="col-lg-4"><!-- ENCIERRA LA CARD -->
								<div class="card estilos_card" >
									<div class="card-header">
									    Profesor <?php echo ($i +1) ?>
								    </div>
								<div class="card-body">
								  <div class="row">
								    <div class="col-4">
								    	<h6 class="" style="margin-top: 15px;"> Matrícula: </h6>
								    </div>
								    	<div class="col-8" >
								    	  <div class="form-floating">
  											<input type="text" class="form-control" id="matriculaprofe<?php echo $i?>" placeholder="MFAO160981" disabled>
  											
  											<label for="matriculaprofe<?php echo $i?>">
  												<?php echo $Profesor['profe'][$i][0] ?>
  											</label>
										  </div>
								    	</div>
							    	</div>

							      <div class="row" style="margin-top: 10px;">
								    <div class="col-4">
								    	<h6 class="" style="margin-top: 15px;"> Nombre: </h6>
								    </div>
								    	<div class="col-8">
								    	  <div class="form-floating">
  											<input type="text" class="form-control" id="nombreprofe<?php echo $i ?>" placeholder="Alberto" disabled>
  											
  											<label for="nombreprofe<?php echo $i ?>">
  												<?php echo $Profesor['profe'][$i][1] ?></label>
										  </div>
								    	</div>
							    	</div>						      

								   <div class="row" style="margin-top: 10px;">
								    <div class="col-6">
								    	  <div class="form-floating">
  											<input type="text" class="form-control"  placeholder="Morales" disabled id="paternoprofe<?php echo $i ?>">
  											
  											<label for="paternoprofe<?php echo $i ?>"><?php echo $Profesor['profe'][$i][2] ?></label>
										  </div>
								    </div>
								    	<div class="col-6">
								    	  <div class="form-floating">
  											<input type="text" class="form-control" id="maternoprofe<?php echo $i ?>" placeholder="Flores" disabled>
  											
  											<label for="maternoprofe<?php echo $i ?>">
  											<?php echo $Profesor['profe'][$i][3] ?></label>
										  </div>
								    	</div>
							    	</div> 
								       
								    

								  <div class="row" style="margin-top: 10px;">
								    <div class="col-12">
								    	  <div class="form-floating">
  											<input type="email" class="form-control" id="mailprofe<?php echo $i ?>" placeholder="Correo" disabled>
  											
  											<label for="mailprofe<?php echo $i ?>">
  											<?php echo $Profesor['profe'][$i][4] ?>
  											</label>
										  </div>
								    </div>
								    <div class="col-12" >
								    	  <div class="form-floating" style="margin-top: 10px;">
  											<input type="password" class="form-control" id="pswprofe<?php echo $i ?>" placeholder="Password" disabled>
  											
  											<label for="pswprofe<?php echo $i ?>">
  											<?php echo $Profesor['profe'][$i][5] ?>
  											</label>
										  </div>
								    </div>
							    	</div>     
								  </div>


								      <div class="card-footer text-muted">
								      	<div class="row">
								      		
								      		<div class="col-2">
								      			<button class="btn btn-warning" onclick="EditProfe(

													'<?php echo$i ?>' )"><i class="fas fa-edit"></i></button>
								      		</div>
								      		<div class="col-6 OcultarElemento" id="AplicaEditProfe<?php echo $i?>">
								      			<button class="btn btn-warning" onclick="AplicarEditProfe('<?php echo $i?>' , '<?php echo $Profesor['profe'][$i][0] ?>', 
								      				'<?php echo $Profesor['profe'][$i][1] ?>',
								      				'<?php echo $Profesor['profe'][$i][2] ?>',
								      				'<?php echo $Profesor['profe'][$i][3] ?>',
								      				'<?php echo $Profesor['profe'][$i][4] ?>',
								      				'<?php echo $Profesor['profe'][$i][5] ?>'

								      			)" >Aplicar Edicion </button>
								      		</div>
								      		<div class="col-4">
								      			<button class="btn btn-danger"
								      			onclick="EliminarProfe('<?php echo $Profesor['profe'][$i][0] ?>', )"><i class="fas fa-trash"></i></button>
								      		</div>
								      	</div>
								      </div>
								</div>

							</div><!--  END ENCIERRA LA CARD -->
						 <?php 
						 	}
						  ?>	
							</div><!-- END ROW DE FOR DE PROFESORES -->
							

						</div><!-- END COL DE LA GESTION DE PROFESORES -->
				</div><!--END  ROW QUE ENCIERRA LA GESTION DE PROFESORES -->



	  <div class="row OcultarElemento" id="AdminGestion"><!-- ROW QUE ENCIERRA LA GESTION DE PROFESORES -->
					
			   <div class="col-lg-12" style="">
							<h2>Gestiona Administradores</h2>

					
				    <div class="row"><!-- ROW DE FOR DE PROFESORES -->

						<div class="col-lg-12" style=" margin-bottom: 30px;">
									<label>Nuevo Administrador</label>
									<button type="button" class="btn btn-primary"><i class="fas fa-folder-plus" onclick="AgregarAdmin()"> </i></button>
					
						</div>

						<div class="col-lg-4 OcultarElemento" id="NewAdmin"><!-- ENCIERRA LA CARD -->
								<div class="card estilos_card" >
									<div class="card-header">
									   Añadir Administrador
								    </div>
								     <div class="card-body">
								  <div class="row">
								    <div class="col-4">
								    	<h6 class="" style="margin-top: 15px;"> Matrícula: </h6>
								    </div>
								    	<div class="col-8" >
								    	  <div class="form-floating">
  											<input type="text" class="form-control" id="admin_mat" placeholder="MFAO160981"/>
  											
  											<label for="admin_mat">
  											MFAO160981</label>
										  </div>
								    	</div>
							    	</div>

							      <div class="row" style="margin-top: 10px;">
								    <div class="col-4">
								    	<h6 class="" style="margin-top: 15px;"> Nombre: </h6>
								    </div>
								    	<div class="col-8">
								    	  <div class="form-floating">
  											<input type="text" class="form-control" id="nombre_admin" placeholder="Alberto" />
  											
  											<label for="nombre_admin">Alberto</label>
										  </div>
								    	</div>
							    	</div>						      

								   <div class="row" style="margin-top: 10px;">
								    <div class="col-6">
								    	  <div class="form-floating">
  											<input type="text" class="form-control" id="apellidop_admin" placeholder="Morales"/>
  											
  											<label for="apellidop_admin">Apellido P</label>
										  </div>
								    </div>
								    	<div class="col-6">
								    	  <div class="form-floating">
  											<input type="text" class="form-control" id="apellidom_admin" placeholder="Flores"/>
  											
  											<label for="apellidom_admin">Apellido M</label>
										  </div>
								    	</div>
							    	</div> 
								       
								    

								  <div class="row" style="margin-top: 10px;">
								    <div class="col-6">
								    	  <div class="form-floating">
  											<input type="email" class="form-control" id="mail_admin" placeholder="Correo"/>
  											
  											<label for="mail_admin">Correo</label>
										  </div>
								    </div>
								    	<div class="col-6">
								    	  <div class="form-floating">
  											<input type="password" class="form-control" id="pass_admin" placeholder="Password"/>
  											
  											<label for="pass_admin">Password</label>
										  </div>
								    	</div>
							    	</div> 
								       
								
								         
								       
								   </div>
									<div class="card-footer text-muted">
								      	<div class="row">
								      		<div class="col-4">
								      		  <button class="btn btn-primary" onclick="InsertarAdministrador()">Add
								      		  </button>
								      		</div>
								      		
								      	</div>
								      </div>
								</div>

							</div><!--  END ENCIERRA LA CARD -->

					


							
						<?php 
						 	for ($i=0; $i <(sizeof($Administrador['admin'])); $i++) {
						 ?>	
							<div class="col-lg-4"><!-- ENCIERRA LA CARD -->
								<div class="card estilos_card" >
									<div class="card-header">
									    Administrador <?php echo ($i +1) ?>
								    </div>
								    <div class="card-body">
								  <div class="row">
								    <div class="col-4">
								    	<h6 class="" style="margin-top: 15px;"> Matrícula: </h6>
								    </div>
								    	<div class="col-8" >
								    	  <div class="form-floating">
  											<input type="text" class="form-control" id="matriculaadmin<?php echo $i?>" placeholder="MFAO160981" disabled>
  											
  											<label for="matriculaadmin<?php echo $i?>">
  												<?php echo $Administrador['admin'][$i][0] ?>
  											</label>
										  </div>
								    	</div>
							    	</div>

							      <div class="row" style="margin-top: 10px;">
								    <div class="col-4">
								    	<h6 class="" style="margin-top: 15px;"> Nombre: </h6>
								    </div>
								    	<div class="col-8">
								    	  <div class="form-floating">
  											<input type="text" class="form-control" id="nombreadmin<?php echo $i ?>" placeholder="Alberto" disabled>
  											
  											<label for="nombreadmin<?php echo $i ?>">
  												<?php echo $Administrador['admin'][$i][1] ?></label>
										  </div>
								    	</div>
							    	</div>						      

								   <div class="row" style="margin-top: 10px;">
								    <div class="col-6">
								    	  <div class="form-floating">
  											<input type="text" class="form-control"  placeholder="Morales" disabled id="paternoadmin<?php echo $i ?>">
  											
  											<label for="paternoadmin<?php echo $i ?>"><?php echo $Administrador['admin'][$i][2] ?></label>
										  </div>
								    </div>
								    	<div class="col-6">
								    	  <div class="form-floating">
  											<input type="text" class="form-control" id="maternoadmin<?php echo $i ?>" placeholder="Flores" disabled>
  											
  											<label for="maternoadmin<?php echo $i ?>">
  											<?php echo $Administrador['admin'][$i][3] ?></label>
										  </div>
								    	</div>
							    	</div> 
								       
								    

								  <div class="row" style="margin-top: 10px;">
								    <div class="col-12">
								    	  <div class="form-floating">
  											<input type="email" class="form-control" id="mailadmin<?php echo $i ?>" placeholder="Correo" disabled>
  											
  											<label for="mailadmin<?php echo $i ?>">
  											<?php echo $Administrador['admin'][$i][4] ?>
  											</label>
										  </div>
								    </div>
								    <div class="col-12" >
								    	  <div class="form-floating" style="margin-top: 10px;">
  											<input type="password" class="form-control" id="pswadmin<?php echo $i ?>" placeholder="Password" disabled>
  											
  											<label for="pswadmin<?php echo $i ?>">
  											<?php echo $Administrador['admin'][$i][5] ?>
  											</label>
										  </div>
								    </div>
							    	</div>     
								  </div>


								       <div class="card-footer text-muted">
								      	<div class="row">
								      		
								      		<div class="col-2">
								      			<button class="btn btn-warning" onclick="EditAdmin(

													'<?php echo$i ?>' )"><i class="fas fa-edit"></i></button>
								      		</div>
								      		<div class="col-6 OcultarElemento" id="AplicaEditAdmin<?php echo $i?>">
								      			<button class="btn btn-warning" onclick="AplicarEditAdmin('<?php echo $i?>' , '<?php echo $Administrador['admin'][$i][0] ?>', 
								      				'<?php echo $Administrador['admin'][$i][1] ?>',
								      				'<?php echo $Administrador['admin'][$i][2] ?>',
								      				'<?php echo $Administrador['admin'][$i][3] ?>',
								      				'<?php echo $Administrador['admin'][$i][4] ?>',
								      				'<?php echo $Administrador['admin'][$i][5] ?>'

								      			)" >Aplicar Edicion </button>
								      		</div>
								      		<div class="col-4">
								      			<button class="btn btn-danger"
								      			onclick="EliminarAdmin(
								      			'<?php echo $Administrador['admin'][$i][0] ?>',
								      			'<?php echo $_SESSION['Usuario'] ?>')"><i class="fas fa-trash"></i></button>
								      		</div>
								      	</div>
								      </div>
								</div>

							</div><!--  END ENCIERRA LA CARD -->
						 <?php 
						 	}
						  ?>	
							</div><!-- END ROW DE FOR DE PROFESORES -->
							

						</div><!-- END COL DE LA GESTION DE PROFESORES -->
				</div><!--END  ROW QUE ENCIERRA LA GESTION DE PROFESORES -->







				</div><!--END  COL PRINCIPAL -->
			</div><!-- END ROW PRINCIPAL QUE ENIERRA TODO -->
			
</body>
</html>