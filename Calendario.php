

<?php 
	require_once "global.php"; 
	

	try
	{
		$conexion  = new PDO('mysql:host=localhost;dbname=estadia',"root","");
		$result = $conexion->query("SELECT idEventosActividad as id,	title,start,color FROM eventosprofesor");

		//foreach ($result as $fila ) {
		//	echo $fila ["title"];
		//	echo $fila ["start"];
		//	echo $fila ["color"];
		//	echo "<br>";
		//}
	}catch (PDOExeption $e)
	{
	 	echo "nel";
	}
 ?>


<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Calendario</title>	
	 <link rel="stylesheet" href="css/bootstrap.min.css">
	 <link rel="stylesheet" href="css/main.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.7/glider.min.css">
	<link rel="stylesheet" href="calendario.css">
</head>
<body>
	
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
		  	
		  <form action="" id="formulario_calendario">
		  		<div class="modal-body">
					  <div class="mb-3 ">
					  	<input type="text" name="id" id="id">
						<label for="nombre_evento" class="form-label" > Nombre Evento </label>
						<input type="text" class="form-control" id="nombre_evento" name="nombre_evento">
					 </div>

					 <div class="mb-3 ">
						<label for="start" class="form-label" > Fecha </label>
						<input type="date" class="form-control" id="start" name="start">
					 </div>

					 <label for="importancia" class="form-label" > Importancia </label>

					 <select class="form-select" aria-label="Default select example" id="importancia" name="importancia">
					  <option value="1">Normal</option>
					  <option value="2">Alta</option>
					  <option value="3">Urgente</option>
					</select>

					 <div class="mb-3 " style="margin-top: 10px">
						<label for="profe_ev" class="form-label" > Profesor </label>
						<input type="text" class="form-control" id="profe_ev" name="profe_ev" disabled="" value="bigo160819">
					 </div>

					 <div class="mb-3 " style="margin-top: 10px">
						<label for="color" class="form-label" > Color Evento </label>
						<input type="color" class="form-control" id="color" name="color">
					 </div>
					 
		 		</div>

		 		<div class="modal-footer">
					 <button class="btn btn-warning"> Cancelar </button>
					 <button class="btn btn-danger" id="btn_elimina"> Eliminar </button>

					 <button class="btn btn-info" id="btn_editar" type="submit"> Editar</button>
					 <button class="btn btn-info" id="btn_registro_evento" type="submit"> Registrar</button>
		 		</div>
		   
		   
		  </form>	

		</div>
	  </div>
	</div>
	
	






	  <script src="js/jquery.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.7/glider.min.js"></script>
 	  <script src="https://unpkg.com/@popperjs/core@2"></script>
 	  <script src="js/bootstrap.min.js"></script>
    <script src="js/moment.js"></script>
    <script src="js/main.min.js"></script>
    <script src="js/es.js"></script>
    <script src="js/fullcallendar_inicio.js"></script>
 	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
 	<script src="calendario.js"></script>
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
          <?php foreach ($result as $fila ) {  ?>
          {
          	id:"<?php  echo $fila ["id"]; ?>",
            title: "<?php  echo $fila ["title"]; ?>",
            start: "<?php  echo $fila ["start"]; ?>",
           	color: "<?php  echo $fila ["color"]; ?>"
          },


      <?php  }?>
          ],


        
          dateClick: function(info){
          	document.getElementById("start").value = info.datesrt;	
          	document.getElementById("titulo").textContent = "Registro de Evento";
          	document.getElementById("btn_registro_evento").classList.remove('d-none');
          	document.getElementById("btn_elimina").classList.add('d-none');
          	document.getElementById("btn_editar").classList.add('d-none');
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
            url: 'ModuloProfesores/InsertarEventoProfesor.php',
            type: 'POST',
            data: "nombreevento="+Nombre_Evento+"&Fecha="+Fecha+"&Color="+Color+"&Mat_Profe="+Mat_Profe+"&importancia="+importancia,
            success: function(data) {

            		
                Modal.hide();   
               
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

 	 	     $.ajax({
            url: 'ModuloProfesores/UpdateEventoProfesor.php',
            type: 'POST',
            data: "nombreevento="+Nombre_Evento+"&Fecha="+Fecha+"&Color="+Color+"&Mat_Profe="+Mat_Profe+"&importancia="+importancia+"&Id="+Id,
            success: function(data) {

            		
                Modal.hide();   
               
                Swal.fire({
                  icon: 'success',
                  title: 'Se ha completado',
                  text: 'El Evento se ha Editado exitosamente!!',
                  showConfirmButton: true,
                  timer: 1000
               		

                })

                     
                      }
                  }); 

 	 });
          




 	   const EliminarEvento = document.getElementById("btn_elimina").addEventListener('click',(e)=>{
 	 	
 	 	 e.preventDefault();
 	 	
          const Id = document.getElementById("id").value;

 	 	     $.ajax({
            url: 'ModuloProfesores/DeleteEventoProfesor.php',
            type: 'POST',
            data: "&Id="+Id,
            success: function(data) {

            		
                Modal.hide();   
               
                Swal.fire({
                  icon: 'success',
                  title: 'Se ha completado',
                  text: 'El Evento se ha Eliminado exitosamente!!',
                  showConfirmButton: true,
                  timer: 1000
               		

                })

                     
                      }
                  }); 

 	 });
          




          
 	</script>

 
</body>
</html>