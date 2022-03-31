<?php 

	
	header('Content-Type: application/json');	

	$fichero  = $_FILES["file"];
   	$directorio = "../ActividadesCargadas/";
    $archivo = $directorio. basename($_FILES["file"]["name"]);

     $cant_archivos = count(glob("../ActividadesCargadas/{*.txt,*.jpg,*.png,*.pdf,*.docx,*.ppt,*.zip,*.xls}",GLOB_BRACE));
     move_uploaded_file($_FILES['file']['tmp_name'], $directorio.($cant_archivos+1).basename($_FILES["file"]["name"]));

			$datos = array(
			'estado' => 'ok',
			'fichero' => $directorio.($cant_archivos+1).basename($_FILES["file"]["name"]),
			);

    

	echo json_encode($datos);



 ?>