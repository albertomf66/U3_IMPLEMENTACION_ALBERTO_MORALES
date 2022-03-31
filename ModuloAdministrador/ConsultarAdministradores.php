
<?php 
require_once "../global.php";
	
	// CONVERTIMOS CADA RESULTADO DE LA CONSULTA EN UN ARRAY 
	// POR LO TANTO CADA REGISTRO DE LA TABLA CLASEPROFESOR SE REPRESENTA COMO UN ARRAY 
	// PARA ACCEDER A SU VALOR ES DE LA SIGUIENTE MANERA 
    // $ResultadoCLase['Clase'] ACCEDEMOS AL ARRAY PRINCIPAL
	// CON $ResultadoCLase['Clase'][INDICE] ACCEDEMOS DIRECTAMENTE A LA CANTIDAD DE ARRAY, SEGUN LA CONSULTA, POR EJEMPLO, SI TENEMOS DOS REGISTROS EL SIZE OF SERA DE (2) 
    // POR ÚLTIMO CON $ResultadoCLase['Clase'][INDICE][INDICE_2] ACCEDEMOS DIRECTAMENTE AL VALOR QUE GUARDA DICHO ARRAY 
    // POR EJEMPLO TENEMOS CODIGOCLASE [0], Descripcion [1], ENTONCES SI QUIERO ACCEDER A LA DESCIPRCIÓN DEBO ACCEDER DE LA SIGUIENTE MANERA 
	
	// ACCEDER A LA DESCRIPCION DEL TERCER REGISTRO DEL ARRAY 
	// $ResultadoCLase['Clase'][2][1]


	$Administrador = [
         'admin' => []
     ];

	// CONEXION A LA BASE DE DATOS
	//$conexion  = mysqli_connect("localhost","root","123","estadia");
    $conexion  = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME_BD);
	$consulta = " Select * from administrador ";
	$resultado = mysqli_query($conexion,$consulta);


	$Administrador = array('admin' => array());
	while ($ResultadoClase=mysqli_fetch_array($resultado))
	{
		array_push($Administrador['admin'],
		array($ResultadoClase['matricula_administrador'],$ResultadoClase['nombre_administrador'],$ResultadoClase['paterno_administrador'],$ResultadoClase['materno_administrador'],$ResultadoClase['correo_administrador'],$ResultadoClase['psw_administrador'],$ResultadoClase['foto_administrador']));
	}
	//$filas = mysqli_fetch_row($resultado);

	//$tamano = sizeof($['alum']);

	
 ?>