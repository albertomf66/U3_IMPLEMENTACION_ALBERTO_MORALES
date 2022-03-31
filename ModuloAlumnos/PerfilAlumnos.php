
<?php 

   include "ObtenerDatosPerfilAlumno.php";

		$seleccion  = $filas_perfil[0];
		$frase = $filas_perfil[1];
		
 ?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	</head>
<body>
	<div class="row ">
		<div class="col-8 text-left centro2" >	
			<h2 class="margeninterno2">Alumno: <?php echo strtoupper( $_SESSION['Usuario'])  ?></h2>	
			<h3 class=" font_frase text-justify"> Mi Frase: </h3>
			<h4 class=" font_frase text-justify"> " <?php echo $frase ?> "</h4>	

			<div class="input-group mb-3 text-center " style="margin-left: 20px">
			  <button type="button" class="btn btn-dark "data-bs-target="#frase_perfil" data-bs-toggle="modal" data-bs-dismiss="modal"> Cambiar mi Frase <i class="fas fa-hand-pointer"></i></button>
			</div>					
		</div>
		


		 <div class="modal fade" id="frase_perfil" aria-hidden="true" aria-labelledby="Inicio de Sesion" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" id="CambioFrase">
            	<div class="modal-header">
            		 <h5 class="modal-title text-center" id="exampleModalLabel"> Coloca la Frase que desees:  </h5>
            		    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"  ></button>
            	</div>

            	<div class="modal-body" id="CambioAvatar">
            		<button  hidden="true" type="button" value="<?php echo $_SESSION['Usuario'] ?>" id="mat_frase" > </button>

            		<div class="row" style="margin-top: 15px;">
            			<div class="col-12 text-center">
            				<div class="form-floating">
							  <textarea class="form-control" placeholder="Leave a comment here" id="frase_update" style="resize: none; height: 100px" name="frase_update_perfil"></textarea>
							  <label for="frase_update">Mi Frase</label>
							</div>
            			</div>

            			<div class="col" style="margin-top: 15px;">
            				 <button type="button" class="btn btn-dark" id="btn_update_frase" name="btn_update_frase">  Actualizar Frase </button>
            			</div>
            		</div>
            	</div>		
            </div>	
          </div>
        </div>










		<div class="col-3 text-left centro2 text-center">
		   <?php 
		   		
		   		if ($filas[3] == "1"){
		   			echo '<img  class="circularperfil2" height="120" width="120" src="../img/avatar/img1.png">';
		   		}else if ($filas[3] == "2") {
		   			echo '<img  class="circularperfil2" height="120" width="120" src="../img/avatar/img2.png">';
		   		}
		   		else if ($filas[3] == "3") {
		   			echo '<img  class="circularperfil2" height="120" width="120" src="../img/avatar/img3.png">';
		   		}
		   		else if ($filas[3] == "4") {
		   			echo '<img  class="circularperfil2" height="120" width="120" src="../img/avatar/img4.png">';
		   		}
		   		else if ($filas[3] == "5") {
		   			echo '<img  class="circularperfil2" height="120" width="120" src="../img/avatar/img5.png">';
		   		}else if ($filas[3] == "6") {
		   			echo '<img  class="circularperfil2" height="120" width="120" src="../img/avatar/img6.png">';
		   		}else {
		   			echo '<img  class="circularperfil2" height="120" width="120" src="../img/login_user.svg">';
		   		}
		   		


		    ?>
		    <p class="nombre_espacio">  <?php echo strtoupper($NombreAlumno)." ".strtoupper($PaternoAlumno)." ".strtoupper($MaternoAlumno);  ?> </p>
		 	<div class="input-group mb-3 text-center " style="margin-left: 20%">
			  <button type="button" class="btn btn-primary "data-bs-target="#pic_perfil" data-bs-toggle="modal" data-bs-dismiss="modal"> Cambiar Avatar  <i class="fas fa-hand-pointer"></i></button>
			</div>
		</div>
		


		 <div class="modal fade" id="pic_perfil" aria-hidden="true" aria-labelledby="Inicio de Sesion" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
            	<div class="modal-header">
            		 <h5 class="modal-title text-center" id="exampleModalLabel">Selecciona tu Avatar: </h5>
            		    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"  ></button>
            	</div>

            	<div class="modal-body" id="CambioAvatar">
            		<button  hidden="true" type="button" value="<?php echo $_SESSION['Usuario'] ?>" id="mat_avatar" > </button>

            		<div class="row">
            			<div class="col-4 text-center">
            				<button type="button" class="btn btn-light pic_cambio" name="img1_avatar">
            				<img  class="circularperfil2" height="120" width="120" src="../img/avatar/img1.png" name="img1_avatar">
            				</button>
            			</div>

            			<div class="col-4 text-center">
            				<button type="button" class="btn btn-light pic_cambio"  name="img2_avatar">
            				<img name="img2_avatar" class="circularperfil2" height="120" width="120" src="../img/avatar/img2.png">
            				</button>
            			</div>

            			<div class="col-4 text-center">
            				<button type="button" class="btn btn-light pic_cambio"  name="img3_avatar">
            				<img  class="circularperfil2" height="120" width="120" src="../img/avatar/img3.png" name="img3_avatar">
            				</button>
            			</div>
            		</div>


            		<div class="row" style="margin-top: 15px;">
            			<div class="col-4 text-center">
            				<button type="button" class="btn btn-light pic_cambio"  name="img4_avatar">
            				<img  class="circularperfil2" height="120" width="120" src="../img/avatar/img4.png" name="img4_avatar"> 
            				</button>
            			</div>

            			<div class="col-4 text-center">
            				<button type="button" class="btn btn-light pic_cambio"  name="img5_avatar">
            				<img  class="circularperfil2" height="120" width="120" src="../img/avatar/img5.png" name="img5_avatar">
            				</button>
            			</div>

            			<div class="col-4 text-center">
            				<button type="button" class="btn btn-light pic_cambio"  name="img6_avatar">
            				<img  class="circularperfil2" height="120" width="120" src="../img/avatar/img6.png" name="img6_avatar">
            				</button>
            			</div>
            		</div>
            	</div>		
            </div>	
          </div>
        </div>	 	


    </div>

    <div class="row">
    	<div class="col-8 text-left centro2" >	
			<h2 class="margeninterno2"> Selector de Temas: </h2>

			<div class="row" style="margin-bottom: 30px;margin-top: 10px">
				<div class="col-4" style="padding-left: 30px;">
					<div class="form-check">
						<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
						<label class="form-check-label" for="flexRadioDefault1">
						    Colores Default 
					    </label>
					</div>

				</div>

				<div class="col-4">
					<div class="form-check">
					  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
					  <label class="form-check-label" for="flexRadioDefault2">
					    Modo Oscuro
					  </label>
					</div>
				</div>


				<div class="col-4">
					<div class="form-check">
					  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" >
					  <label class="form-check-label" for="flexRadioDefault3">
					    Modo Party
					  </label>
					</div>
				</div>			
			</div>
		</div>


    </div>
</body>
</html>	