
<?php 
  
    $NombreClase  = $_POST["name_clase"];
    $CodClase  = $_POST["cod_clase"];

    
    session_start();
    $Usuario = $_SESSION['Usuario'];

    if( $Usuario == null || $Usuario == ''){
      header("Location: ../index.php");
    }

    include "ObtenerDatosProfesor.php";

    $NombreProfesor  = $filas[0];
    $PaternoAlumno = $filas[1];
    $MaternoAlumno = $filas[2];


    // CONEXION A LA BASE DE DATOS
  $conexion  = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME_BD);
  $consulta2 = "SELECT COUNT(matricula_alumno) FROM clase_alumno_profesor where codigoclase = '$CodClase'";
  $resultado2 = mysqli_query($conexion,$consulta2);

  $filas2 = mysqli_fetch_row($resultado2);
  $cant =  $filas2 [0];
 


  mysqli_free_result($resultado2);
  mysqli_close($conexion);

   ?>



  <?php 
 

  $ClaseProfesor = [
         'Clase' => []
     ];
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
  mysqli_close($conexion);

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
          
          if ($filas[3] != "1"){
            echo '<img  class="circularperfil" height="50" width="50" src="../img/avatar/img1.png">';
          }else if ($filas[3] != "2") {
            echo '<img  class="circularperfil" height="50" width="50" src="../img/avatar/img2.png">';
          }
          else if ($filas[3] != "3") {
            echo '<img  class="circularperfil" height="50" width="50" src="../img/avatar/img3.png">';
          }
          else if ($filas[3] != "4") {
            echo '<img  class="circularperfil" height="50" width="50" src="../img/avatar/img4.png">';
          }
          else if ($filas[3] != "5") {
            echo '<img  class="circularperfil" height="50" width="50" src="../img/avatar/img5.png">';
          }else if ($filas[3] != "6") {
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

 

  <div class="row ">
        <div class="col-8 text-left centro">
           <div class="row">
             <div class="col-10">
               <h2 class="margeninterno">Profesor: <?php echo strtoupper( $_SESSION['Usuario'])."            "  ?> </h2>
             </div>

             <div class="col-2 " style="margin-top: 25px;" >
               <a href="Profesor.php"> <input type="button" value="Regresar al Menú" class="btn btn-dark"></a>
            </div>
           </div>
            
                    
        </div>
        

  </div>



  <div class="row "> 
        <div class="col-10 text-left centro" style="margin-top: 20px">
            
            <div class="row">
              <div class="col-8">
                <h2 class="margeninterno"> CLASE : <?php echo $NombreClase ?></h2>
              </div>
              <div class="col-3">
                <h2 class="margeninterno">  # ALUMNOS:  <?php echo $cant ?></h2>
              </div>
            </div>

            <div class="row " style="margin-bottom:20px; margin-top: 10px;">
              <div class="col-12">
                  
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                          Lista de Alumnos
                        </button>
                      </h2>
                      <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse " aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                            
                            <div class="col-12" >
                              <table class="table "  >
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">Matricula Alumno:   </th>
                                  <th scope="col">Nombre Alumno </th>
                                  <th scope="col"> Eliminar </th>
                                </tr>
                              </thead>
                              <tbody>
                                <!-- AQUI SE COMIENZA A IMPRIMIR LA CONSULTA ASC -->
                                 <?php 
                                  for ($i=0; $i <(sizeof($ClaseProfesor['Clase'])); $i++) { 
                                 ?>  
                                <tr>
                                  <th scope="row"> <?php  echo $ClaseProfesor['Clase'][$i][1] ?>  </th>
                                  <td> <?php  echo $ClaseProfesor['Clase'][$i][2] ?></td>
                                  <td> 
                                    <button type="button" class="btn btn-danger" onclick="Eliminar_Alumno_clase('<?php  echo $ClaseProfesor['Clase'][$i][0] ?>')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                  </td>
                                </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                            

                            </div>


                      </div>
                    </div>
                </div>


 

              </div>
            </div>
            
            

          <div class="modal fade" id="mymodal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="mymodal" aria-hidden="true">
              <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-info">
                <h5 class="modal-title" id="titulo"></h5>
                <button type="button" class=" btn-close" data-bs-dismiss="modal" aria-label="Close">
                  
                </button>
                </div>
            |      
                <form action="" id="formulario_calendario">
                    <div class="modal-body">
                      <div class="mb-3 ">
                        <input type="text" name="id" id="id"  hidden="true">
                      <label for="nombre_evento" class="form-label" > Nombre Evento </label>
                      <input type="text" class="form-control" id="nombre_evento" name="nombre_evento">
                     </div>

                     <div class="mb-3 ">
                      <label for="start" class="form-label" > Fecha </label>
                      <input type="date" class="form-control" id="start" name="start">
                     </div>

                     <label for="importancia" class="form-label" > Importancia </label>

                     <select class="form-select" aria-label="Default select example" id="importancia" name="importancia">
                      <option value="3">Normal</option>
                      <option value="2">Alta</option>
                      <option value="1">Urgente</option>
                    </select>

                     <div class="mb-3 " style="margin-top: 10px">
                      <label for="profe_ev" class="form-label" > Profesor </label>
                      <input type="text" class="form-control" id="profe_ev" name="profe_ev" disabled="" value="<?php echo $Usuario ?>">
                     </div>

                     <div class="mb-3 " style="margin-top: 10px">
                      <label for="color" class="form-label" > Color Evento </label>
                      <input type="color" class="form-control" id="color" name="color">
                     </div>
                     
                  </div>

                  <div class="modal-footer">
                    
                     <button class="btn btn-danger" id="btn_elimina"> Eliminar </button>

                     <button class="btn btn-info" id="btn_editar" type="submit"> Editar</button>
                     <button class="btn btn-info" id="btn_registro_evento" type="submit"> Registrar</button>
                  </div>
                 
                 
                </form> 

              </div>
              </div>
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