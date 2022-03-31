<?php 
   
	include "ConsultarEventosAlumno.php"

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
					
						<h2 class="margeninterno">Usuario de Alumno: <?php echo strtoupper( $_SESSION['Usuario'])  ?></h2>
										
				</div>
			</div>


			<div class="row " id="eventos_pendientes_row"> 
				<div class="col-10 text-left centro" style="margin-top: 20px">
						
						<h2 class="margeninterno">Eventos Pendientes</h2>
						
						<div class="row centro" style="margin-bottom: 40px">
							<div class="col-lg-3 ">
								<input type="button" name="btn_general" class="btn btn-primary" value="todos" id="btn_general">
							</div>

							<div class="col-lg-3 ">
								<input type="button" name="btn_asc" class="btn btn-primary" value="Ordenar ASC" id="btn_asc">
							</div>

							<div class="col-lg-3">
								<input type="button" name="btn_desc" class="btn btn-primary" value="Ordenar DESC" id="btn_desc">
							</div>


							<div class="col-lg-3">
								<input type="button" name="btn_importancia" id="btn_importancia" class="btn btn-primary" value="Ordenar por importancia">
							</div>
						</div>	

						<div class="row centro "  style="margin-bottom: 40px">
						<!-- PARA TODOS LOS EVENTOS GENERALES  SIN NINGUNT TIPO DE FILT-->

							<div class="col-12" id="table_general">
							    <table class="table" >
								  <thead class="thead-dark">
								    <tr>
								      <th scope="col">Id </th>
								      <th scope="col">Nombre Evento</th>
								      <th scope="col">Fecha</th>
								      <th scope="col"> Comentarios</th>
								    </tr>
								  </thead>

								  <tbody>
								  	<!-- AQUI SE COMIENZA A IMPRIMIR LA CONSULTA GENERAL -->
								  	 <?php foreach ($res_gnral as $fila) { ?>

								    <tr>
								      <th scope="row"><?php echo $fila  ["id"] ?></th>
								      <td><?php echo $fila  ["title"] ?></td>
								      <td> <?php echo $fila ["start"] ?> </td>
								      <td></td>
								    </tr>
								     
								     <?php } ?>
								  </tbody>
								</table>

							</div>	
							

							<div class="col-12 OcultarElemento" id="table_asc">
								<table class="table "  >
							  <thead class="thead-dark">
							    <tr>
							      <th scope="col">Id  </th>
							      <th scope="col">Nombre Evento</th>
							      <th scope="col">Fecha</th>
							      <th scope="col"> Comentarios</th>
							    </tr>
							  </thead>
							  <tbody>
							    <!-- AQUI SE COMIENZA A IMPRIMIR LA CONSULTA ASC -->
							  	 <?php foreach ($res_asc as $fila) { ?>

							    <tr>
							      <th scope="row"><?php echo $fila  ["id"] ?></th>
							      <td><?php echo $fila  ["title"] ?></td>
							      <td> <?php echo $fila ["start"] ?> </td>
							    </tr>
							     
							     <?php } ?>
							  </tbody>
							</table>
							

							</div>

							

							<div class="col-12 OcultarElemento"  id="table_desc">
								<table class="table " >
							  <thead class="thead-dark">
							    <tr>
							      <th scope="col">Id </th>
							      <th scope="col">Nombre Evento</th>
							      <th scope="col">Fecha</th>
							      <th scope="col"> Comentarios</th>
							    </tr>
							  </thead>
							  <tbody>
							  	 <!-- AQUI SE COMIENZA A IMPRIMIR LA CONSULTA DESC -->
							  	 <?php foreach ($res_desc as $fila) { ?>

							    <tr>
							      <th scope="row"><?php echo $fila  ["id"] ?></th>
							      <td><?php echo $fila  ["title"] ?></td>
							      <td> <?php echo $fila ["start"] ?> </td>
							    </tr>
							     
							     <?php } ?>
							  </tbody>
							</table>
							
							</div>

							

							<div class="col-12 OcultarElemento"  id="table_important">
								<table class="table " >
							  <thead class="thead-dark">
							    <tr>
							      <th scope="col">Id </th>
							      <th scope="col">Nombre Evento</th>
							      <th scope="col">Fecha</th>
							      <th scope="col">Importancia</th>
							      <th scope="col"> Comentarios</th>
							    </tr>
							  </thead>
							  <tbody>
							     <!-- AQUI SE COMIENZA A IMPRIMIR LA CONSULTA ASC -->
							  	 <?php foreach ($res_import as $fila) { ?>

							    <tr>
							      <th scope="row"><?php echo $fila  ["id"] ?></th>
							      <td><?php echo $fila  ["title"] ?></td>
							      <td> <?php echo $fila ["start"] ?> </td>

							      <?php if ( $fila ["importancia"] == 1 ) 
							      {
							      	$impor = "Urgente";
							      } else if ( $fila ["importancia"] == 2)
							      {
							      	$impor = "Alta";
							      }else{
							      	$impor = "Normal";
							      }
							      ?>
							      <td> <?php echo $impor ?>  </td>
							    </tr>
							     
							     <?php } ?>
							  </tbody>
							</table>
							</div>

							
							

						</div>
						
				</div><!-- AQUI TERMINA LAS CONSULTAS DE EVENTOS  -->


				<div class="col-10 text-left centro" style="margin-top: 20px">
						
						<h2 class="margeninterno">Actividades Pendientes</h2>
						
						<div class="row centro" style="margin-bottom: 40px">
							<div class="col-lg-3 ">
								<input type="button" name="btn_general_2" class="btn btn-primary" value="todos" id="btn_general_2">
							</div>

							<div class="col-lg-3 ">
								<input type="button" name="btn_asc_2" class="btn btn-primary" value="Ordenar ASC" id="btn_asc_2">
							</div>

							<div class="col-lg-3">
								<input type="button" name="btn_desc_2" class="btn btn-primary" value="Ordenar DESC" id="btn_desc_2">
							</div>


							<div class="col-lg-3">
								<input type="button" name="btn_importancia_2" id="btn_importancia_2" class="btn btn-primary" value="Ordenar por importancia">
							</div>
						</div>	

						<div class="row centro "  style="margin-bottom: 40px">
						<!-- PARA TODOS LOS EVENTOS GENERALES  SIN NINGUNT TIPO DE FILT-->

							<div class="col-12" id="table_general_2">
							    <table class="table" >
								  <thead class="thead-dark">
								    <tr>
								      <th scope="col">Id </th>
								      <th scope="col">Nombre Evento</th>
								      <th scope="col">Fecha</th>
								      <th scope="col"> Comentarios</th>
								    </tr>
								  </thead>

								  <tbody>
								  	<!-- AQUI SE COMIENZA A IMPRIMIR LA CONSULTA GENERAL -->
								  	 <?php foreach ($res_gnral_2 as $fila) { ?>

								    <tr>
								      <th scope="row"><?php echo $fila  ["id"] ?></th>
								      <td><?php echo $fila  ["title"] ?></td>
								      <td> <?php echo $fila ["start"] ?> </td>
								      <td></td>
								    </tr>
								     
								     <?php } ?>
								  </tbody>
								</table>

							</div>	
							

							<div class="col-12 OcultarElemento" id="table_asc_2">
								<table class="table "  >
							  <thead class="thead-dark">
							    <tr>
							      <th scope="col">Id  </th>
							      <th scope="col">Nombre Evento</th>
							      <th scope="col">Fecha</th>
							      <th scope="col"> Comentarios</th>
							    </tr>
							  </thead>
							  <tbody>
							    <!-- AQUI SE COMIENZA A IMPRIMIR LA CONSULTA ASC -->
							  	 <?php foreach ($res_asc_2 as $fila) { ?>

							    <tr>
							      <th scope="row"><?php echo $fila  ["id"] ?></th>
							      <td><?php echo $fila  ["title"] ?></td>
							      <td> <?php echo $fila ["start"] ?> </td>
							    </tr>
							     
							     <?php } ?>
							  </tbody>
							</table>
							

							</div>

							

							<div class="col-12 OcultarElemento"  id="table_desc_2">
								<table class="table " >
							  <thead class="thead-dark">
							    <tr>
							      <th scope="col">Id </th>
							      <th scope="col">Nombre Evento</th>
							      <th scope="col">Fecha</th>
							      <th scope="col"> Comentarios</th>
							    </tr>
							  </thead>
							  <tbody>
							  	 <!-- AQUI SE COMIENZA A IMPRIMIR LA CONSULTA DESC -->
							  	 <?php foreach ($res_desc_2 as $fila) { ?>

							    <tr>
							      <th scope="row"><?php echo $fila  ["id"] ?></th>
							      <td><?php echo $fila  ["title"] ?></td>
							      <td> <?php echo $fila ["start"] ?> </td>
							    </tr>
							     
							     <?php } ?>
							  </tbody>
							</table>
							
							</div>

							

							<div class="col-12 OcultarElemento"  id="table_important_2">
								<table class="table " >
							  <thead class="thead-dark">
							    <tr>
							      <th scope="col">Id </th>
							      <th scope="col">Nombre Evento</th>
							      <th scope="col">Fecha</th>
							      <th scope="col">Importancia</th>
							      <th scope="col"> Comentarios</th>
							    </tr>
							  </thead>
							  <tbody>
							     <!-- AQUI SE COMIENZA A IMPRIMIR LA CONSULTA ASC -->
							  	 <?php foreach ($res_import_2 as $fila) { ?>

							    <tr>
							      <th scope="row"><?php echo $fila  ["id"] ?></th>
							      <td><?php echo $fila  ["title"] ?></td>
							      <td> <?php echo $fila ["start"] ?> </td>

							      <?php if ( $fila ["importancia"] == 1 ) 
							      {
							      	$impor = "Urgente";
							      } else if ( $fila ["importancia"] == 2)
							      {
							      	$impor = "Alta";
							      }else{
							      	$impor = "Normal";
							      }
							      ?>
							      <td> <?php echo $impor ?>  </td>
							    </tr>
							     
							     <?php } ?>
							  </tbody>
							</table>
							</div>

							
							

						</div>
						
				</div>

								
			</div>

			<script src="../js/calendario.js"></script>
</body>
</html>