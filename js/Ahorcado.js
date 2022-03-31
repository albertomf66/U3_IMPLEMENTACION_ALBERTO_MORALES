
const AhorcadoBody = document.getElementById("AhorcadoBody");
const inputahorcado = document.querySelectorAll("#AhorcadoBody input");

var  Entrada  = document.getElementById("entrada_letra");

var num_pregunta = document.getElementById("num_pregunta");
var contador_pregunta = document.getElementById("contador_pregunta").value;
var intentos = document.getElementById("intentos");
var frase    = document.getElementById("frase");


var cant_ask = document.getElementById("cant_pregunta").value;
var respuesta_prueba = document.getElementById("respuesta").value;
var tamanio_nuevo = document.getElementById("tamanio_nuevo");

var tam_temp = Entrada.value;

// VALOR DE CADA PREGUNTA
calificacion = 10 / cant_ask; 

// CALIFICACION TOTAL SUMADA
calif_total = 0;

// CONTADOR DE INTENTOS
cont_global = 3;
cont_temp = 1;

// CONTADOR DE NÚMERO DE PREGUNTA. 
cont_num_pregunta = 1;

 prueba = " 0 ";


function redireccion(){
    window.location = "Alumno.php";
}

if ( contador_pregunta == "1")
{
  num_pregunta.innerHTML = " Pregunta # "+cont_num_pregunta;
  intentos.innerHTML     = "Te quedan # "+cont_global+" intentos";
  

  console.log(respuesta_prueba.length);
  for (var i = 0; i < respuesta_prueba.length-1; i++) 
  {
   
    prueba = prueba.concat(cont_temp);
    cont_temp+= 1;
  }
  frase.innerHTML  = "<h1> "+prueba+" </h1>";

}




control_entrada = 0 ;
const ValidaAhorcado = (e) =>
  {
    switch(e.target.name)
    { 
       case "btn_comprobacion":

       var temp = Entrada.value;
         if ( Entrada.value == "" || temp.length >1)
           {
              Entrada.classList.remove("is-valid");
              Entrada.classList.add("is-invalid");
              control_entrada = 0;
           }else
           {
              Entrada.classList.add("is-valid");
              Entrada.classList.remove("is-invalid");
              control_entrada = 1 ;
              BuscarEntrada();
           }
       break;

       case "entrada_letra":
       var temp = Entrada.value;
       if ( Entrada.value == "" || temp.length >1 )
           {
              Entrada.classList.remove("is-valid");
              Entrada.classList.add("is-invalid");
                  control_entrada = 0;
           }else
           {
              Entrada.classList.add("is-valid");
              Entrada.classList.remove("is-invalid");
              control_entrada = 1;
           }
       break;

    }
  }

function BuscarEntrada()
{
  var respuesta = document.getElementById("respuesta").value;
  var buscado  =  Entrada.value;
  var request  = document.getElementById("respuesta");
  var img_ahorcado = document.getElementById("img_ahorcado");
  respuesta = respuesta.toUpperCase();
  buscado = buscado.toUpperCase();


   var respuestanewajax = document.getElementById("respuesta");
    var idAct_registro = document.getElementById("idAct_registro").value
    var preguntah2 = document.getElementById("preguntah2");
  //console.log(buscado);
  //console.log(respuesta.search(buscado));

  if ( cont_global > 0 )
  {
     if ( respuesta.search(buscado) == -1 )
      { 
        cont_global = cont_global - 1;
         intentos.innerHTML  = "Te quedan # "+ cont_global + " intentos" ;  

         if ( cont_global == 1){
            img_ahorcado.src = "../img/ahorcado/2.png"
         }else if ( cont_global == 0)
         {
           img_ahorcado.src = "../img/ahorcado/3.png"
         }else 
         {
           img_ahorcado.src = "../img/ahorcado/0.png"
         }

      }else{
       // console.log("Hola");
        var Indices = [];
          
         var prueba_mayus = prueba.toUpperCase();
        
          prueba_mayus = prueba_mayus.replace(/\s+/g, '')
          respuesta= respuesta.replace(/\s+/g, '')
          if (prueba_mayus != respuesta) 
          {
             
              for (var i = 0; i < respuesta.length ; i++) 
              {
                   if ( respuesta[i] == buscado)
                   {

                      Indices[i] = i;
                     prueba =  prueba.replace(i,buscado);
                     //  console.log("Hola prueba");
                      //prueba[i] = buscado;
                      //console.log(Indices[i]);
                   }
                  // console.log( prueba.replace("0","E"));

                   console.log(prueba);
                   frase.innerHTML  = "<h1> "+prueba+" </h1>";
              }

            }else{
              console.log("Yes");
               Swal.fire('Lo haz completado', '', 'success')
               calif_total = calif_total + calificacion;
               if ( cont_num_pregunta == cant_ask)
               {
                  Swal.fire('Lo has Terminado con una calificacion de '+ calif_total, '', 'success')

                  setTimeout('redireccion()',2000);
               }else{
                               datos = {"id":idAct_registro,"limit":cont_num_pregunta};
     $.ajax({
                url: 'RegistroAhorcado.php',
                type: 'POST',
                data: datos ,
            }).done(function(respuesta){
                if (respuesta.estado == "ok" ) {
                    console.log(JSON.stringify(respuesta));
                   var  respuesta_ajax = respuesta.Responde;
                   var  pregunta_ajax = respuesta.Pregunta;
                   var  id_ajax = respuesta.idPreguntasActividad;

                   respuestanewajax.value = respuesta_ajax;
                   preguntah2.innerHTML  = pregunta_ajax;
                   request.value = respuesta_ajax;
                   cont_num_pregunta = cont_num_pregunta+1;
                   img_ahorcado.src = "../img/ahorcado/1.png"
                   num_pregunta.innerHTML = " Pregunta # "+cont_num_pregunta;

                    prueba2 = " 0 ";

                    tam_new = " _ ";
                    cont_temp2 = 1;
                    cont_global = 3;
                     intentos.innerHTML  = "Te quedan # "+ cont_global + " intentos" ;  
                    console.log(respuesta_ajax);
                   for (var i = 0; i < respuesta_ajax.length-1; i++) 
                    {
                     
                      prueba2 = prueba2.concat(cont_temp2);
                      tam_new = tam_new.concat('_');
                      cont_temp2+= 1;
                    }
                    frase.innerHTML  = "<h1> "+prueba2+" </h1>";
                    prueba = prueba2;
                    tamanio_nuevo.innerHTML  = "<h2> "+tam_new+" </h2>";
                   //console.log(respuesta_ajax);
                }else{
                    console.log("No");
                }
            });



               }



            }

            


       

      }
  }else{
    var respuestanewajax = document.getElementById("respuesta");
    var idAct_registro = document.getElementById("idAct_registro").value
    var preguntah2 = document.getElementById("preguntah2");
    console.log(idAct_registro);
    Swal.fire('Haz perdido las oportunidades', '', 'warning')

      if ( cont_num_pregunta == cant_ask)
               {
                  calif_total = calif_total + 0;
                 Swal.fire('Lo has Terminado con una calificacion de '+ calif_total, '', 'success')

                   setTimeout('redireccion()',2000);

               }else{

                 datos = {"id":idAct_registro,"limit":cont_num_pregunta};
     $.ajax({
                url: 'RegistroAhorcado.php',
                type: 'POST',
                data: datos ,
            }).done(function(respuesta){
                if (respuesta.estado == "ok" ) {
                    console.log(JSON.stringify(respuesta));
                   var  respuesta_ajax = respuesta.Responde;
                   var  pregunta_ajax = respuesta.Pregunta;
                   var  id_ajax = respuesta.idPreguntasActividad;

                   respuestanewajax.value = respuesta_ajax;
                   preguntah2.innerHTML  = pregunta_ajax;
                   request.value = respuesta_ajax;
                   cont_num_pregunta = cont_num_pregunta+1;
                   img_ahorcado.src = "../img/ahorcado/1.png"
                   num_pregunta.innerHTML = " Pregunta # "+cont_num_pregunta;

                    prueba2 = " 0 ";

                    tam_new = " _ ";
                    cont_temp2 = 1;
                    cont_global = 3;
                     intentos.innerHTML  = "Te quedan # "+ cont_global + " intentos" ;  
                    console.log(respuesta_ajax);
                   for (var i = 0; i < respuesta_ajax.length-1; i++) 
                    {
                     
                      prueba2 = prueba2.concat(cont_temp2);
                      tam_new = tam_new.concat('_');
                      cont_temp2+= 1;
                    }
                    frase.innerHTML  = "<h1> "+prueba2+" </h1>";
                    prueba = prueba2;
                    tamanio_nuevo.innerHTML  = "<h2> "+tam_new+" </h2>";
                   //console.log(respuesta_ajax);
                }else{
                    console.log("No");
                }
            });






               }





    


  }

}

inputahorcado.forEach((input) => {
    // Se mantiene escuchando 
    input.addEventListener('click',ValidaAhorcado); 
    input.addEventListener('change',ValidaAhorcado);
    //input.addEventListener('blur',ValidaAhorcado);
   // input.addEventListener('keyup',ValidaAhorcado);
});
