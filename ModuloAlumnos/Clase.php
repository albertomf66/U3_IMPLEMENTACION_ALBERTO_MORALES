
<?php 
  
    $NombreClase  = $_POST["name_clase"];
    $CodClase  = $_POST["cod_clase"];

    
    session_start();
    $Usuario = $_SESSION['Usuario'];

    if( $Usuario == null || $Usuario == ''){
      header("Location: ../index.php");
    }

 include "ObtenerDatosAlumno.php";

    $NombreAlumno  = $filas[0];
    $PaternoAlumno = $filas[1];
    $MaternoAlumno = $filas[2];
   ?>


  <?php 

  // CONEXION A LA BASE DE DATOS
  //$conexion  = mysqli_connect("localhost","root","123","estadia");
  $conexion  = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME_BD);
    
  $consulta = " Select * from clase_alumno_profesor where codigoclase = '$CodClase' ";
  $resultado = mysqli_query($conexion,$consulta);


  $ClaseProfesor = array('Clase' => array());
  while ($ResultadoClase=mysqli_fetch_array($resultado))
  {
    array_push($ClaseProfesor['Clase'],
    array($ResultadoClase['idClase_Alumno_Profesor'],$ResultadoClase['matricula_alumno'],$ResultadoClase['codigoclase']));
  }
  //$filas = mysqli_fetch_row($resultado);
 

  mysqli_free_result($resultado);
  //mysqli_close($conexion);

  $conexion  = new PDO('mysql:host=localhost;dbname=estadia',"root","");
      $res_gnral = $conexion->query(" Select tipo, Descripcion from notificacion_alumno where matricula_alumno = '$Usuario' ORDER BY idNotificacion_Alumno DESC LIMIT 5");

      $res_gnral2 = $conexion->query(" Select tipo, Descripcion from notificacion_alumno where matricula_alumno = '$Usuario' ORDER BY idNotificacion_Alumno DESC LIMIT 5");


      $idactividades = $conexion->query("Select idActividades from actividadclaseprofesor where codigoclase = '$CodClase'");


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
  <title> <?php echo  $NombreClase ?>  </title> 
  

   <link rel="stylesheet" href="../css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.7/glider.min.css">
    <link rel="stylesheet" href="../css/estilos.css?v=<?php echo time();?>"> 
  <link href="../css/offcanvas.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@900&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="../css/main.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.7/glider.min.css">
  <link rel="stylesheet" href="../css/calendario.css">
</head>
<body> 

   <!-- INICIAR NAVBAR  -->
<!-- Sécción referente al menú principal de INDEX.PHP-->
<div class="row" style="margin-bottom: 3%">
  <div class="col-12 largo_nav" >
    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light" aria-label="Main navigation">
  <div class="container-fluid">
    
    <a class="navbar-brand" href="Alumno.php"><img src="../img/logo_upemor.png" width="70" style="margin-left: 10px;"></a>
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
                  $tipo_conversion = " Se ha ";
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
         <?php echo strtoupper($NombreAlumno)." ".strtoupper($PaternoAlumno);
          
          if ($filas[3] == "1"){
            echo '<img  class="circularperfil" height="60px" width="60px" src="../img/avatar/img1.png">';
          }else if ($filas[3] == "2") {
            echo '<img  class="circularperfil" height="60px" width="60px" src="../img/avatar/img2.png">';
          }
          else if ($filas[3]  == "3") {
            echo '<img  class="circularperfil" height="60px" width="60px" src="../img/avatar/img3.png">';
          }
          else if ($filas[3]  =="4") {
            echo '<img  class="circularperfil" height="60px" width="60px" src="../img/avatar/img4.png">';
          }
          else if ($filas[3]  == "5") {
            echo '<img  class="circularperfil" height="60px" width="60px" src="../img/avatar/img5.png">';
          }else if ($filas[3]  == "6") {
            echo '<img  class="circularperfil" height="60px" width="60px" src="../img/avatar/img6.png">';
          }else {
            echo '<img  class="circularperfil" height="60px" width="60px" src="../img/login_user.svg">';
          }
          


        ?>
      </button>
       <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
        <li><a class="dropdown-item active" name="PerfilAlumnos">Perfil</a></li>
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

 

  <div class="row ">
        <div class="col-8 text-left centro">
           <div class="row">
             <div class="col-10">
               <h2 class="margeninterno">Alumno: <?php echo strtoupper( $_SESSION['Usuario'])."            "  ?> </h2>
             </div>

             <div class="col-2 " style="margin-top: 25px;" >
               <a href="Alumno.php"> <input type="button" value="Regresar al Menú" class="btn btn-dark"></a>
            </div>
           </div>
            
                    
        </div>
        

  </div>



  <div class="row "> 
        <div class="col-10 text-left centro" style="margin-top: 20px">
            
          
            <div class="row " style="margin-bottom:20px; margin-top: 10px;">
                <h2 class="margeninterno"> Actividades </h2>


          <?php 
            foreach ($idactividades as $filaidActividad) 
            {
              $temp = $filaidActividad['idActividades'];
              $conexion  = new PDO('mysql:host=localhost;dbname=estadia',"root","");
              $Activ = $conexion->query(" SELECT * FROM actividades WHERE idActividades  = '$temp' ");

                foreach ($Activ as $ActivFila) {

                    if ( $ActivFila["tipo_evidencia"]  == "DM")
                    {
                        ?>  
                      <form action="Ahorcado.php" method="POST">
                        <div class="col-lg-12"> 
                            <div class="card text-center estilos_card" >
                                <input type="text" hidden="true" value="<?php echo $temp ?>" name = "idActividad">

                                <div class="card-header">
                                 Nombre:   <?php echo  $ActivFila["nombre_actividad"] ?>
                                </div>
                                <div class="card-body">
                                  <h5 class="card-title"> Descripción:  <?php echo $ActivFila["descripcion_actividad"]; ?> </h5>
                                  <p class="card-text"> Fecha de Entrega:  <?php echo $ActivFila["FechaEntrega"];  ?></p>

                                  <input type="submit" name="" value="Comenzar Test" class="btn btn-primary">
                                </div>
                                <div class="card-footer text-muted">
                                  2 days ago
                                </div>
                            </div>
                          </div>
                        </form>


                        <?php 
                    }else{
                       ?>
                         <div class="col-lg-3"> 

                            <div class="card text-center estilos_card" >
                                <div class="card-header">
                                 Nombre:   <?php echo  $ActivFila["nombre_actividad"] ?>
                                </div>
                                <div class="card-body">
                                  <h5 class="card-title"> Descripción:  <?php echo $ActivFila["descripcion_actividad"]; ?> </h5>
                                  <p class="card-text"> Fecha de Entrega:  <?php echo $ActivFila["FechaEntrega"];  ?></p>

                                  <a href="#" class="btn btn-primary"> Entregar </a>
                                </div>
                                <div class="card-footer text-muted">
                                  2 days ago
                                </div>
                            </div>
                          </div>
                       <?php 

                    }
                  ?>



                  

                  <?php 
                }


            } 
          ?>    

             


            </div>
            

    
        
            
        </div>
    </div>

  
 

 


    <script src="../js/jquery.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.7/glider.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/moment.js"></script>
    <script src="../js/main.min.js"></script>
    <script src="../js/es.js"></script>
    <script src="../js/clase.js"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>


 
</body>
</html>