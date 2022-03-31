<?php
	require_once "../global.php"; 

	$idActividades =$_POST["idActividades"];
	$nombre_actividad  =$_POST["nombre_actividad"];
	$descripcion_actividad = $_POST["descripcion_actividad"];
	$tipo_evidencia = $_POST["tipo_evidencia"];
	$Tipo_actividad = $_POST["Tipo_actividad"];
	$FechaEntrega = $_POST["FechaEntrega"];
	$HoraEntrega = $_POST["HoraEntrega"];
	$FechaCreacion = $_POST["FechaCreacion"];
	$HoraCreacion = $_POST["HoraCreacion"];
	$ArchivoActividad = $_POST["ArchivoActividad"];
	$Codigo = $_POST["clase_actividad"];

	if ($descripcion_actividad == "")
	{
		$descripcion_actividad = "Sin Descripcion.";
	}

	// CONEXION A LA BASE DE DATOS
	$conexion  = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME_BD);

	$consulta = "INSERT INTO actividades ( idActividades , nombre_actividad , descripcion_actividad 

	, tipo_evidencia , Tipo_actividad ,FechaEntrega , HoraEntrega , FechaCreacion , HoraCreacion ,

	 ArchivoActividad)

	  VALUES 
	( '$idActividades' , '$nombre_actividad' , '$descripcion_actividad' , '$tipo_evidencia'
	, '$Tipo_actividad' , '$FechaEntrega' ,'$HoraEntrega' , '$FechaCreacion' , '$HoraCreacion' , '$ArchivoActividad')";


	$resultado = mysqli_query($conexion,$consulta);

	$consulta2 = " INSERT INTO actividadclaseprofesor (idActividadClaseProfesor , idActividades , codigoclase, estatusactividad) VALUES 
	 ('$idActividades','$idActividades','$Codigo','Activo')";  

	  


	mysqli_free_result($resultado);
	mysqli_close($conexion);

	
 ?>