

const Eventos_Pendientes = document.getElementById("eventos_pendientes_row");
const Input = document.querySelectorAll('#eventos_pendientes_row input');
const Input_2 = document.querySelectorAll('#eventos_pendientes_row input');

var general = document.getElementById("table_general");
var asc = document.getElementById("table_asc");
var desc = document.getElementById("table_desc");
var important = document.getElementById("table_important");


var general_2 = document.getElementById("table_general_2");
var asc_2 = document.getElementById("table_asc_2");
var desc_2 = document.getElementById("table_desc_2");
var important_2 = document.getElementById("table_important_2");

const MostrarOcultarEvento = () =>
{
	general.classList.remove("MostrarElemento");
	asc.classList.remove("MostrarElemento");
	desc.classList.remove("MostrarElemento");
	important.classList.remove("MostrarElemento");

	asc.classList.add("OcultarElemento");
	important.classList.add("OcultarElemento");
	desc.classList.add("OcultarElemento");
	general.classList.add("OcultarElemento");

}


const MostrarOcultarEvento_2 = () =>
{

	general_2.classList.remove("MostrarElemento");
	asc_2.classList.remove("MostrarElemento");
	desc_2.classList.remove("MostrarElemento");
	important_2.classList.remove("MostrarElemento");

	asc_2.classList.add("OcultarElemento");
	important_2.classList.add("OcultarElemento");
	desc_2.classList.add("OcultarElemento");
	general_2.classList.add("OcultarElemento");
}




const Filtros  = (e)=>{
	switch(e.target.name)
	{

		case "btn_general":
		MostrarOcultarEvento(); // funcion que resetea los elementos para ocultarlos
        general.classList.add("MostrarElemento");
		break;

		case "btn_asc":
		MostrarOcultarEvento(); // funcion que resetea los elementos para ocultarlos
        asc.classList.add("MostrarElemento");
		break;

		case "btn_desc":
		MostrarOcultarEvento(); // funcion que resetea los elementos para ocultarlos
        desc.classList.add("MostrarElemento");
		break;

		case "btn_importancia":
		MostrarOcultarEvento(); // funcion que resetea los elementos para ocultarlos
        important.classList.add("MostrarElemento");
		break;
	}
}


const Filtros_2 = (e)=>{
	switch(e.target.name)
	{

		case "btn_general_2":
		MostrarOcultarEvento_2(); // funcion que resetea los elementos para ocultarlos
        general_2.classList.add("MostrarElemento");
		break;

		case "btn_asc_2":
		MostrarOcultarEvento_2(); // funcion que resetea los elementos para ocultarlos
        asc_2.classList.add("MostrarElemento");
		break;

		case "btn_desc_2":
		MostrarOcultarEvento_2(); // funcion que resetea los elementos para ocultarlos
        desc_2.classList.add("MostrarElemento");
		break;

		case "btn_importancia_2":
		MostrarOcultarEvento_2(); // funcion que resetea los elementos para ocultarlos
        important_2.classList.add("MostrarElemento");
		break;


	}
}




Input.forEach((Input) => {
    // Se mantiene escuchando 
    Input.addEventListener('click',Filtros);
});


Input_2.forEach((Input) => {
    // Se mantiene escuchando 
    Input.addEventListener('click',Filtros_2);
});