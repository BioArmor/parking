 <?php 
 	include_once "inicio.php";

 	if( true == empty($_POST['uname']) ){
 		echo "¡Los campos no pueden estar vacios!";
 	}else{
 		
 		$sql = "SELECT str_nombre, str_apellido, id_usuario, str_dni, str_telefono_1 FROM usuarios WHERE str_email='" . $_POST["uname"] . "' and str_password='".$_POST["psw"]."';";
 		$rec = mysqli_query($_SESSION["con"],$sql);
 		
 		if($fila = mysqli_fetch_assoc($rec)){
 			$_SESSION["nombre"] = $fila["str_nombre"];
 			$_SESSION["apellido"] = $fila["str_apellido"];
 			$_SESSION["id"] = $fila["id_usuario"];
 			$_SESSION["uname"] = $_POST["uname"];
 			$_SESSION["dni"] = $fila["str_dni"];
 			$_SESSION["telefono"] = $fila["str_telefono_1"];

 			
 			
 			$sql2 = "SELECT id_rol FROM rol_usuario WHERE id_usuario=" . $_SESSION["id"] . ";";
 			$rec2 = mysqli_query($_SESSION["con"],$sql2);
 			echo $sql2;
 			$roles = array();
 			while($fila2 = mysqli_fetch_assoc($rec2)){
 				array_push($roles,$fila2['id_rol']);
 			}
 			$_SESSION["role"] = $roles;

 			header('Location: index.php');
 		}else{
 			$_SESSION["uname"] == null;
 			echo "Login incorrecto. Pruébalo de nuevo. Recuerde que el nombre de usuario es el mail";
 		}
 	}
?>