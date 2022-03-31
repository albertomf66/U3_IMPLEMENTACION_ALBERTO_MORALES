<?php 
	

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
					
						<h2 class="margeninterno">Profesor: <?php echo strtoupper( $_SESSION['Usuario'])  ?></h2>
										
				</div>
			</div>


			<div class="row "> 
				<div class="col-10 text-left centro" style="margin-top: 20px">
						
						<h2 class="margeninterno">  Reportes </h2>
						
						<div class="row margeninterno" style="margin-bottom: 25px;">
							<div class="col-3">
								<input type="button" name="btn_indice" class="btn btn-primary" value="Indice de Entrega" id="btn_indice" onclick="IndiceBtn()">
							</div>

							<div class="col-3">
								<input type="button" name="btn_calificaciones" class="btn btn-primary" value="Indice de Calificaciones" id="btn_calificaciones" onclick="Calificacionesbtn()">
							</div>

							<div class="col-3">
								<input type="button" name="CompararClases" class="btn btn-primary" value="Comparar Clases" id="CompararClases" onclick="ComparaClase()">
							</div>
						</div>	
						
				</div>
			</div>
</body>
</html>