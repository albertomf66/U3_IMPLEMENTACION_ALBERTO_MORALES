	<?php 
		session_start();
		$Usuario = $_SESSION['Usuario'];

		if( $Usuario == null || $Usuario == ''){
			header("Location: ../index.php");
		}

		include "ObtenerDatosAdministrador.php";
		

		$Nombre = $filas[0];
		$Paterno= $filas[1];
		$Materno = $filas[2];


	 ?>


<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Expires" content="0">
  	<meta http-equiv="Last-Modified" content="0">
  	<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
 	 <meta http-equiv="Pragma" content="no-cache">
	<title>Hola, <?php echo strtoupper($Nombre) ?></title>
</head>

	<link rel="stylesheet" href="../css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.7/glider.min.css">
   <!--Estilos de la página, se agrega php para evitar generar cache -->
  <link rel="stylesheet" href="../css/estilos.css?v=<?php echo time();?>"> 
  <link href="../css/offcanvas.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@900&display=swap" rel="stylesheet">
	

<body>
		
   <!-- INICIAR NAVBAR  -->
<!-- Sécción referente al menú principal de INDEX.PHP-->
<div class="row">
	<div class="col-12 largo_nav" >
		<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light" aria-label="Main navigation">
  <div class="container-fluid">
  	
    <a class="navbar-brand" href="Administrador.php"><img src="../img/logo_upemor.png" width="70" style="margin-left: 10px;"></a>
    <button class="navbar-toggler p-100 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
	          <a class="nav-link active h4" aria-current="page" href="#" > 
	          	<button type="button" class="btn " >
	 				<i class="fas fa-bell fa-2X"></i> <span class="badge bg-secondary notificacion_tam" >1</span>
				</button>
			  </a>
        </li>
       
        
       
      </ul>
   		
       <div class="dropdown" style="margin-right: 20px;">
		  <button class="btn dropdown-toggle perfil" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
		   <?php echo strtoupper($Nombre)." ".strtoupper($Paterno);
		   		if ($filas[3] != Null){
		   			echo '<img  class="circular" height="50" width="50" src="data:image/jpeg;base64,'.base64_encode($filas[3]).'"/>';
		   		}else{
		   			echo '<img  class="circular" height="50" width="50" src="../img/login_user.svg">';
		   		}
		   		
		    	 ?>
		  </button>
		  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
		    <li><a class="dropdown-item active" href="#">Perfil</a></li>
		    <li><hr class="dropdown-divider"></li>
		    <li><a class="dropdown-item" href="../CerrarSesion.php">Cerrar Sesión</a></li>
		  </ul>
		</div>


    </div>

   

  </div>
</nav>
<!-- END INICIAR NAVBAR  -->
	</div>
</div>

 


<!-- CONTAINER PRIMARIO  CON CLASE CONTAINER-FLUID PERMITE QUE SE EXPANDA DICHA ETIQUETA POR TODO EL ANCHO-->
<div class="container-fluid">


	<div class="row ">
	     <div class="col-10 text-left centro" style="margin-top: 40px">
					
		<h2 class="margeninterno">Administrador: <?php echo strtoupper( $_SESSION['Usuario'])."  "  ?> </h2>
										
	    </div>
	</div>


	   <!-- INLUIMOS EL MENU DE OPCIONES DE LOS ESTUDIANTES DESDE UN ARCHIBO PHP EXTERNO -->
    <div class="row ">
     	
    	

		<div class="col-lg-12  " style="margin-top: 40px;" id="PanelAdmin">
			<?php include 'Panel.php' ?>
		</div>

		<div class="col-lg-12 OcultarElemento " style="margin-top: 40px;" id="GestionarUsuariosAdmin">
			<?php include 'GestionarUsuariosAdmin.php' ?>
		</div>

      	<div class="col-lg-12 OcultarElemento " style="margin-top: 40px;" id="GestionReportesAdmin">
			<?php include 'GestionReportesAdmin.php' ?>
		</div>

		<div class="col-lg-12 OcultarElemento " style="margin-top: 40px;" id="RespaldarBD">
			<?php include 'RespaldarBD.php' ?>
		</div>


	</div>
 </div>





  <!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted separacion_input-sesion ">


  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Desarrollado Por:
    <a >Alberto Morales Flores como Proyecto de Estadía</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->




  <script src="../js/jquery.js"> </script>
  <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.7/glider.min.js"></script>
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/offcanvas.js"></script>
 
  <script src="../js/Administrador.js?v=<?php echo time();?>"></script>
  <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>