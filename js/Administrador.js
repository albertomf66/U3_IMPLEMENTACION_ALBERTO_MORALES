
// ASGINAMOS A LOS ALUMNOS 
const GestionarUsuariosAdmin = document.getElementById("GestionarUsuariosAdmin"); 
const PanelAdmin = document.getElementById("PanelAdmin"); 
const GestionReportesAdmin = document.getElementById("GestionReportesAdmin");
const RespaldarBD = document.getElementById("RespaldarBD");

// FUNCIONES QUE PERMITEN ACCEDER AL MENU DE OPCIONES DE GESTION 

//Funcion que muestra las opciones propias del menú de Gestion de Usuarios
// donde se gestionan los Profesores, Alumnos y los Administradores 
function IrGestionUsuarios()
{
	// Permite mostrar y ocultar las paginas php creadas con el estilo OcultarElemento
	// Y por consiguiente apra mostrarlos con MostrarElemento
	// Permite agregar o remover las clases antes mencionadas 
	GestionarUsuariosAdmin.classList.remove("OcultarElemento");
	GestionarUsuariosAdmin.classList.add("MostrarElemento");
	PanelAdmin.classList.add('OcultarElemento');
	PanelAdmin.classList.remove('MostrarElemento');
}

	

function IrGestionReportes()
{
	// Permite mostrar y ocultar las paginas php creadas con el estilo OcultarElemento
	// Y por consiguiente apra mostrarlos con MostrarElemento
	// Permite agregar o remover las clases antes mencionadas 
	PanelAdmin.classList.add('OcultarElemento');
	PanelAdmin.classList.remove('MostrarElemento');
	GestionReportesAdmin.classList.remove('OcultarElemento');
	GestionReportesAdmin.classList.add('MostrarElemento');
}

function IrRespaldoBD()
{
	// Permite mostrar y ocultar las paginas php creadas con el estilo OcultarElemento
	// Y por consiguiente apra mostrarlos con MostrarElemento
	// Permite agregar o remover las clases antes mencionadas 
	PanelAdmin.classList.add('OcultarElemento');
	PanelAdmin.classList.remove('MostrarElemento');
	RespaldarBD.classList.remove('OcultarElemento');
	RespaldarBD.classList.add('MostrarElemento');
}

// FUNCIONES PARA LA GESTION DE USUARIOS DE TIPO ALUMNOS 

const AlumnosGestion = document.getElementById("AlumnosGestion");
const ProfesGestion = document.getElementById("ProfesGestion");
const AdminGestion = document.getElementById("AdminGestion");

const mostrarocultar = () =>
{
	AlumnosGestion.classList.remove("MostrarElemento");
	ProfesGestion.classList.remove("MostrarElemento");
	AdminGestion.classList.remove("MostrarElemento");

	AlumnosGestion.classList.add("OcultarElemento");
	ProfesGestion.classList.add("OcultarElemento");
	AdminGestion.classList.add("OcultarElemento");
}

control = 0; 
controlprofe = 0;
controladmin = 0;
function MostrarAlumnos ()
{	
  if ( control == 0  || controlprofe == 1 || controladmin == 1)
  {
  	mostrarocultar();
	AlumnosGestion.classList.add("MostrarElemento");
	control = 1; 
	controlprofe = 0;
	controladmin = 0;
  }else{
  	mostrarocultar();
	AlumnosGestion.classList.add("OcultarElemento");
	control = 0; 
  }
	
}



controlnewalumno = 0;
const NewAlumno  = document.getElementById("NewAlumno");
const NewProfe = document.getElementById("NewProfe");
const NewAdmin = document.getElementById("NewAdmin");

// FUNCION ENCARGADA DE RECETEAR CADA DIV POR LO TANTO 
// CUANDO SE LLAMEN SE PUEDE MOSTRAR SIN QUE LAS DEMÁS AFECTEN
// A LAS QUE SE ESTÁ MOSTRANDO
const MostrarOcultarNewUsuarios = () =>
{
	NewAlumno.classList.remove("MostrarElemento");
	NewProfe.classList.remove("MostrarElemento");
	NewAdmin.classList.remove("MostrarElemento");

	NewAlumno.classList.add("OcultarElemento");
	NewProfe.classList.add("OcultarElemento");
	NewAdmin.classList.add("OcultarElemento");
}


function Agregarlumno()
{
	if ( controlnewalumno == 0 )
	{
		MostrarOcultarNewUsuarios();
		NewAlumno.classList.add("MostrarElemento");
		controlnewalumno = 1;
	}else{
		MostrarOcultarNewUsuarios();
		NewAlumno.classList.add("OcultarElemento");
		controlnewalumno = 0;
	}
}


/**
 * [Redireccion description]
 * Función orientada a realizar la redirección a la página
 * Administrador.php
 */
function Redireccion ()
{
	 window.location = "Administrador.php";
	 IrGestionUsuarios();
}


// FUNCION ENCARGADA DE REALIZAR LA VALIDACION DE LOS DATOSS DEL ALUMNO
// PARA POSTERIOR SER INSERTADO DENTRO DE LA BASE DE DATOS. 
/**
 * [InsertarAlumno description]
 * Función encargada de realizar primeramente la evaluación de las 
 * entradas propuestas por el usuario con respecto al 
 * formato para posteriormente insertar dicha información dentro de
 * la base de datos mediante ajax
 */
function InsertarAlumno()
{
	var alumno_mat = document.getElementById("alumno_mat");
	var nombre_alum = document.getElementById("nombre_alum");
	var apellidop_alum = document.getElementById("apellidop_alum");
	var apellidom_alum = document.getElementById("apellidom_alum");
	var mail_alum = document.getElementById("mail_alum");
	var pass_alum= document.getElementById("pass_alum");

	controlmatricula = 0 ;
	controlname = 0 ;
	controlmaterno =  0;
	controlpaterno = 0;
	controlmail = 0 ; 
	controlpass = 0;

	if ( alumno_mat.value == "")
	{
	   alumno_mat.classList.add("is-invalid");
       alumno_mat.classList.remove("is-valid");
       controlmatricula = 0;
	}else{
		alumno_mat.classList.remove("is-invalid");
       alumno_mat.classList.add("is-valid");
        controlmatricula = 1;
	}

	if (nombre_alum.value == "")
	{
	   nombre_alum.classList.add("is-invalid");
       nombre_alum.classList.remove("is-valid");
       controlname = 0 ;
	}else{
		nombre_alum.classList.remove("is-invalid");
       nombre_alum.classList.add("is-valid");
       controlname = 1; 
	}
		if (apellidop_alum.value == "")
	{
	   apellidop_alum.classList.add("is-invalid");
       apellidop_alum.classList.remove("is-valid");
       controlpaterno = 0 ; 
	}else{
		apellidop_alum.classList.remove("is-invalid");
       apellidop_alum.classList.add("is-valid");
       controlpaterno = 1;
	}
		if (apellidom_alum.value == "")
	{
	   apellidom_alum.classList.add("is-invalid");
       apellidom_alum.classList.remove("is-valid");
       controlmaterno = 0;
	}else{
		apellidom_alum.classList.remove("is-invalid");
       apellidom_alum.classList.add("is-valid");
       controlmaterno = 1;
	}
		if (mail_alum.value == "")
	{
	   mail_alum.classList.add("is-invalid");
       mail_alum.classList.remove("is-valid");
       controlmail = 0;
	}else{
		mail_alum.classList.remove("is-invalid");
       mail_alum.classList.add("is-valid");
       controlmail = 1;
	}
		if (pass_alum.value == "")
	{
	   pass_alum.classList.add("is-invalid");
       pass_alum.classList.remove("is-valid");
       controlpass = 0; 
	}else{
		pass_alum.classList.remove("is-invalid");
       pass_alum.classList.add("is-valid");
       controlpass = 1; 
	}
	if ( controlmatricula == 1  && controlname == 1 && controlmaterno == 1 && controlpaterno == 1 && controlmail == 1 && controlpass == 1)
	{
	

	  datos = {"matricula":alumno_mat.value};

    $.ajax({
      url: 'VerificarAlumnos.php',
      type: 'POST',
      data: datos
      }).done(function(respuesta){
		if (respuesta.estado == "ok") {
			console.log(JSON.stringify(respuesta));
			var filas = respuesta.fila;
			Swal.fire({
			  icon: 'warning',
			  title: 'Opps!!',
			  text: 'El alumno que ya se encuentra registrado',
			  showConfirmButton: true,
			  timer: 4000
			})
		 }else{
	              $.ajax({
	      url: 'InsertarAlumnosAdmin.php',
	      type: 'POST',
	      data: "matricula_alumno="+alumno_mat.value+"&nombre_alumno="+nombre_alum.value+"&paterno_alumno="+apellidop_alum.value+"&materno_alumno="+apellidom_alum.value+"&correo_alumno="+mail_alum.value+"&psw_alumno="+pass_alum.value,
	      success: function(data) {
				                  Swal.fire({
						  icon: 'success',
						  title: 'Se ha completado',
						  text: 'El alumno se ha registrado exitosamente!!',
						  showConfirmButton: true,
						  timer: 1000
						})

				         setTimeout('Redireccion()',1000);  
	                }
	            }); 
		 }
     });
	}
}





controlprofenew =0 ;
function AgregarProfe()
{
	if ( controlprofenew == 0 )
	{
		MostrarOcultarNewUsuarios();
		NewProfe.classList.add("MostrarElemento");
		controlprofenew = 1;
	}else{
		MostrarOcultarNewUsuarios();
		NewProfe.classList.add("OcultarElemento");
		controlprofenew = 0;
	}
}



function MostrarProfes()
{
	 if ( controlprofe == 0 || control == 1 || controladmin == 1)
  {
  	mostrarocultar();
	ProfesGestion.classList.add("MostrarElemento");
	controlprofe = 1; 
	control = 0;
	controladmin = 0;
  }else{
  	mostrarocultar();
	ProfesGestion.classList.add("OcultarElemento");
	controlprofe = 0; 
  }
	
}




controladdadmin = 0 ;
function AgregarAdmin()
{
	if ( controladdadmin == 0 )
	{
		MostrarOcultarNewUsuarios();
		NewAdmin.classList.add("MostrarElemento");
		controladdadmin = 1;
	}else{
		MostrarOcultarNewUsuarios();
		NewAdmin.classList.add("OcultarElemento");
		controladdadmin = 0;
	}
}



function MostrarAdmin()
{
	 if ( controlprofe == 1 || control == 1  || controladmin == 0)
  {
  	mostrarocultar();
	AdminGestion.classList.add("MostrarElemento");
	controlprofe = 0; 
	control = 0;
	controladmin = 1;
  }else{
  	mostrarocultar();
	AdminGestion.classList.add("OcultarElemento");
	controladmin = 0; 
  }
}

var Editarono = 0;




function EditAlumno(cant)
{	

	var cant2  = cant.trim();
	var matricula= document.getElementById("matricula"+cant2) ;
	var nombre = document.getElementById("nombre"+cant2);
	var paterno= document.getElementById("paterno"+cant2);
	var materno= document.getElementById("materno"+cant2);
	var mail= document.getElementById("mail"+cant2);
	var psw= document.getElementById("psw"+cant2);
	if ( Editarono == 0 )
	{
	    document.getElementById("AplicaEditAlumno"+cant2).classList.add("MostrarElemento");
	    document.getElementById("AplicaEditAlumno"+cant2).classList.remove("OcultarElemento");
	    //document.getElementById("matricula"+cant2).disabled = false;
	    document.getElementById("nombre"+cant2).disabled = false;
	    document.getElementById("paterno"+cant2).disabled = false;
	    document.getElementById("materno"+cant2).disabled = false;
	    document.getElementById("mail"+cant2).disabled = false;
	    document.getElementById("psw"+cant2).disabled = false;

		Editarono = 1;
	}else{
		document.getElementById("AplicaEditAlumno"+cant2).classList.remove("MostrarElemento");
	    document.getElementById("AplicaEditAlumno"+cant2).classList.add("OcultarElemento");
	    document.getElementById("matricula"+cant2).disabled = true;
	    document.getElementById("nombre"+cant2).disabled = true;
	    document.getElementById("paterno"+cant2).disabled = true;
	    document.getElementById("materno"+cant2).disabled = true;
	    document.getElementById("mail"+cant2).disabled = true;
	    document.getElementById("psw"+cant2).disabled = true;

	    document.getElementById("matricula"+cant2).value = "";
	    document.getElementById("nombre"+cant2).value = "";
	    document.getElementById("paterno"+cant2).value = "";
	    document.getElementById("materno"+cant2).value = "";
	    document.getElementById("mail"+cant2).value = "";
	    document.getElementById("psw"+cant2).value = "";
	
		nombre.classList.remove("is-invalid");
		nombre.classList.remove("is-valid");
		paterno.classList.remove("is-invalid");
		paterno.classList.remove("is-valid");
		materno.classList.remove("is-invalid");
		materno.classList.remove("is-valid");
		mail.classList.remove("is-invalid");
		mail.classList.remove("is-valid");
		psw.classList.remove("is-invalid");
		psw.classList.remove("is-valid");
		Editarono = 0 ;
	}
}



paternoenvio = "";
nombreenvio = "";
maternoenvio = "";
mailenvio = "";
pswenvio = "";

function AplicarEditAlumno(cant,matricula,nombrealumno,appaterno,apmaterno,correo,password)
{
	var cant2  = cant.trim();

	var nombre = document.getElementById("nombre"+cant2);
	var paterno= document.getElementById("paterno"+cant2);
	var materno= document.getElementById("materno"+cant2);
	var mail= document.getElementById("mail"+cant2);
	var psw= document.getElementById("psw"+cant2);
	
    
	if (nombre.value == "" )
	{
		nombreenvio = nombrealumno ;
	}else
	{
		nombreenvio = nombre.value;
	}


	if (paterno.value == "" )
	{
		paternoenvio = appaterno ;
	}else
	{
		paternoenvio =  paterno.value ;
	}


	if (materno.value == "" )
	{
		maternoenvio = apmaterno ;
	}else
	{
		maternoenvio = materno.value ;
	}


	if (mail.value == "" )
	{	
		mailenvio = correo;
	}else
	{
		mailenvio = mail.value;	
	}


	if (psw.value == "" )
	{
		pswenvio = password;
	}else
	{
		pswenvio = psw.value;
	}

	//alert("Matricula: "+matricula+" Nombre: "+nombreenvio+" CORREO: "+mailenvio+" MATERNO: "+maternoenvio+" PATERNO: "+paternoenvio+" PASSWORD: "+pswenvio);
	Swal.fire({
      title: '¿Estas seguro de editarlo	?',
      showDenyButton: true,
      showCancelButton: true,
      confirmButtonText: `Editar Alumno`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {


       $.ajax({
      url: 'UpdateAlumnosAdmin.php',
      type: 'POST',
      data: 'matricula_alumno=' + matricula+"&nombre_alumno="+nombreenvio+"&paterno_alumno="+paternoenvio+"&materno_alumno="+maternoenvio+"&correo_alumno="+mailenvio+"&psw_alumno="+pswenvio,
      success: function(data) {
                   setTimeout('Redireccion()',1000);  
                }
            }); 

        Swal.fire('El Elemento se Edito!', '', 'success')
      } else if (result.isDenied) {
      	nombre.value = "";
		paterno.value = "";
		materno.value = "";
		mail.value = "";
		psw.value = "";

		nombre.disabled = true;
		paterno.disabled = true;
		materno.disabled = true;
		mail.disabled = true;
		psw.disabled = true;

		document.getElementById("AplicaEditAlumno"+cant2).classList.remove("MostrarElemento");
	    document.getElementById("AplicaEditAlumno"+cant2).classList.add("OcultarElemento");
        Swal.fire('Operación Abortada.', '', 'warning')
      }
    })
}


function EiminarAlumno(matricula)
{
	Swal.fire({
      title: '¿Estas seguro de Eliminar al Alumno?',
      showDenyButton: true,
      showCancelButton: true,
      confirmButtonText: `Eliminar Alumno`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {


       $.ajax({
      url: 'DeleteAlumnoAdmin.php',
      type: 'POST',
      data: 'matricula_alumno=' + matricula,
      success: function(data) {
                   setTimeout('Redireccion()',1000);  
                }
            }); 

        Swal.fire('El Elemento se Elimino!', '', 'success')
      } else if (result.isDenied) {
      	
        Swal.fire('Operación Abortada.', '', 'warning')
      }
    })
}




/// FUNCION PARA LA AGREGADO EDICION Y ELIMINADO DE PROFESORES 
/**
 * [InsertarProfesor description]
 *  Verifica los valores de las entradas conrrespondientes a la 
 *  información de un profesor posterior a que dicha información 
 *  este correcta se realiza la inserción de estos elementos mediante 
 *  ajax a la base de datos.
 */
function InsertarProfesor()
{
	var profesor_mat = document.getElementById("profesor_mat");
	var nombre_profe = document.getElementById("nombre_profe");
	var apellidop_profe = document.getElementById("apellidop_profe");
	var apellidom_profe = document.getElementById("apellidom_profe");
	var mail_profe = document.getElementById("mail_profe");
	var pass_profe= document.getElementById("pass_profe");
	 controlmatricula2 = 0 ;
	 controlname2 = 0 ;
	 controlmaterno2 =  0;
	 controlpaterno2= 0;
	 controlmail2 = 0 ; 
	 controlpass22 = 0;
	if ( profesor_mat.value == "")
	{
	   profesor_mat.classList.add("is-invalid");
       profesor_mat.classList.remove("is-valid");
       controlmatricula2 = 0;
	}else{
		profesor_mat.classList.remove("is-invalid");
       profesor_mat.classList.add("is-valid");
        controlmatricula2 = 1;
	}

	if (nombre_profe.value == "")
	{
	   nombre_profe.classList.add("is-invalid");
       nombre_profe.classList.remove("is-valid");
       controlname2 = 0 ;
	}else{
		nombre_profe.classList.remove("is-invalid");
       nombre_profe.classList.add("is-valid");
       controlname2 = 1; 
	}
		if (apellidop_profe.value == "")
	{
	   apellidop_profe.classList.add("is-invalid");
       apellidop_profe.classList.remove("is-valid");
       controlpaterno2 = 0 ; 
	}else{
		apellidop_profe.classList.remove("is-invalid");
       apellidop_profe.classList.add("is-valid");
       controlpaterno2 = 1;
	}
		if (apellidom_profe.value == "")
	{
	   apellidom_profe.classList.add("is-invalid");
       apellidom_profe.classList.remove("is-valid");
       controlmaterno2 = 0;
	}else{
		apellidom_profe.classList.remove("is-invalid");
       apellidom_profe.classList.add("is-valid");
       controlmaterno2 = 1;
	}
		if (mail_profe.value == "")
	{
	   mail_profe.classList.add("is-invalid");
       mail_profe.classList.remove("is-valid");
       controlmail2 = 0;
	}else{
		mail_profe.classList.remove("is-invalid");
       mail_profe.classList.add("is-valid");
       controlmail2 = 1;
	}
		if (pass_profe.value == "")
	{
	   pass_profe.classList.add("is-invalid");
       pass_profe.classList.remove("is-valid");
       controlpass2 = 0; 
	}else{
		pass_profe.classList.remove("is-invalid");
       pass_profe.classList.add("is-valid");
       controlpass2 = 1; 
	}
	if ( controlmatricula2 == 1  && controlname2 == 1 && controlmaterno2 == 1 && controlpaterno2 == 1 && controlmail2 == 1 && controlpass2 == 1)
	{
		datosprofe = {"matricula":profesor_mat.value};
          $.ajax({
      url: 'VerificarProfesor.php',
      type: 'POST',
      data: datosprofe
      }).done(function(respuesta){
		if (respuesta.estado == "ok") {
			console.log(JSON.stringify(respuesta));
			alert("hola");
			var filas = respuesta.fila;

			Swal.fire({
			  icon: 'warning',
			  title: 'Opps!!',
			  text: 'El profesor que ya se encuentra registrado',
			  showConfirmButton: true,
			  timer: 4000
			})

		 }else{
	              $.ajax({
	      url: 'InsertarProfesorAdmin.php',
	      type: 'POST',
	      data: "matricula_profesor="+profesor_mat.value+"&nombre_profesor="+nombre_profe.value+"&paterno_profesor="+apellidop_profe.value+"&materno_profesor="+apellidom_profe.value+"&correo_profesor="+mail_profe.value+"&psw_profesor="+pass_profe.value,
	      success: function(data) {
				                  Swal.fire({
						  icon: 'success',
						  title: 'Se ha completado',
						  text: 'El profesor se ha registrado exitosamente!!',
						  showConfirmButton: true,
						  timer: 1000
						})
				         setTimeout('Redireccion()',1000);  
	                }
	            }); 
		 }
     }); 	
	}
}




var Editarono2 = 0;

/**
 * [EditProfe description]
 * Función encargada de la validación de las entradas 
 * @param {[Int]} cant [Permite acceder al elemento deseado mediante dicho parametro]
 */
function EditProfe(cant)
{	

	var cant2  = cant.trim();
	var matricula= document.getElementById("matriculaprofe"+cant2) ;
	var nombre = document.getElementById("nombreprofe"+cant2);
	var paterno= document.getElementById("paternoprofe"+cant2);
	var materno= document.getElementById("maternoprofe"+cant2);
	var mail= document.getElementById("mailprofe"+cant2);
	var psw= document.getElementById("pswprofe"+cant2);
	if ( Editarono2 == 0 )
	{
	    document.getElementById("AplicaEditProfe"+cant2).classList.add("MostrarElemento");
	    document.getElementById("AplicaEditProfe"+cant2).classList.remove("OcultarElemento");
	    //document.getElementById("matricula"+cant2).disabled = false;
	    document.getElementById("nombreprofe"+cant2).disabled = false;
	    document.getElementById("paternoprofe"+cant2).disabled = false;
	    document.getElementById("maternoprofe"+cant2).disabled = false;
	    document.getElementById("mailprofe"+cant2).disabled = false;
	    document.getElementById("pswprofe"+cant2).disabled = false;

		Editarono2 = 1;
	}else{
		document.getElementById("AplicaEditProfe"+cant2).classList.remove("MostrarElemento");
	    document.getElementById("AplicaEditProfe"+cant2).classList.add("OcultarElemento");
	    document.getElementById("matriculaprofe"+cant2).disabled = true;
	    document.getElementById("nombreprofe"+cant2).disabled = true;
	    document.getElementById("paternoprofe"+cant2).disabled = true;
	    document.getElementById("maternoprofe"+cant2).disabled = true;
	    document.getElementById("mailprofe"+cant2).disabled = true;
	    document.getElementById("pswprofe"+cant2).disabled = true;

	    document.getElementById("matriculaprofe"+cant2).value = "";
	    document.getElementById("nombreprofe"+cant2).value = "";
	    document.getElementById("paternoprofe"+cant2).value = "";
	    document.getElementById("maternoprofe"+cant2).value = "";
	    document.getElementById("mailprofe"+cant2).value = "";
	    document.getElementById("pswprofe"+cant2).value = "";
	
		nombre.classList.remove("is-invalid");
		nombre.classList.remove("is-valid");
		paterno.classList.remove("is-invalid");
		paterno.classList.remove("is-valid");
		materno.classList.remove("is-invalid");
		materno.classList.remove("is-valid");
		mail.classList.remove("is-invalid");
		mail.classList.remove("is-valid");
		psw.classList.remove("is-invalid");
		psw.classList.remove("is-valid");


		Editarono2 = 0 ;
	}
}


paternoenvio = "";
nombreenvio = "";
maternoenvio = "";
mailenvio = "";
pswenvio = "";

/**
 * [AplicarEditProfe description]
 *  Función encargada de realizar realizar el envio de las entradas
 *  percibidas mediante ajax, al archivo UpdateProfesorAdmin.php
 *  y aplicar los cambios realzados a la edición
 * @param {[int]} cant         [description]
 * @param {[String]} matricula    [Almacena la la matricula de la información extraida del profesor]
 * @param {[String]} nombrealumno [Almacena un nombre]
 * @param {[String]} appaterno    [almacena un apellido paterno de un usuario]
 * @param {[String]} apmaterno    [Almacena un apellido materno de un usuario]
 * @param {[String]} correo       [Almacena el correo de un usuario]
 * @param {[String]} password     [Almacena el password de un usario]
 */
function AplicarEditProfe(cant,matricula,nombrealumno,appaterno,apmaterno,correo,password)
{
	var cant2  = cant.trim();

	var nombre = document.getElementById("nombreprofe"+cant2);
	var paterno= document.getElementById("paternoprofe"+cant2);
	var materno= document.getElementById("maternoprofe"+cant2);
	var mail= document.getElementById("mailprofe"+cant2);
	var psw= document.getElementById("pswprofe"+cant2);
	if (nombre.value == "" )
	{
		nombreenvio = nombrealumno ;
	}else
	{
		nombreenvio = nombre.value;
	}

	if (paterno.value == "" )
	{
		paternoenvio = appaterno ;
	}else
	{
		paternoenvio =  paterno.value ;
	}

	if (materno.value == "" )
	{
		maternoenvio = apmaterno ;
	}else
	{
		maternoenvio = materno.value ;
	}

	if (mail.value == "" )
	{	
		mailenvio = correo;
	}else
	{
		mailenvio = mail.value;	
	}

	if (psw.value == "" )
	{
		pswenvio = password;
	}else
	{
		pswenvio = psw.value;
	}
	//alert("Matricula: "+matricula+" Nombre: "+nombreenvio+" CORREO: "+mailenvio+" MATERNO: "+maternoenvio+" PATERNO: "+paternoenvio+" PASSWORD: "+pswenvio);
	Swal.fire({
      title: '¿Estas seguro de editar al Profesor?',
      showDenyButton: true,
      showCancelButton: true,
      confirmButtonText: `Editar Profesor`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {

       $.ajax({
      url: 'UpdateProfesorAdmin.php',
      type: 'POST',
      data: 'matricula_profesor=' + matricula+"&nombre_profesor="+nombreenvio+"&paterno_profesor="+paternoenvio+"&materno_profesor="+maternoenvio+"&correo_profesor="+mailenvio+"&psw_profesor="+pswenvio,
      success: function(data) {
                   setTimeout('Redireccion()',1000);  
                }
            }); 
        Swal.fire('El Elemento se Edito!', '', 'success')
      } else if (result.isDenied) {
      	nombre.value = "";
		paterno.value = "";
		materno.value = "";
		mail.value = "";
		psw.value = "";
		nombre.disabled = true;
		paterno.disabled = true;
		materno.disabled = true;
		mail.disabled = true;
		psw.disabled = true;
		document.getElementById("AplicaEditProfe"+cant2).classList.remove("MostrarElemento");
	    document.getElementById("AplicaEditProfe"+cant2).classList.add("OcultarElemento");
        Swal.fire('Operación Abortada.', '', 'warning')
      }
    })
}

/**
 * [EliminarProfe description]
 * Funcion encargada de realizar la eliminacion de un usuario dicha operación
 * mediante el envío de los datos con ajax mediatne el método POST 
 * al archibo DeleteProfesorAdmin.php 
 * @param {[String]} matricula [Almacena la matricula de un profesor]
 */
function EliminarProfe(matricula)
{
	Swal.fire({
      title: '¿Estas seguro de Eliminar al Profesor?',
      showDenyButton: true,
      showCancelButton: true,
      confirmButtonText: `Eliminar Profesor`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {


       $.ajax({
      url: 'DeleteProfesorAdmin.php',
      type: 'POST',
      data: 'matricula_profesor=' + matricula,
      success: function(data) {
                   setTimeout('Redireccion()',1000);  
                }
            }); 

        Swal.fire('El Elemento se Elimino!', '', 'success')
      } else if (result.isDenied) {
      	
        Swal.fire('Operación Abortada.', '', 'warning')
      }
    })
}



// FUNCION PARA LA GESTION DE ADMINISTRADORES
/**
 * Description
 * Función encargada de realizar la evaucación de las entradas 
 * dadas por el usuario para su posterior envio mediante el método 
 * POST con AJAX al archivo InsertarAdministradorAdmin despues de realizar
 * una evaluacion de la existencia del usuario.
 */
function InsertarAdministrador()
{
	var admin_mat = document.getElementById("admin_mat");
	var nombre_admin = document.getElementById("nombre_admin");
	var apellidop_admin = document.getElementById("apellidop_admin");
	var apellidom_admin = document.getElementById("apellidom_admin");
	var mail_admin = document.getElementById("mail_admin");
	var pass_admin= document.getElementById("pass_admin");

	 controlmatricula3 = 0 ;
	 controlname3 = 0 ;
	 controlmaterno3 =  0;
	 controlpaterno3= 0;
	 controlmail3 = 0 ; 
	 controlpass3 = 0;

	if ( admin_mat.value == "")
	{
	   admin_mat.classList.add("is-invalid");
       admin_mat.classList.remove("is-valid");
       controlmatricula3 = 0;
	}else{
		admin_mat.classList.remove("is-invalid");
       admin_mat.classList.add("is-valid");
        controlmatricula3 = 1;
	}

	if (nombre_admin.value == "")
	{
	   nombre_admin.classList.add("is-invalid");
       nombre_admin.classList.remove("is-valid");
       controlname3 = 0 ;
	}else{
		nombre_admin.classList.remove("is-invalid");
       nombre_admin.classList.add("is-valid");
       controlname3 = 1; 
	}
		if (apellidop_admin.value == "")
	{
	   apellidop_admin.classList.add("is-invalid");
       apellidop_admin.classList.remove("is-valid");
       controlpaterno3 = 0 ; 
	}else{
		apellidop_admin.classList.remove("is-invalid");
       apellidop_admin.classList.add("is-valid");
       controlpaterno3 = 1;
	}
		if (apellidom_admin.value == "")
	{
	   apellidom_admin.classList.add("is-invalid");
       apellidom_admin.classList.remove("is-valid");
       controlmaterno3 = 0;
	}else{
		apellidom_admin.classList.remove("is-invalid");
       apellidom_admin.classList.add("is-valid");
       controlmaterno3 = 1;
	}
		if (mail_admin.value == "")
	{
	   mail_admin.classList.add("is-invalid");
       mail_admin.classList.remove("is-valid");
       controlmail3 = 0;
	}else{
		mail_admin.classList.remove("is-invalid");
       mail_admin.classList.add("is-valid");
       controlmail3 = 1;
	}
		if (pass_admin.value == "")
	{
	   pass_admin.classList.add("is-invalid");
       pass_admin.classList.remove("is-valid");
       controlpass3 = 0; 
	}else{
		pass_admin.classList.remove("is-invalid");
       pass_admin.classList.add("is-valid");
       controlpass3 = 1; 
	}

	if ( controlmatricula3 == 1  && controlname3 == 1 && controlmaterno3 == 1 && controlpaterno3 == 1 && controlmail3 == 1 && controlpass3 == 1)
	{
		datosadmin = {"matricula":admin_mat.value};
          $.ajax({
      url: 'VerificarAdministrador.php',
      type: 'POST',
      data: datosadmin
      }).done(function(respuesta){
		if (respuesta.estado == "ok") {
			console.log(JSON.stringify(respuesta));
			//alert("hola");
			var filas = respuesta.fila;
			Swal.fire({
			  icon: 'warning',
			  title: 'Opps!!',
			  text: 'El Administrador que ya se encuentra registrado',
			  showConfirmButton: true,
			  timer: 4000
			})

		 }else{
	              $.ajax({
	      url: 'InsertarAdministradorAdmin.php',
	      type: 'POST',
	      data: "matricula_administrador="+admin_mat.value+"&nombre_administrador="+nombre_admin.value+"&paterno_administrador="+apellidop_admin.value+"&materno_administrador="+apellidom_admin.value+"&correo_administrador="+mail_admin.value+"&psw_administrador="+pass_admin.value,
	      success: function(data) {
				                  Swal.fire({
						  icon: 'success',
						  title: 'Se ha completado',
						  text: 'El Administrador se ha registrado exitosamente!!',
						  showConfirmButton: true,
						  timer: 1000
						})

				         setTimeout('Redireccion()',1000);  
	                }
	            }); 
		 }


		


     }); 


		
	}
}




var Editarono3 = 0;

/**
 * [EditAdmin description]
 * Función encargada de habilitar las casillas de edición 
 * de los campos seleccionados, con la ayuda del parametro 
 * cant el cual permite indicar el campos que se requiere
 * @param {[cant]} cant [Valor indicador del valor dentro del array al cual se quiere acceder]
 */
function EditAdmin(cant)
{	

	var cant2  = cant.trim();
	var matricula= document.getElementById("matriculaadmin"+cant2) ;
	var nombre = document.getElementById("nombreadmin"+cant2);
	var paterno= document.getElementById("paternoadmin"+cant2);
	var materno= document.getElementById("maternoadmin"+cant2);
	var mail= document.getElementById("mailadmin"+cant2);
	var psw= document.getElementById("pswadmin"+cant2);
	if ( Editarono3 == 0 )
	{
	    document.getElementById("AplicaEditAdmin"+cant2).classList.add("MostrarElemento");
	    document.getElementById("AplicaEditAdmin"+cant2).classList.remove("OcultarElemento");
	    //document.getElementById("matricula"+cant2).disabled = false;
	    document.getElementById("nombreadmin"+cant2).disabled = false;
	    document.getElementById("paternoadmin"+cant2).disabled = false;
	    document.getElementById("maternoadmin"+cant2).disabled = false;
	    document.getElementById("mailadmin"+cant2).disabled = false;
	    document.getElementById("pswadmin"+cant2).disabled = false;

		Editarono3 = 1;
	}else{
		document.getElementById("AplicaEditAdmin"+cant2).classList.remove("MostrarElemento");
	    document.getElementById("AplicaEditAdmin"+cant2).classList.add("OcultarElemento");
	    document.getElementById("matriculaadmin"+cant2).disabled = true;
	    document.getElementById("nombreadmin"+cant2).disabled = true;
	    document.getElementById("paternoadmin"+cant2).disabled = true;
	    document.getElementById("maternoadmin"+cant2).disabled = true;
	    document.getElementById("mailadmin"+cant2).disabled = true;
	    document.getElementById("pswadmin"+cant2).disabled = true;

	    document.getElementById("matriculaadmin"+cant2).value = "";
	    document.getElementById("nombreadmin"+cant2).value = "";
	    document.getElementById("paternoadmin"+cant2).value = "";
	    document.getElementById("maternoadmin"+cant2).value = "";
	    document.getElementById("mailadmin"+cant2).value = "";
	    document.getElementById("pswadmin"+cant2).value = "";
	
		nombre.classList.remove("is-invalid");
		nombre.classList.remove("is-valid");
		paterno.classList.remove("is-invalid");
		paterno.classList.remove("is-valid");
		materno.classList.remove("is-invalid");
		materno.classList.remove("is-valid");
		mail.classList.remove("is-invalid");
		mail.classList.remove("is-valid");
		psw.classList.remove("is-invalid");
		psw.classList.remove("is-valid");


		Editarono3 = 0 ;
	}
}


paternoenvio = "";
nombreenvio = "";
maternoenvio = "";
mailenvio = "";
pswenvio = "";

function AplicarEditAdmin(cant,matricula,nombrealumno,appaterno,apmaterno,correo,password)
{
	var cant2  = cant.trim();

	var nombre = document.getElementById("nombreadmin"+cant2);
	var paterno= document.getElementById("paternoadmin"+cant2);
	var materno= document.getElementById("maternoadmin"+cant2);
	var mail= document.getElementById("mailadmin"+cant2);
	var psw= document.getElementById("pswadmin"+cant2);
	
    
	if (nombre.value == "" )
	{
		nombreenvio = nombrealumno ;
	}else
	{
		nombreenvio = nombre.value;
	}


	if (paterno.value == "" )
	{
		paternoenvio = appaterno ;
	}else
	{
		paternoenvio =  paterno.value ;
	}


	if (materno.value == "" )
	{
		maternoenvio = apmaterno ;
	}else
	{
		maternoenvio = materno.value ;
	}


	if (mail.value == "" )
	{	
		mailenvio = correo;
	}else
	{
		mailenvio = mail.value;	
	}


	if (psw.value == "" )
	{
		pswenvio = password;
	}else
	{
		pswenvio = psw.value;
	}

	//alert("Matricula: "+matricula+" Nombre: "+nombreenvio+" CORREO: "+mailenvio+" MATERNO: "+maternoenvio+" PATERNO: "+paternoenvio+" PASSWORD: "+pswenvio);
	Swal.fire({
      title: '¿Estas seguro de editar al Administrador?',
      showDenyButton: true,
      showCancelButton: true,
      confirmButtonText: `Editar Administrador`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {


       $.ajax({
      url: 'UpdateAdministradorAdmin.php',
      type: 'POST',
      data: 'matricula_administrador=' + matricula+"&nombre_administrador="+nombreenvio+"&paterno_administrador="+paternoenvio+"&materno_administrador="+maternoenvio+"&correo_administrador="+mailenvio+"&psw_administrador="+pswenvio,
      success: function(data) {
                   setTimeout('Redireccion()',1000);  
                }
            }); 

        Swal.fire('El Elemento se Edito!', '', 'success')
      } else if (result.isDenied) {
      	nombre.value = "";
		paterno.value = "";
		materno.value = "";
		mail.value = "";
		psw.value = "";

		nombre.disabled = true;
		paterno.disabled = true;
		materno.disabled = true;
		mail.disabled = true;
		psw.disabled = true;

		document.getElementById("AplicaEditAdmin"+cant2).classList.remove("MostrarElemento");
	    document.getElementById("AplicaEditAdmin"+cant2).classList.add("OcultarElemento");
        Swal.fire('Operación Abortada.', '', 'warning')
      }
    })
}

/**
 * [EliminarAdmin description]
 * Función encargadad de realizar el envío de los datos captados
 * para su eliminación, mediante AJAX al archivo 
 * DeleteAdministradorAdmin.php, donde se realiza 
 * la eliminación en la base de datos.
 * @param {[type]} matricula [description]
 * @param {[type]} usuario   [description]
 */
function EliminarAdmin(matricula,usuario)
{

  if ( matricula != usuario  && matricula != "root" )
  {
  	Swal.fire({
      title: '¿Estas seguro de Eliminar al Administrador?',
      showDenyButton: true,
      showCancelButton: true,
      confirmButtonText: `Eliminar Administrador`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {


       $.ajax({
      url: 'DeleteAdministradorAdmin.php',
      type: 'POST',
      data: 'matricula_administrador=' + matricula,
      success: function(data) {
                   setTimeout('Redireccion()',1000);  
                }
            }); 

        Swal.fire('El Elemento se Elimino!', '', 'success')
      } else if (result.isDenied) {
      	
        Swal.fire('Operación Abortada.', '', 'warning')
      }
    })
}else{
	          Swal.fire({
						  icon: 'warning',
						  title: 'No te puedes eliminar a ti mismo ni al usuario root',
						  text: 'Opps!!',
						  showConfirmButton: true,
						  timer: 4000
						})
}
	
}