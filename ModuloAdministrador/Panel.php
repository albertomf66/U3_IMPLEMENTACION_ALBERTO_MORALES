<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>


			<div class="row " > 
				<div class="col-12 centro " style="margin-top: 20px ; ">
						
						<h2 class="margeninterno">Panel de Administración</h2>
						
						<div class="row"> 
							<div class="col-lg-4" style=""> 

								<div class="card text-center estilos_card" >
								   <button onclick="IrGestionUsuarios()">
									  <div class="card-header">
									   	 Gestionar Usuarios
									  </div>
									  <div class="card-body">
									   	<i class="fas fa-users-cog fa-7x"></i>
									  </div>
									 </button>
								</div>
							</div>

							<div class="col-lg-4"> 
								<div class="card text-center estilos_card" >
									<button onclick="IrGestionReportes()">
									  <div class="card-header">
									   	 Gestionar Reportes
									  </div>
									  <div class="card-body">
									 <i class="fas fa-file-invoice fa-7x"></i>
									  </div>
									</button>
								</div>
							</div>


						<div class="col-lg-4" style="margin-bottom: 50px;"> 
								<div class="card text-center estilos_card" >
									<button onclick="IrRespaldoBD()">
									  <div class="card-header">
									   	 Respaldo de BD
									  </div>
									  <div class="card-body">
									    <i class="fas fa-database fa-7x"></i>
									  </div>
									</button>
								</div>
							</div>

							
						</div>	
						
				</div>
			</div>
</body>
</html>