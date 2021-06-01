<?php 
	//Incluir archivo de conexion a la base de datos
	require_once "conexion.php";

	//Definir variable e inicializar con valores vacio
	$username="";
	$email="";
	$password="";
	$username_err = $email_err = $password_err = "";
	
	if($_SERVER["REQUEST_METHOD"]=="POST"){//1
		//VALIDANDO INPUT DE NOMBRE DE USUARIO
		if (empty(trim($_POST["username"]))) {//2
			$username_err="Por favor, ingrese un nombre de usuario";
		}//2
		else{//else1

			//preparando una declaracion de selecion
			$sql="SELECT  id_usuario FROM usuarios where usuario=?";
			if ($stmt=mysqli_prepare($link,$sql)) {//3
				mysqli_stmt_bind_param($stmt,"s", $param_username);

				$param_username=trim($_POST["username"]);
				
				if(mysqli_stmt_execute($stmt)){//4
					mysqli_stmt_store_result($stmt);
					if(mysqli_stmt_num_rows($stmt)==1){//5
						$username_err="Este nombre de usuario ya esta en uso";
					}//5
					else{//else2	
						$username=trim($_POST["username"]);
						
					}//else2

				}//4
				else{//else 3
					echo "Up! Algo salio mal, intentalo mas tarde";
				}//else 3
			}//3
		}//else1



		//VALIDANDO INPUT DE EMAIL
		if (empty(trim($_POST["email"]))) {//2
			$email_err="Por favor, ingrese un email de usuario";
		}//2
		else{//else1
			//preparando una declaracion de selecion
			$sql="SELECT  id_usuario from usuarios where email=?";
			if ($stmt=mysqli_prepare($link,$sql)) {//3
				mysqli_stmt_bind_param($stmt,"s", $param_email);

				$param_email=trim($_POST["email"]);

				if(mysqli_stmt_execute($stmt)){//4
					mysqli_stmt_store_result($stmt);
					if(mysqli_stmt_num_rows($stmt)==1){//5
						$email_err="Este email ya esta en uso";
					}//5
					else{//else2	
						$email=trim($_POST["email"]);
					}//else2

				}//4
				else{//else 3
					echo "Up! Algo salio mal, intentalo mas tarde";
				}//else 3
			}//3
		}//else1


			//VALIDANDO CONTRASEÑA
		if (empty(trim($_POST["password"]))) {//6
			$password_err="Por favor, ingrese una contraseña";
		}//6
		elseif (strlen(trim($_POST["password"])) <4 ) {//elseif
			$password_err="La contraseña debe de tener al menos 4 caracteres";
		}//elseif
		else{//else
			$password=trim($_POST["password"]);
		}//else


		//COMPROBANDO LOS ERRORES DE ENTRADA ANTES DE INSERTAR LOS DATOS EN LA BASE DE DATOS.
	
		if (empty($username_err) && empty($email_err) && empty($password_err)) {//10
			$sql="INSERT INTO usuarios (usuario,email,clave) VALUES (?,?,?)";
		//	$stmt="";
			if ($stmt=mysqli_prepare($link,$sql)) {//3
				
				mysqli_stmt_bind_param($stmt,"sss",$param_username,$param_email,$param_password);
				$param_username=$username;
				$param_email=$email;
				$param_password=password_hash($password, PASSWORD_DEFAULT);//Encriptando contraseña
				if(mysqli_stmt_execute($stmt)){//12
					header("location: index.php");

				}//12
				else{//else
					echo "Algo salio mal, intentalo despues";
				}//else
				
			}//3

		}//10
		mysqli_close($link);

	}//1
 ?>