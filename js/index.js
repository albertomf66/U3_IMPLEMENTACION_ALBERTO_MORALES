

 const Inicio = document.getElementById("IniciarSesion");
 const BotonesIniciarSesion =  document.querySelectorAll("#IniciarSesion input");

	const expresiones =
	{
		Usuario: /^[A-Za-z][A-Za-z][A-Za-z][A-Za-z][0-9]{6}$/// Letras y espacios, pueden llevar acentos
	}
  
  /**
   * [description]
   * Función la cual permite agregar la clase is-invalid o is-valid
   * cuando sea llamada dicha funcionalidad meidante el recibimiento 
   * de un parametro que indicara el elemento id donde se aplicara 
   * @param  {[String]} variable [description]
   * @return void
   */
	const Incorrectos = (variable) =>{
		document.getElementById(variable).classList.add('is-invalid');
 		document.getElementById(variable).classList.remove('is-valid');
	}

		const Correctos = (variable) =>{
		document.getElementById(variable).classList.add('is-valid');
 		document.getElementById(variable).classList.remove('is-invalid');
	}

const campos =
 {
    codigoregistro: false,
    mat_registro: false,
    nombre_registro: false,
    paterno_registro: false,
    materno_registro: false,
    mail_registro: false,
    psw_registro : false

 }

/**
 * [Redireccionar description]
 * Función encargada de realizar una redirección hacía el archivo index.php
 */
 function Redireccionar(){
 	 window.location = "../Estadia/ModuloProfesores/index.php";
 }

 function RedireccionarProfe(){
 	 window.location = "../Estadia/Index.php";
 }


/**
 * [Registrarme description]
 * Función emcargada de realizar la validación de los datos ingresados por el usuario 
 * posterior se realiza la validación a la base de datos mediante ajax 
 * para su postarior insersión dentro de la base de datos si dicho usuario no se encuentra
 * registrado anteriormente se le permite al usuario realizar el registro del 
 * nuevo usuario. 
 */
function Registrarme() {
	event.preventDefault(); 
	var Codigo =  document.getElementById("codigoregistro");
	var matricula =  document.getElementById("mat_registro");
	var Nombre =  document.getElementById("nombre_registro");
	var Paterno =  document.getElementById("paterno_registro");
	var Materno =  document.getElementById("materno_registro");
	var Mail =  document.getElementById("mail_registro");
	var Contra =  document.getElementById("psw_registro");

	if ( Codigo.value == "")
	{
	  Incorrectos("codigoregistro");
	  campos.codigoregistro = false;
	}else
	{
	   Correctos("codigoregistro");
	    campos.codigoregistro = true;
	}


	if ( matricula.value == "")
	{
	  Incorrectos("mat_registro");
		campos.mat_registro = false;	
	}else
	{
	   Correctos("mat_registro");
		campos.mat_registro = true;
	}


	if ( Nombre.value == "")
	{
	  Incorrectos("nombre_registro");
		campos.nombre_registro = false;
	}else
	{
	   Correctos("nombre_registro");
	   	campos.nombre_registro = true ;	
	}


	if ( Paterno.value == "")
	{
	  Incorrectos("paterno_registro");
	  campos.paterno_registro = false;
	}else
	{
	   Correctos("paterno_registro");
	   campos.paterno_registro = true;
	}


	if ( Materno.value == "")
	{
	  Incorrectos("materno_registro");
	  campos.materno_registro  = false;
	}else
	{
	   Correctos("materno_registro");
	   campos.materno_registro  = true;
	}

	if ( Mail.value == "")
	{
	  Incorrectos("mail_registro");
	  campos.mail_registro = false;
	}else
	{
	   Correctos("mail_registro");
	   campos.mail_registro = true;
	}


	if ( Contra.value == "")
	{
	  Incorrectos("psw_registro");
	  campos.psw_registro = false;
	}else
	{
	   Correctos("psw_registro");
	   campos.psw_registro = true;
	}
	var contador = 0 ;
    var ArrayCampos = Object.values(campos); 

	 for (var i = 0; i < ArrayCampos.length - 1; i++)
	 {
	 	if (ArrayCampos[i]  != false) 
	 	{
	 		contador = contador+1;
	 	}
	 }

	if ( contador != 6)
	{

 		 Swal.fire({
              icon: 'error',
              title: 'Completa los datos para Registrarte!!',
              text: 'Opps!!',
              showConfirmButton: true,
            })

	}else{
		 
		 	datos = {"idcodigo":Codigo.value};

      $.ajax({
      url: '../Estadia/ModuloAdministrador/VerificarCodigoRegistro.php',
      type: 'POST',
      data: datos
      }).done(function(respuesta){
		if (respuesta.estado == "no") {
			console.log(JSON.stringify(respuesta));

			var usuario = respuesta.usuario;

			Swal.fire({
			  icon: 'warning',
			  title: 'Opps!!',
			  text: 'El Código de Registro no es valido.',
			  showConfirmButton: true,
			  timer: 4000
			})

		 }else{
	       //alert(respuesta.usuario);
		 	if ( respuesta.usuario == "Profesor" ) // SI EL CÓDIGO CORRESPONDE A UN PROFESOR
		 	{


					 datos = {"matricula":matricula.value};	
					 	$.ajax({
			      url: '../Estadia/ModuloAdministrador/VerificarProfesor.php',
			      type: 'POST',
			      data: datos
			      }).done(function(respuesta){
					if (respuesta.estado == "ok") {
						console.log(JSON.stringify(respuesta));

						var filas = respuesta.fila;

						Swal.fire({
						  icon: 'warning',
						  title: 'Opps!!',
						  text: 'El Profesor ya se encuetra Registrado.',
						  showConfirmButton: true,
						  timer: 4000
						})

					 }else{

			 $.ajax({
				      url: '../Estadia/ModuloAdministrador/InsertarProfesorAdmin.php',
				      type: 'POST',
				      data: "matricula_profesor="+matricula.value+"&nombre_profesor="+Nombre.value+"&paterno_profesor="+Paterno.value+"&materno_profesor="+Materno.value+"&correo_profesor="+Mail.value+"&psw_profesor="+Contra.value,
				      success: function(data) {
							                  Swal.fire({
									  icon: 'success',
									  title: 'Se ha completado',
									  text: 'El profesor se ha registrado exitosamente!!',
									  showConfirmButton: true,
									  timer: 1000
									})

							         setTimeout('RedireccionarProfe()',1000);  
				                }
				            }); 


					 }// TERMINA ELSE DE VERFICIACION DE PROFESOR
		     }); // CERRRE DE AJAX VERFICACION DE PROFESOR




		 	}else if (respuesta.usuario == "Alumno"){

		 		 datos = {"matricula":matricula.value};	
					 	$.ajax({
			      url: '../Estadia/ModuloAdministrador/VerificarAlumnos.php',
			      type: 'POST',
			      data: datos
			      }).done(function(respuesta){
					if (respuesta.estado == "ok") {
						console.log(JSON.stringify(respuesta));

						var filas = respuesta.fila;

						Swal.fire({
						  icon: 'warning',
						  title: 'Opps!!',
						  text: 'El Alumno ya se encuetra Registrado.',
						  showConfirmButton: true,
						  timer: 4000
						})

					 }else{

			 $.ajax({
				      url: '../Estadia/ModuloAdministrador/InsertarAlumnosAdmin.php',
				      type: 'POST',
				      data: "matricula_alumno="+matricula.value+"&nombre_alumno="+Nombre.value+"&paterno_alumno="+Paterno.value+"&materno_alumno="+Materno.value+"&correo_alumno="+Mail.value+"&psw_alumno="+Contra.value,
				      success: function(data) {
							                  Swal.fire({
									  icon: 'success',
									  title: 'Se ha completado',
									  text: 'El profesor se ha registrado exitosamente!!',
									  showConfirmButton: true,
									  timer: 1000
									})

							        setTimeout('RedireccionarProfe()',1000);  
				                }
				            }); 


					 }// TERMINA ELSE DE VERFICIACION DE PROFESOR
		     }); // CERRRE DE AJAX VERFICACION DE PROFESOR


		 	}

		 }
     }); // TEMRINA PRIMER AJAX 

	}// TERMINA ELSE 
  
}



 const IniciarSesion =  document.getElementById("btn_login").addEventListener('click', (e)=>{
 	var Usuario = document.getElementById("Usuario").value;
 	var Contraseña = document.getElementById("Contraseña").value;

 	if ( Usuario == ""  && Contraseña == ""){
 		event.preventDefault();
 		document.getElementById("Usuario").classList.remove('is-valid');
 		document.getElementById("Usuario").classList.add('is-invalid');

 		document.getElementById("Contraseña").classList.remove('is-valid');
 		document.getElementById("Contraseña").classList.add('is-invalid');

 		Swal.fire({
              icon: 'error',
              title: 'Ingresa tu Usuario y Contraseña!!',
              text: 'Opps!!',
              showConfirmButton: true,
            })
 	}else if ( Usuario != ""  && Contraseña == "" ){
 		document.getElementById("Contraseña").classList.remove('is-valid');
 		document.getElementById("Contraseña").classList.add('is-invalid');

 		 Swal.fire({
              icon: 'error',
              title: 'Ingresa tu Contraseña!!',
              text: 'Opps!!',
              showConfirmButton: true,
            })
 		event.preventDefault();
 	}else if (Usuario == ""  && Contraseña != "" ){
 		Swal.fire({
              icon: 'error',
              title: 'Ingresa tu Usuario!!',
              text: 'Opps!!',
              showConfirmButton: true,
            })
 		event.preventDefault();
 	}
});


 	const ValidarFormulario  = (e) =>{
 			var Contraseña = document.getElementById("Contraseña").value;
 			var Codigo =  document.getElementById("codigoregistro").value;
 			var matricula =  document.getElementById("mat_registro").value;
			var Nombre =  document.getElementById("nombre_registro").value;
			var Paterno =  document.getElementById("paterno_registro").value;
			var Materno =  document.getElementById("paterno_registro").value;
			var Mail =  document.getElementById("mail_registro").value;
			var Contra =  document.getElementById("psw_registro").value;
 			switch(e.target.name)
 			{
 				case "Usuario":
 					if ( expresiones.Usuario.test(e.target.value))
 					{
 						Correctos(e.target.name);
 					}else{
 						Incorrectos(e.target.name);
 						
 					}
 				break;

 				case "Contraseña":


 				if( Contraseña == "")
 				{
 					Incorrectos(e.target.name);
 					
 				}else{
 					Correctos(e.target.name);
 				}
 				
 				break;
 				case "codigoregistro":
 				 if (Codigo == "")
 				 {
 					Incorrectos(e.target.name);
 				}else{
 					Correctos(e.target.name);
 				}
 				break;
 				case "mat_registro":
 					if ( expresiones.Usuario.test(e.target.value))
 					{
 						Correctos(e.target.name);
 					}else{
 						Incorrectos(e.target.name);
 					}
 				break ;

 				case "nombre_registro":
 				if ( Nombre != "")
 					{
 						Correctos(e.target.name);
 					}else{
 						Incorrectos(e.target.name);
 					}
 				break;

 				case "paterno_registro":
 				if ( Paterno != "")
 					{
 						Correctos(e.target.name);
 					}else{
 						Incorrectos(e.target.name);
 						
 					}
 				break;

 				case "materno_registro":
 				if ( Materno != "")
 					{
 						Correctos(e.target.name);
 					}else{
 						Incorrectos(e.target.name);
 						
 					}
 				break;

 				case "mail_registro":
 				if (Mail != "")
 					{
 						Correctos(e.target.name);
 					}else{
 						Incorrectos(e.target.name);
 						
 					}
 				break;

 				case "psw_registro":  
 				if (Contra != "")
 					{
 						Correctos(e.target.name);
 					}else{
 						Incorrectos(e.target.name);
 						
 					}
 				break;
 			}
 	}

 // PARA VALIDAR EL FORMULARIO #1. 
	BotonesIniciarSesion.forEach((inpu) => {
		    inpu.addEventListener('keyup', ValidarFormulario);
		    inpu.addEventListener('blur', ValidarFormulario);
		    inpu.addEventListener('change',ValidarFormulario);
		    inpu.addEventListener('click',ValidarFormulario);
		});