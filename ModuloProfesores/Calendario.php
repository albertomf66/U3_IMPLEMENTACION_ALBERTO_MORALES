
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


   ?>

<?php

  require_once "../global.php"; 
  

  try
  {
    $conexion  = new PDO('mysql:host=localhost;dbname=estadia',"root","");
    $result = $conexion->query("SELECT idEventosActividad as id,  title,start,color,
      matricula_profesor FROM eventosprofesor");

    //foreach ($result as $fila ) {
    //  echo $fila ["title"];
    //  echo $fila ["start"];
    //  echo $fila ["color"];
    //  echo "<br>";
    //}
    //

  }catch (PDOExeption $e)
  {
    echo "nel";
  }




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
  <title>Calendario</title> 
  

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
            
            <h2 class="margeninterno">  Gestionar Eventos</h2>
            
             <div class="row">
              <div class="col-lg-12 ">
                <div class="container">
                   <div id='calendar'>
                  
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
    <script src="../js/fullcallendar_inicio.js"></script>
  <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
  
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    <script>
    
 var  Modal = new bootstrap.Modal(document.getElementById('mymodal'));
 var  form = document.getElementById("formulario_calendario");
 document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          locale: 'es',
          headerToolbar:
          {
            left: 'prev,next,today',
            center: 'title',
            right: 'dayGridMonth, timeGridWeek, listWeek'
          },
          events:[
          <?php foreach ($result as $fila ) {  

              if ( $fila["matricula_profesor"]  == $Usuario) {
            ?>
          {
            id:"<?php  echo $fila ["id"]; ?>",
            title: "<?php  echo $fila ["title"]; ?>",
            start: "<?php  echo $fila ["start"]; ?>",
            color: "<?php  echo $fila ["color"]; ?>"
          },


      <?php
          }
           }?>
          ],


        
          dateClick: function(info){
            document.getElementById("start").value = info.datesrt;  
            document.getElementById("titulo").textContent = "Registro de Evento";
            document.getElementById("btn_registro_evento").classList.remove('d-none');
            document.getElementById("btn_elimina").classList.add('d-none');
            document.getElementById("btn_editar").classList.add('d-none');
            document.getElementById("nombre_evento").value = "";
            Modal.show();
          },
          eventClick: function(info)
          {
            console.log(info);
            document.getElementById("titulo").textContent = "Edición de Evento";
            document.getElementById("btn_editar").classList.remove('d-none');
            document.getElementById("nombre_evento").value = info.event.title;
              document.getElementById("btn_elimina").classList.remove('d-none');
            document.getElementById("id").value = info.event.id;
            document.getElementById("start").value = info.event.startStr;
            document.getElementById("color").value = info.event.backgroundColor;
            document.getElementById("btn_registro_evento").classList.add('d-none');
            Modal.show();
          }

        });
        calendar.render();
        form.addEventListener("submit", function(e){
          e.preventDefault();
          const Nombre_Evento = document.getElementById("nombre_evento").value;
          const Fecha = document.getElementById("start").value;
          const Color = document.getElementById("color").value;
          const Mat_Profe = document.getElementById("profe_ev").value;
          const importancia = document.getElementById("importancia").value;

          if ( Nombre_Evento == "" || Fecha == "" || Color == "") 
          {
            Swal.fire({
              icon: 'warning',
              title: 'Opps!!',
              text: 'Debes de rellenar todos los campos ',  
              showConfirmButton: true,
              timer: 3000
            })  
          }else{
            console.log("NOMBRE:"+Nombre_Evento+"FECHA: "+Fecha+" COLOR: "+Color+ " Mat_Profe : "+ Mat_Profe+" importancia: "+ importancia);
                 $.ajax({
            url: '../ModuloProfesores/InsertarEventoProfesor.php',
            type: 'POST',
            data: "nombreevento="+Nombre_Evento+"&Fecha="+Fecha+"&Color="+Color+"&Mat_Profe="+Mat_Profe+"&importancia="+importancia+"&control="+"0",
            success: function(data) {

                
                Modal.hide();   
                  setTimeout('redireccion()',1000);
                Swal.fire({
                  icon: 'success',
                  title: 'Se ha completado',
                  text: 'El Evento se ha registrado exitosamente!!',
                  showConfirmButton: true,
                  timer: 1000
                  

                })

                     
                      }
                  }); 

          }// TERMINA ELSE 


        })
      });

    
    const EditarEvento = document.getElementById("btn_editar").addEventListener('click',(e)=>{
 
     e.preventDefault();
     const Nombre_Evento = document.getElementById("nombre_evento").value;
          const Fecha = document.getElementById("start").value;
          const Color = document.getElementById("color").value;
          const Mat_Profe = document.getElementById("profe_ev").value;
          const importancia = document.getElementById("importancia").value;
          const Id = document.getElementById("id").value;
              

                datos = {"id":Id};
                $.ajax({
                url: '../ModuloProfesores/ConsultaControl.php',
                type: 'POST',
                data: datos ,
            }).done(function(respuesta){
                if (respuesta.estado == "ok" ) {
                    console.log(JSON.stringify(respuesta));
                    // Al recibir mediante "respuesta" un ok significa que ya hay por lo menos un 
                    // registro dentro de la base de datos por lo tanto se insertará 
                    // uno más llamando a la función InsertarElementoActividad
                    var fila = respuesta.fila;

                  Swal.fire({
                      icon: 'warning',
                      title: 'No es posible la acción',
                      text: 'No se puede Editar el elemento.',
                      showConfirmButton: true,
                      timer: 1000
                    })


           
                }else{
                    var fila = respuesta.fila;

                    $.ajax({
                    url: '../ModuloProfesores/UpdateEventoProfesor.php',
                    type: 'POST',
                    data: "nombreevento="+Nombre_Evento+"&Fecha="+Fecha+"&Color="+Color+"&Mat_Profe="+Mat_Profe+"&importancia="+importancia+"&Id="+Id,
                    success: function(data) 
                    {
                          setTimeout('redireccion()',1000);
                        Modal.hide();   
                       
                        Swal.fire({
                          icon: 'success',
                          title: 'Se ha completado',
                          text: 'El Evento se ha Editado exitosamente!!',
                          showConfirmButton: true,
                          timer: 1000
                          })// SWAL 
                      }// SUCCESS
                  }); // AJAX INTERN UPDATE. 
                }
            }); // TERMINA AJAX DE CONSULTA DE EVENTO (CONTROL)








        

   });
          




     const EliminarEvento = document.getElementById("btn_elimina").addEventListener('click',(e)=>{
    
     e.preventDefault();
    
          const Id = document.getElementById("id").value;


                datos = {"id":Id};
                $.ajax({
                url: '../ModuloProfesores/ConsultaControl.php',
                type: 'POST',
                data: datos ,
            }).done(function(respuesta){
                if (respuesta.estado == "ok" ) {
                    console.log(JSON.stringify(respuesta));
                    // Al recibir mediante "respuesta" un ok significa que ya hay por lo menos un 
                    // registro dentro de la base de datos por lo tanto se insertará 
                    // uno más llamando a la función InsertarElementoActividad
                    var fila = respuesta.fila;

                  Swal.fire({
                      icon: 'warning',
                      title: 'No es posible la acción',
                      text: 'No se puede Eliminar el elemento.',
                      showConfirmButton: true,
                      timer: 1000
                    })


           
                }else{
                    var fila = respuesta.fila;
                    $.ajax({
                      url: '../ModuloProfesores/DeleteEventoProfesor.php',
                      type: 'POST',
                      data: "&Id="+Id,
                      success: function(data) {
                            setTimeout('redireccion()',1000);
                          
                          Modal.hide();   
                          
                          Swal.fire({
                            icon: 'success',
                            title: 'Se ha completado',
                            text: 'El Evento se ha Eliminado exitosamente!!',
                            showConfirmButton: true,
                            timer: 1000
                            })
                        }//SUCCESS  END
                      }); 
                }
            }); // TERMINA AJAX DE CONSULTA DE EVENTO (CONTROL)




   });//TERMINA FUNCION ELIMINAR EVENTO 
       


     function redireccion() 
     {
          window.location = "Calendario.php";
      }

          
  </script>

 
</body>
</html>