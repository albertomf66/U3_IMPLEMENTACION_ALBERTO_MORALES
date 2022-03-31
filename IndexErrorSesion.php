<?php 
      




 ?>


<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Expires" content="0">
  <meta http-equiv="Last-Modified" content="0">
  <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
  <meta http-equiv="Pragma" content="no-cache">
  
  <title>Bienvenido</title>
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.7/glider.min.css">
   <!--Estilos de la página, se agrega php para evitar generar cache -->
  <link rel="stylesheet" href="css/estilos.css?v=<?php echo time();?>"> 
  <link href="css/offcanvas.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@900&display=swap" rel="stylesheet">
       
</head>
<body  id = "IniciarSesion">


<!-- INICIAR NAVBAR  -->
<!-- Sécción referente al menú principal de INDEX.PHP-->
 <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light" aria-label="Main navigation">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="img/logo_upemor.png" width="40"></a>
    <button class="navbar-toggler p-100 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active h4" aria-current="page" href="#"> <i class="fas fa-home iconos_menu"></i>Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link h4" href="#"><i class="fas fa-user-graduate iconos_menu"></i>¿Qué Somos?</a>
        </li>
        <li class="nav-item">
          <a class="nav-link h4" href="#"><i class="fas fa-chart-bar iconos_menu" ></i>Beneficios</a>
        </li>
       
      </ul>
      <div class="d-flex" >

        <button class="btn btn-primary " type="button" data-bs-target="#InicioSesion" data-bs-toggle="modal" data-bs-dismiss="modal"> <i class="fas fa-sign-in-alt iconos_menu"></i>Iniciar Sesión</button>

     

      
        


      </div>
    </div>
  </div>
</nav>
<!-- END INICIAR NAVBAR  -->


<!-- CONTAINER PRIMARIO  CON CLASE CONTAINER-FLUID PERMITE QUE SE EXPANDA DICHA ETIQUETA POR TODO EL ANCHO-->
<div class="container-fluid">


        <div class="modal fade" id="InicioSesion" aria-hidden="true" aria-labelledby="Inicio de Sesion" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

            

                <form action="ValidarLogin.php" method="POST">

                  <div class="modal-body">

                    <div class="row ">

                          
                    <div class="col-12  Boton_cerrar">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"  ></button>
                    </div>
                    
                    </div>


                    <div class="row">
                       <div class="d-none d-lg-block col-md-3 col-lg-5">
                         <img src="img/Upemor.jpg" alt="" height="427px" >
                       </div> 

                        <div class="col-lg-7 color2">
                         <div class="row">
                           <div class="col color1 text-center ">
                              <h2 class="tamanio_inicia">Iniciar Sesión</h2>
                           </div>
                         </div>
                         
                         <div class="row separacion_input-sesion"> <!-- INICIA LA FILA QUE CONTIENE EL INPUT DE USUARIO -->
                          <div style="text-align: left;">
                                <label for="Usuario" class="estilos_label"> Matricula:</label>
                              </div>
                           <div class="input-group flex-nowrap">

                            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user-circle"></i></span>
                            <input type="text" class="form-control estilos_input" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping" id="Usuario" name="Usuario">
                          </div>
                         </div> <!-- END  INICIA LA FILA QUE CONTIENE EL INPUT DE USUARIO -->

                         <div class="row separacion_input-sesion"> <!-- INICIA LA FILA QUE CONTIENE EL INPUT DE CONSTRASEÑA DE USUARIO -->
                           <div class="col ">

                             <div style="text-align: left;">
                                <label for="Contraseña" class="estilos_label"> Contraseña:</label>
                              </div>
                              
                              <div class="input-group flex-nowrap">

                            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-key"></i></span>
                            <input type="password" class="form-control estilos_input" placeholder="Contraseña" aria-label="Contraseña" aria-describedby="addon-wrapping" id="Contraseña" name="Contraseña">
                          </div>

                           </div>

                         </div> <!-- END LA FILA QUE CONTIENE EL INPUT DE CONSTRASEÑA DE USUARIO -->


                         <div class="row separacion_input-sesion text-center">
                           <div class="col">
                               <button class="btn btn-primary estilos_boton" id="btn_login" >Iniciar Sesión</button>
                           </div>
                         </div>


                         <div class="row separacion_input-sesion">
                           <div class="col  ">
                             <a href="#" data-bs-target="#Registrarme" data-bs-toggle="modal" data-bs-dismiss="modal"> Registrarme</a>
                           </div>
                         </div>

                       </div> 
                    </div>
                  </div>

                </form>







              
              
              
            </div>
          </div>
        </div>



        <div class="modal fade" id="Registrarme" aria-hidden="true" aria-labelledby="Inicio de Sesion" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

            

                <form action="#" method="POST">

                  <div class="modal-body">

                    <div class="row ">

                          
                    <div class="col-12  Boton_cerrar">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"  ></button>
                    </div>
                    
                    </div>


                    <div class="row">
                        

                        <div class="col-lg-12 color2">
                         <div class="row">
                           <div class="col color1 text-center ">
                              <h2 class="tamanio_inicia">Registrarme</h2>
                           </div>
                         </div>
                         
                         <div class="row separacion_input-sesion"> <!-- INICIA LA FILA QUE CONTIENE EL INPUT DE USUARIO -->
                          <div class="col-lg-2">
                              <div style="text-align: left;">
                                <label for="codigoregistro" class="estilos_label"> Codigo:</label>
                              </div>
                          </div>
                            
                           <div class="col-lg-4" style="text-align: left;">
                             <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user-circle"></i></span>
                            <input type="text" class="form-control estilos_input" placeholder="C. Registro" aria-label="codigoregistro" aria-describedby="addon-wrapping" id="codigoregistro" name="codigoregistro">
                            </div>
                          </div>   

                            <div class="col-lg-2">
                              <div style="text-align: right;">
                                <label for="mat_registro" class="estilos_label"> Matrícula:</label>
                              </div>
                            </div>

                           <div class="col-lg-4" style="text-align: left;">
                             <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user-circle"></i></span>
                            <input type="text" class="form-control estilos_input" placeholder="Matricula" aria-label="mat_registro" aria-describedby="addon-wrapping" id="mat_registro" name="mat_registro">
                             </div>
                          </div>   
                      </div> <!-- END  INICIA LA FILA QUE CONTIENE EL INPUT DE USUARIO -->

                         <div class="row separacion_input-sesion"> <!-- INICIA LA FILA QUE CONTIENE EL INPUT DE CONSTRASEÑA DE USUARIO -->
                           <div class="col ">

                             <div style="text-align: left;">
                                <label for="nombre" class="estilos_label"> Nombre:</label>
                              </div>
                           </div>

                         </div> <!-- END LA FILA QUE CONTIENE EL INPUT DE CONSTRASEÑA DE USUARIO -->

                        <div class="row ">
                        
                           <div class="col-lg-4" style="text-align: left;">
                             <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user-circle"></i></span>
                            <input type="text" class="form-control estilos_input" placeholder="Nombres(s)" aria-label="nombre_registro" aria-describedby="addon-wrapping" id="nombre_registro" name="nombre_registro">
                            </div>
                          </div>   

                          <div class="col-lg-4" style="text-align: left;">
                             <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user-circle"></i></span>
                            <input type="text" class="form-control estilos_input" placeholder="A. Paterno" aria-label="paterno_registro" aria-describedby="addon-wrapping" id="paterno_registro" name="paterno_registro">
                            </div>
                          </div>  


                          <div class="col-lg-4" style="text-align: left;">
                             <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user-circle"></i></span>
                            <input type="text" class="form-control estilos_input" placeholder="A. Materno" aria-label="materno_registro" aria-describedby="addon-wrapping" id="materno_registro" name="materno_registro">
                            </div>
                          </div>  
                         </div>


                         <div class="row separacion_input-sesion"> <!-- INICIA LA FILA QUE CONTIENE EL INPUT DE USUARIO -->
                          <div class="col-lg-3">
                              <div style="text-align: left;">
                                <label for="mail_registro" class="estilos_label"> Correo:</label>
                              </div>
                          </div>
                            
                           <div class="col-lg-9" style="text-align: left;">
                             <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user-circle"></i></span>
                            <input type="text" class="form-control estilos_input" placeholder="Mail" aria-label="mail_registro" aria-describedby="addon-wrapping" id="mail_registro" name="mail_registro">
                            </div>
                          </div>   

                            <div class="col-lg-3 separacion_input-sesion">
                              <div style="text-align: left;">
                                <label for="psw_registro" class="estilos_label"> Password:</label>
                              </div>
                            </div>



                          <div class="col-lg-9 separacion_input-sesion" style="text-align: left;">
                             <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user-circle"></i></span>
                            <input type="text" class="form-control estilos_input" placeholder="Password" aria-label="psw_registro" aria-describedby="addon-wrapping" id="psw_registro" name="psw_registro">
                             </div>
                          </div>   

                            
                           
                      </div> <!-- END  INICIA LA FILA QUE CONTIENE EL INPUT DE USUARIO -->




                         <div class="row separacion_input-sesion text-center">
                           <div class="col">
                               <button class="btn btn-primary estilos_boton" id="btn_login_registro" onclick="Registrarme()">Resgistrarme</button>
                           </div>
                         </div>


                         <div class="row separacion_input-sesion">
                           <div class="col  ">
                             <a href="#" data-bs-target="#InicioSesion" data-bs-toggle="modal" data-bs-dismiss="modal"> Iniciar Sesion</a>
                           </div>
                         </div>

                       </div> 
                    </div>
                  </div>

                </form>
            </div>
          </div>
        </div>











          <div class="row"><!-- ROW DE CARRUSEL  -->
              <div class="col"><!-- COL DE CARRUSEL  -->
                  <div class="glider-contain "> <!-- CARRUSEL REALIZADO MEDIANTE EL USO DE LIBRERÍA GLIDER JS -->
                  
                    <div class="glider glider-animated">
                      <div><img src="img/Ilustracion1.png" alt="" width="100%"></div>
                      <div><img src="img/Ilustracion1.png" alt="" width="100%"></div>
                       <div><img src="img/Ilustracion1.png" alt="" width="100%"></div>
                    </div>

                   
                    <div role="tablist" class="dots"></div>
                </div><!-- END CARRUSEL REALIZADO MEDIANTE EL USO DE LIBRERÍA GLIDER JS -->
              </div><!-- COL DE CARRUSEL  -->
          </div> <!-- END ROW DE CARRUSEL  -->


          <div class="row separacion_input-sesion"> <!-- ROW DE CONTAINER PRIMARIO -->    
            <div class="col-lg-4 "> <!-- PRIMER COLUMNA DE ROW UNO -->
                   <div class="card" > 
                      <div class="row ">
                          <div class="col">
                               <img src="img/logo_upemor.png" width="100%"  alt="...">
                          </div>
                          <div class="col">
                              <div class="card-body">
                                <h5 class="card-title text-center">Panorama</h5>
                                <p class="card-text text-justify">Este es un proyecto de desarrollo de un sistema web enfocado en fungir como una herramienta para profesores y alumnos.</p>
                              
                              </div>
                          </div>
                      </div>
                  </div>                    
              </div> <!-- END PRIMER COLUMNA DE ROW UNO -->
            
            <div class="col-lg-4 "> <!-- SEGUNDA COLUMNA -->
                   <div class="card" > 
                      <div class="row ">
                          <div class="col">
                               <img src="img/logo_upemor.png" width="100%"  alt="...">
                          </div>
                          <div class="col">
                              <div class="card-body">
                                <h5 class="card-title"> Objetivo</h5>
                                <p class="card-text"> Herramienta de apoyo en la elaboración y evaluación de actividades en un entorno de clases no presenciales.</p>
                              
                              </div>
                          </div>
                      </div>
                  </div>                    
              </div> <!-- END SEGUNDA COLUMNA-->
              
              <div class="col-lg-4 "> <!-- TERCER COLUMNA-->
                   <div class="card" > 
                      <div class="row ">
                          <div class="col">
                               <img src="img/logo_upemor.png" width="100%"  alt="...">
                          </div>
                          <div class="col">
                              <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                              </div>
                          </div>
                      </div>
                  </div>                    
              </div> <!-- END TERCER COLUMNA -->
          
                  
        
        </div> <!-- END ROW DE CONTAINER PRIMARIO -->
</div>


<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted separacion_input-sesion">


  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Desarrollado Por:
    <a >Alberto Morales Flores como Proyecto de Estadía</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->

  


	<script src="js/jquery.js"> </script>
  <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.7/glider.min.js"></script>
 	<script src="https://unpkg.com/@popperjs/core@2"></script>
 	<script src="js/bootstrap.min.js"></script>
 	<script src="js/offcanvas.js"></script>
  <script src="js/carrusel.js?v=<?php echo time();?>"></script>
  <script src="js/index.js?v=<?php echo time();?>"></script>
  <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

  <script>
  Swal.fire({
              icon: 'error',
              title: 'Los datos ingresados son incorrectos!!',
              showConfirmButton: true,
            })
</script>


</body>
</html>