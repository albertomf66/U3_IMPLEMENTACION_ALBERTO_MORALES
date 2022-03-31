<?php 
 	require_once "./global.php"; 
	$Usuario = $_POST['Usuario'];	
	$Contraseña = $_POST['Contraseña'];
	session_start();
	$_SESSION['Usuario'] = $Usuario;


	// CONEXION A LA BASE DE DATOS
	$conexion  =mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME_BD);

	// ALUMNOS CONSULTAS
	$consultaAlumno = " Select * from alumnos where  matricula_alumno = '$Usuario' and psw_alumno = '$Contraseña'";
	$resultadoAlumno = mysqli_query($conexion,$consultaAlumno);

	$filasAlumno = mysqli_num_rows($resultadoAlumno);

	if($filasAlumno>0)
	{
		header("Location: ModuloAlumnos/Alumno.php");
	}else{ // SINO HAY ALGUNA COINCIDENCIA CON ALGÚN ALUMNO BUSCARÁ EN LA TABLA DE PROFESORES
		// CONSULTA PROFESOR
		$consultaProfesor = " Select * from profesores where  matricula_profesor = '$Usuario' and psw_profesor = '$Contraseña'";
		$resultadoProfesor = mysqli_query($conexion,$consultaProfesor);
		$filasProfesor = mysqli_num_rows($resultadoProfesor);

		if($filasProfesor>0)
		 {
		  header("Location: ModuloProfesores/Profesor.php");
	     }else{// SINO HAY ALGUNA COINCIDENCIA CON ALGUN PROFESOR BUSCARA EN LA TABLA DE ADMINISTRADORES

		    // CONSULTA ADMINISTRADOR
			$consultaAdministrador = " Select * from administrador where  matricula_administrador = '$Usuario' and psw_administrador = '$Contraseña'";
			$resultadoAdministrador = mysqli_query($conexion,$consultaAdministrador);
			$filasAdministrador = mysqli_num_rows($resultadoAdministrador);

			if($filasAdministrador>0)
			 {
			  header("Location: ModuloAdministrador/Administrador.php");
		     }else{
		     	 header("Location: CerrarSesionError.php");
		   
		     }	
	     }		
	}
	mysqli_free_result($resultadoAlumno);
	mysqli_free_result($resultadoProfesor);
	mysqli_close($conexion);
 ?>

