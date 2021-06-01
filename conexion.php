<?php
define('DB_SERVER', 'localhost');//variable db_server
define('DB_USERNAME', 'root');//variable db_server envia el valor root para conectar a base de datos
define('DB_PASSWORD', '');//variable para enviar la contraseña para conectar
define('DB_NAME', 'login_tuto');

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($link == false){
	die("ERROR EN LA CONEXION" . mysqli_connect_error());
}
else{
	//echo "Conexion Existosa";
}
 
?>