<?php 
	include 'code_registro.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Registro-theclo</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
<div class="container-all">
	<div class="ctn-form">
		
		<img src="" alt="" class="logo">
		<h1 class="title">Registrarse</h1>

		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<label for="">Nombre de Usuario</label>
			<input type="text" name="username">
			<span class="msg-error"><?php echo $username_err?></span>

			<label for="">Email</label>
			<input type="text" name="email">
			<span class="msg-error"><?php echo $email_err?></span>
			
			<label for="">Contraseña</label>
			<input type="password" name="password">
			<span class="msg-error"><?php echo $password_err?></span>

			<input type="submit" value="Registrarse">
			

		</form>
		
		<span class="text-footer">¿Ya te has registrado?
			<a href="index.php">Iniciar Sesion</a>
		</span>
	
	</div>

	<div class="ctn-text">
		<div class="capa"></div>
		
		<h1 class="title-description">Loream ipsum dolor sit amet</h1>
		<p class="text-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam non condimentum ante, eu faucibus lacus. Vivamus viverra sem maximus dolor ultrices sodales. Sed dignissim feugiat lacus, a consequat ligula iaculis nec. Duis tempus sollicitudin augue, ultricies maximus lacus ultricies ac. Cras sed tortor et arcu ultrices consequat. Donec ac mi ornare, pretium nunc ut, venenatis arcu. Pellentesque in diam vitae massa suscipit vulputate non sit amet velit. </p>
	</div>

</div>

</body>
</html>