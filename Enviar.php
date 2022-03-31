formData.append('file',files);
$.ajax({
url: 'CargarArchivo.php',
type: 'POST',
data: formData,
contentType: false,
processData: false,
}).done(function(respuesta){
if (respuesta.estado == "ok") {
console.log(JSON.stringify(respuesta));
console.log((respuesta.fichero ));


//   alert(respuesta.fichero);
$.ajax({
url: 'InsertarActividades.php',
type: 'POST',
data: 'idActividades=' + idActividades+"&nombre_actividad="+Nombre_actividad+"&descripcion_actividad="+descripcion+"&tipo_evidencia="+tipoevidencia+"&Tipo_actividad="+tipoactividad+"&FechaEntrega="+FechaEntregar+"&HoraEntrega="+horaentrega+"&FechaCreacion="+FechaActual+"&HoraCreacion="+horacreacion+"&ArchivoActividad="+respuesta.fichero,
success: function(data) {
Swal.fire({
icon: 'success',
title: 'Actividad Creada con Exito',
text: 'Opps!!',
showConfirmButton: true,
})
setTimeout('redireccion()',1000);
}
});





}
})