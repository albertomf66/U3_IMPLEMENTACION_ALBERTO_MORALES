<?php 
	
	$nombre = 'archivo_out'.date('d-m-y').'.sql';
	$directorio = 'D:\Alber\Descargas';

	$dir = $directorio.'\\'.$nombre;
	$user = 'root';
	$pass = '';

	$comando = "C:\ xampp\mysql\bin\mysqldump.exe --opt --user=$user --password=$pass estadia> $dir";
	system($comando,$error);

 ?>