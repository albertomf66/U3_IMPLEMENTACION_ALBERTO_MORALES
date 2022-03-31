	<?php 
		session_start();
		$Usuario = $_SESSION['Usuario'];

		if( $Usuario == null || $Usuario == ''){
			header("Location: ../index.php");
		}

		include "ObtenerDatosProfesor.php";

		$NombreProfesor  = $filas[0];
		$PaternoAlumno = $filas[1];
		$MaternoAlumno = $filas[2];
	
		$conexion  = new PDO('mysql:host=localhost;dbname=estadia',"root","");
    	$res_gnral = $conexion->query(" Select tipo, Descripcion from notificacion_profesor where matricula_profesor = '$Usuario' ORDER BY idNotificacion_Profesor DESC LIMIT 5");

    	$res_gnral2 = $conexion->query(" Select tipo, Descripcion from notificacion_profesor where matricula_profesor = '$Usuario' ORDER BY idNotificacion_Profesor DESC LIMIT 5");
		$cont = 0;
		foreach ($res_gnral as $fila) 
		 {

		 	$cont= $cont+1;

		 }
	 ?>


<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Expires" content="0">
  	<meta http-equiv="Last-Modified" content="0">
  	<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
 	 <meta http-equiv="Pragma" content="no-cache">
	<title>Hola, <?php echo strtoupper($NombreProfesor) ?></title>
</head>

	<link rel="stylesheet" href="../css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.7/glider.min.css">
   <!--Estilos de la página, se agrega php para evitar generar cache -->
  <link rel="stylesheet" href="../css/estilos.css?v=<?php echo time();?>"> 
  <link href="../css/offcanvas.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@900&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">



<body>
		
   <!-- INICIAR NAVBAR  -->
<!-- Sécción referente al menú principal de INDEX.PHP-->
<div class="row">
	<div class="col-12 largo_nav" >
		<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light" aria-label="Main navigation">
  <div class="container-fluid">
  	
    <a class="navbar-brand" href="Profesor.php"><img src="../img/logo_upemor.png" width="70" style="margin-left: 10px;"></a>
    <button class="navbar-toggler p-100 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
	          <a class="nav-link active h4" aria-current="page" href="#" > 
	          	<div class="dropdown">
				  <button class="btn  dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
				   <i class="fas fa-bell fa-2X"></i> <span class="badge bg-secondary notificacion_tam" > <?php echo $cont ?> </span>
				  </button>
				  <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">

				  	<?php 
				  		foreach ($res_gnral2 as $fila_notify) {

				  			$tipo_conversion = "";
				  			if ( $fila_notify["tipo"] == "1"){
				  				$tipo_conversion = " Se ha Creado la clase ";
				  			}else if ( $fila_notify["tipo"] == "2" )
				  			{
				  				$tipo_conversion = " Se ha Creado la actividad ";
				  			}else if  ( $fila_notify["tipo"] == "3" ){
								$tipo_conversion = " Se ha Creado el evento ";
				  			}
		             ?>


		             	<li class="dropdown-item">  <?php echo $tipo_conversion." ".$fila_notify["Descripcion"] ?> </li>

				  <?php } ?>
				   
				  </ul>
				</div>


			  </a>
        </li>
       
        
       
      </ul>
   		
       <div class="dropdown" style="margin-right: 20px;">
		  <button class="btn dropdown-toggle perfil" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
		   <?php echo strtoupper($NombreProfesor)." ".strtoupper($PaternoAlumno);
		   		
		   		  if ($filas[3] == "1"){
            echo '<img  class="circularperfil" height="50" width="50" src="../img/avatar/img1.png">';
          }else if ($filas[3] == "2") {
            echo '<img  class="circularperfil" height="50" width="50" src="../img/avatar/img2.png">';
          }
          else if ($filas[3] == "3") {
            echo '<img  class="circularperfil" height="50" width="50" src="../img/avatar/img3.png">';
          }
          else if ($filas[3] == "4") {
            echo '<img  class="circularperfil" height="50" width="50" src="../img/avatar/img4.png">';
          }
          else if ($filas[3] == "5") {
            echo '<img  class="circularperfil" height="50" width="50" src="../img/avatar/img5.png">';
          }else if ($filas[3] == "6") {
            echo '<img  class="circularperfil" height="50" width="50" src="../img/avatar/img6.png">';
          }else {
            echo '<img  class="circularperfil" height="50" width="50" src="../img/login_user.svg">';
          }
          


		    ?>
		  </button>
		  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
		    <li><a class="dropdown-item active" name="PerfilProfe">Perfil</a></li>
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
<div class="container-fluid" style="paddin">


	   <!-- INLUIMOS EL MENU DE OPCIONES DE LOS ESTUDIANTES DESDE UN ARCHIBO PHP EXTERNO -->
    <div class="row">
     	<div class="col-lg-1 col-sm-12 menu_modulos position">
			<?php include 'MenuProfesor.php' ?>
		</div>


		<div class="col-lg-11  " style="margin-top: 40px" id="Contenido_General_Profesor">
			<?php include 'ContenidoGeneralProfesor.php' ?>
		</div>

       <!-- VISTAS DE CLASES  -->
       
		<div class="col-lg-11 OcultarElemento " style="margin-top: 40px" id="VerMisClases">
			<?php include 'VerMisClasesProfesor.php' ?>
		</div>

		<div class="col-lg-11 OcultarElemento " style="margin-top: 40px" id="AgregarClaseProfesor">
			<?php include 'AgregarClaseProfesor.php' ?>
		</div>


		<div class="col-lg-11 OcultarElemento " style="margin-top: 40px" id="EditarClasesProfesor">
			<?php include 'EditarClasesProfesor.php' ?>
		</div>
		

		<div class="col-lg-11 OcultarElemento " style="margin-top: 40px" id="EliminarClasesProfesor">
			<?php include 'EliminarClasesProfesor.php' ?>
		</div>

		
		<!-- VISTAS DE CALENDARIO -->
		
		<div class="col-lg-11 OcultarElemento " style="margin-top: 40px" id="VerEventosProfesor">
			<?php include 'VerEventosProfesor.php' ?>
		</div>

		<div class="col-lg-11 OcultarElemento " style="margin-top: 40px" id="PerfilProfe">
			<?php include 'PerfilProfesores.php' ?>
		</div>


		<div class="col-lg-11 OcultarElemento " style="margin-top: 40px" id="AgregarEventoProfesor">
			<?php include 'AgregarEventoProfesor.php' ?>
		</div>
		 
		

		<div class="col-lg-11 OcultarElemento " style="margin-top: 40px" id="EditarEventoProfesor">
			<?php include 'EditarEventoProfesor.php' ?>
		</div>
        

        <div class="col-lg-11 OcultarElemento " style="margin-top: 40px" id="EliminarEventoProfesor">
		       <?php include 'EliminarEventoProfesor.php' ?>
		</div>

		<div class="col-lg-11 OcultarElemento " style="margin-top: 40px" id="Reportes">
		       <?php include 'Reportes.php' ?>
		</div>
		 		
		<div class="col-lg-11 OcultarElemento " style="margin-top: 40px" id="AgregarActividadSimple">
			<?php include 'AgregarActividadSimple.php' ?>
		</div>


		<div class="col-lg-11 OcultarElemento " style="margin-top: 40px" id="AgregarActividadDinamica">
			<?php include 'AgregarActividadDinamica.php' ?>
		</div>

		<div class="col-lg-11 OcultarElemento " style="margin-top: 40px" id="EditarActividades">
			<?php include 'EditarActividades.php' ?>
		</div>


		<!-- VISTAS NOTAS -->
		<div class="col-lg-11 OcultarElemento " style="margin-top: 40px" id="VerMisNotasProfesor">
			<?php include 'VerMisNotasProfesor.php' ?>
		</div>

	

	   
   <!-- 
   
		 

       
html comment -->

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
 
  <script src="../js/Profesor.js?v=<?php echo time();?>"></script>
  <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>