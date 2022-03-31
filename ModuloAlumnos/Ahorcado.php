
<?php 
  
    $idActividad  = $_POST["idActividad"];
 

    
    session_start();
    $Usuario = $_SESSION['Usuario'];

    if( $Usuario == null || $Usuario == ''){
      header("Location: ../index.php");
    }

 include "ObtenerDatosAlumno.php";

    $NombreAlumno  = $filas[0];
    $PaternoAlumno = $filas[1];
    $MaternoAlumno = $filas[2];

  $consulta_cant = "SELECT COUNT(*) FROM preguntasactividad WHERE idActividades = '$idActividad '";
  $resultado_cant = mysqli_query($conexion,$consulta_cant);

  $filas_cant = mysqli_fetch_row($resultado_cant);

  $consulta_uno = "SELECT * FROM preguntasactividad WHERE idActividades = '$idActividad' LIMIT 1";
  $resultado_uno  = mysqli_query($conexion,$consulta_uno);

  $filas_uno = mysqli_fetch_row($resultado_uno);
 // echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
  //echo   $filas_cant[0];
   ?>



   <html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> <?php echo  $NombreAlumno." ".$PaternoAlumno?>  </title> 
  

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
<body  > 

   <!-- INICIAR NAVBAR  -->
<!-- Sécción referente al menú principal de INDEX.PHP-->


 

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



  <div class="row " id="AhorcadoBody"> 
        <div class="col-10 text-left centro" style="margin-top: 20px">
            <input type="text" id="cant_pregunta" value="<?php echo $filas_cant[0] ?>"  hidden = "true">

            <input type="text" id="contador_pregunta" value="1"  hidden = "true">
            <div class="row">
              <div class="col-4">
                 <h5 class="margeninterno text-center" > *Tienes  3 intentos</h5>
              </div>

               <div class="col-4">
                 <h5 class="margeninterno text-center" id="intentos"> </h5>
              </div>


               <div class="col-4">
                 <h5 class="margeninterno text-center" id="num_pregunta">  </h5>
              </div>
            </div>


              
              <div class="row">
                <div class="col-8">
                  <div class="row">
                     <div class="col-12">
                        <h5 class="margeninterno "> Pregunta: </h5>
                     </div>
                     <div class="col-12">
                       <h2 class="margeninterno " id="preguntah2"> 
                          <?php echo $filas_uno[2] ?>
                        </h2>
                        <input type="text" name="" id="idAct_registro" value="<?php echo $idActividad ?>"  hidden = "true">
                        <input type="text" id="respuesta" value="<?php echo $filas_uno[3] ?>" hidden = "true">
                     </div>
                  </div>
                   
                </div>

                 <div class="col-4" style="margin-bottom: 30px; ">
                   <div class="row">
                      <div class="col-12">
                         <img src="../img/ahorcado/1.png" alt="" width="60%" id="img_ahorcado">
                      </div>
                   </div>
                </div>

            <div class="row " style="margin-top: -30px; margin-left: 15px">
              <div class="col-3">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="entrada_letra" name="entrada_letra" placeholder="name@example.com">
                  <label for="entrada_letra"> Letra </label>
                </div>
              </div>

              <div class="col-3">
                <input type="button" value="Comprobar"  class="btn btn-primary " style="height: 60px;" id="btn_comprobacion" name="btn_comprobacion">
              </div>


                 <div class="col-6 text-right" style="padding-top: 20px; ">
                         <div class="row" >
                           <div class="col">
                             <h4 id="frase"> </h4>
                           </div>
                         </div>

                         <div class="row" style="margin-top: -25px;">
                           <div class="col">
                            <h2 id="tamanio_nuevo">
                             <?php 

                               $tamanio = strlen($filas_uno[3]);
                               
                               $array = array(" _ ");
                               for ($i=0; $i < $tamanio ; $i++) { 
                                  array_push($array," _ ");
                               }
                               
                               for ($i=0; $i < $tamanio ; $i++) { 
                                 echo $array[$i];
                               }
                              ?>
                            </h2>
                           </div>
                         </div>
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
    <script src="../js/Ahorcado.js"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>


 
</body>
</html>