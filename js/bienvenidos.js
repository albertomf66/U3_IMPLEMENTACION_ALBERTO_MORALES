 const Alumnos = document.getElementById("Alumnos");
 const Botones = document.querySelectorAll('#Alumnos a');




  var Contenido_general = document.getElementById("Contenido_General_Alumnos");
        var VerMisClases = document.getElementById("VerClasesAlumnos");
        var UnirmeClase = document.getElementById("UnirmeClases");
        var VerEventoAlumno  = document.getElementById("VerEventosAlumnos");
        var AgregarEventoAlumno = document.getElementById("AgregarEventoAlumno");
        var EditarEventoAlumno = document.getElementById("EditarEventoAlumno");
        var EliminarEventoAlumno = document.getElementById("EliminarEventoAlumno");
        var VerMisNotasAlumno = document.getElementById("VerMisNotasAlumno");
        var PerfilAlumnos  = document.getElementById("PerfilAlumnos");
        var Reportes  = document.getElementById("Reportes");

        //var AgregarNotasAlumno = document.getElementById("AgregarNotasAlumno");
        //var EditarNotasAlumno = document.getElementById("EditarNotasAlumno");
       // var EliminarNotasAlumno = document.getElementById("EliminarNotasAlumno");


const MostrarOcultar = () =>
{
       


             Contenido_general.classList.remove("MostrarElemento");
             VerMisClases.classList.remove("MostrarElemento");
             UnirmeClase.classList.remove("MostrarElemento");
             VerEventoAlumno.classList.remove("MostrarElemento");
             AgregarEventoAlumno.classList.remove("MostrarElemento");
             EditarEventoAlumno.classList.remove("MostrarElemento");
             EliminarEventoAlumno.classList.remove("MostrarElemento");
             VerMisNotasAlumno.classList.remove("MostrarElemento");
             PerfilAlumnos.classList.remove("MostrarElemento");
              Reportes.classList.remove("MostrarElemento");
            //// AgregarNotasAlumno.classList.remove("MostrarElemento");
            //// EditarNotasAlumno.classList.remove("MostrarElemento");
            //// EliminarNotasAlumno.classList.remove("MostrarElemento");


             Contenido_general.classList.add("OcultarElemento");
             VerMisClases.classList.add("OcultarElemento");
             UnirmeClase.classList.add("OcultarElemento");
             VerEventoAlumno.classList.add("OcultarElemento");
             AgregarEventoAlumno.classList.add("OcultarElemento");
             EditarEventoAlumno.classList.add("OcultarElemento");
             EliminarEventoAlumno.classList.add("OcultarElemento");
             VerMisNotasAlumno.classList.add("OcultarElemento");
             PerfilAlumnos.classList.add("OcultarElemento");
              Reportes.classList.remove("MostrarElemento");
            //// AgregarNotasAlumno.classList.add("OcultarElemento");
            //// EditarNotasAlumno.classList.add("OcultarElemento");
            //// EliminarNotasAlumno.classList.add("OcultarElemento");



             //alert("SI ENTRO");
}

    const MenuAlumnos = (e) =>{

      

    	switch(e.target.name){
    		case "Ver_Clases":
    		  
             MostrarOcultar();
             VerMisClases.classList.add("MostrarElemento");
            
            
    		break; 
    		case "Unirme_Clase":
    		 MostrarOcultar(); 
             UnirmeClase.classList.add("MostrarElemento");
    		break; 

            case "VerEventoAlumno":
               MostrarOcultar();
               VerEventoAlumno.classList.add("MostrarElemento");
            break;

            case "AgregarEventoAlumno":
              MostrarOcultar();
              AgregarEventoAlumno.classList.add("MostrarElemento");
            break;

            case "EditarEventoAlumno":
              MostrarOcultar();
              EditarEventoAlumno.classList.add("MostrarElemento");
            break;

            case "EliminarEventoAlumno":
              MostrarOcultar();
              EliminarEventoAlumno.classList.add("MostrarElemento");
            break;

            case "VerMisNotasAlumno":
                 MostrarOcultar();
               VerMisNotasAlumno.classList.add("MostrarElemento");
            break;

          
            case "PerfilAlumnos":
                 MostrarOcultar();
               PerfilAlumnos.classList.add("MostrarElemento");
            break;

 
             case "Reportes":
                 MostrarOcultar();
               Reportes.classList.add("MostrarElemento");
            break;

           // case "AgregarNotasAlumno":
           //   MostrarOcultar();
           //  AgregarNotasAlumno.classList.add("MostrarElemento");
          
           
           // break;

           // case "EditarNotasAlumno" :
           // MostrarOcultar();
           // EditarNotasAlumno.classList.add("MostrarElemento");
           // break;

           // case "EliminarNotasAlumno":
           // MostrarOcultar();
           // EliminarNotasAlumno.classList.add("MostrarElemento");
           // break;
           
           
    	}
    }


 	Botones.forEach((botones) => {
		    botones.addEventListener('click',MenuAlumnos)
		});




var cant_total_act = document.getElementById("cant_total_act");
var cant_act_entregadas  = document.getElementById("cant_act_entregadas");
var cant_act_por_clase = document.getElementById("cant_act_por_clase");
var porcentaje_entrega = document.getElementById("porcentaje_entrega");


valor1 = 0;
valor2 = 0;
valor3 = 0 ;
function  IndiceUno(matricula)
{
   var unicamenteuno= document.getElementById("unicamenteuno").value;

    /// DEVUELVE LA CANTIDAD DE ACTIVIDADES ENTREGADAS 
    datos = {"clase":unicamenteuno};
     $.ajax({
                url: 'ConsultaJoinUno.php',
                type: 'POST',
                data: datos ,
            }).done(function(respuesta){
                if (respuesta.estado == "ok" ) {
                    console.log(JSON.stringify(respuesta));
                   var  cant = respuesta.cant;
                   console.log(cant);
                   cant_act_entregadas.innerHTML = "<h2> "+cant+" </h2>";
                  valor1 = Number(cant);                }else{
                    console.log("No");
                }
            });

    /// CANT DE ACTIVIDADES EN UNA CLASE EN ESPECIFICO
     datos = {"clase":unicamenteuno};
     $.ajax({
                url: 'ConsultaJoinDos.php',
                type: 'POST',
                data: datos ,
            }).done(function(respuesta){
                if (respuesta.estado == "ok" ) {
                    console.log(JSON.stringify(respuesta));
                   var  cant = respuesta.cant;
                   console.log(cant);
                    cant_act_por_clase.innerHTML = "<h2> "+cant+" </h2>";
                     valor2 = Number(cant);
                }else{
                    console.log("No");
                }
            });


            //ACTIVIDADES TOTALES QUE UN ALUMNO HA ENTREGADO
            datos = {"matricula":matricula};
     $.ajax({
                url: 'CantEntregasAlumno.php',
                type: 'POST',
                data: datos ,
            }).done(function(respuesta){
                if (respuesta.estado == "ok" ) {
                    console.log(JSON.stringify(respuesta));
                   var  cant = respuesta.cant;
                   console.log(cant);
                   cant_total_act.innerHTML = "<h2> "+respuesta.cant+" </h2>";
                   valor3 = Number(cant);
                }else{
                    console.log("No");
                }
            });

            var porcentaje = +(1 * 100) / 1;
            console.log("Hola"+valor1);
            porcentaje_entrega.innerHTML = "<h2> SE HA COMPLETADO EL: "+porcentaje+"% de las Actividades </h2>";



}