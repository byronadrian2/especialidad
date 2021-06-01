<?php


//INICIALIZAR LA SESION
	session_start();

	if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]===true){
		header("location: bienvenida.php");
		exit;
	}

	require_once "conexion.php";

	$email =$password="";
	$email_err=$password_err="";
	
	if ($_SERVER["REQUEST_METHOD"]==="POST") {//1
		if (empty(trim($_POST["email"]))) {
			$email_err="Por favor ingrese el correo electronico";
		}
		else{
			$email=trim($_POST["email"]);//trim borra los espacios en blanco
		}

		if (empty(trim($_POST["password"]))) {
			$password_err="Por favor ingrese una contraseña";
		}
		else{
			$password=trim($_POST["password"]);//trim borra los espacios en blanco
		}


	//VALIDAR CREDENCIALES
		if(empty($email_err)&& empty($password_err)){
			$sql="SELECT id_usuario,usuario,email,clave FROM usuarios where email=?";
			if($stmt=mysqli_prepare($link,$sql)){
				mysqli_stmt_bind_param($stmt,"s",$param_email);
				$param_email=$email;

				if (mysqli_stmt_execute($stmt)) {
					mysqli_stmt_store_result($stmt);
				}

				if (mysqli_stmt_num_rows($stmt)==1) {
					mysqli_stmt_bind_result($stmt,$id,$usuario,$email,$hashed_password);//$hashed_password-> lee la contraseña encriptada
					if(mysqli_stmt_fetch($stmt)){//2
						if (password_verify($password, $hashed_password)) {
							session_start();

							//ALMACENAR LOS DATOS EN VARIABLES DE SESION
							$_SESSION["loggedin"]=true;
							$_SESSION["id"]=$id;
							$_SESSION["email"]=$email;

							header("location: bienvenida.php");
						}
						else{
							$password_err="La contraseña que has introducido es incorrecta";
						}
					}//2
					
					

				}
				
				else{
						$email_err="No se ha encontrado ninguna cuenta con ese correo electronico.";
					}

				
			}
			else{
						echo "Ups! algo salio mal, intentalo mas tarde";
					}

		}



mysqli_close($link);

	}//1

?>