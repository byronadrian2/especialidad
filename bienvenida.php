<?php

session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !==true) {
	header("location: index.php");
}
?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Bienvenido - Theclo</title>
 	<link rel="stylesheet" type="text/css" href="css/estilos.css">
 	<meta charset="utf-8">
 	<meta name="vierwport" content="width=device-width, user-sacalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 </head>
 <body>
 	<div class="ctn-welcome">
 		<img src="" alt="" class="logo-welcome">
 		<h1 class="title-welcome"> Bienvenido lo has
 			<a>Logrado!!!!!</a></h1>
 			<a href="cerrar_sesion.php" class="close-sesion">Cerrar Sesion</a>
 	</div>
 </body>
 </html>