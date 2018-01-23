<?php
 $DB_SERVER = "127.0.0.1";
$DB_NAME = "parking";
$DB_USER = "root";
$DB_PASS = "";
	$con =mysqli_connect($DB_SERVER,$DB_USER,$DB_PASS,$DB_NAME);
 $form_pass = $_POST['password'];
 
 
 if ($con->connect_error) {
 die("La conexion falló: " . $con->connect_error);
}
 $buscarUsuario = "SELECT * FROM usuarios
 WHERE str_nombre = '$_POST[username]' ";
 $result = $con->query($buscarUsuario);
 $count = mysqli_num_rows($result);
 if ($count == 1) {
 echo "<br />". "El Nombre de Usuario ya a sido tomado." . "<br />";
 echo "<a href='index.html'>Por favor escoga otro Nombre</a>";
 }
 else{
/*
INSERT INTO `usuarios` (`id_usuario`, `str_nombre`, `str_apellido`, `str_email`, `dt_fecha_nacimiento`, `str_direcion`, `str_telefono_1`, `str_telefono_2`, `str_telefono_3`, `str_srcimg`, `int_id_rol`, `str_password`) VALUES (NULL, '$_POST[username]', 'meneses', 'marcmg45@gmail.com', '1994-10-30', 'cami vell del palau', '123456789', '', '', '', '3', '$_POST[password]');
*/
 $query = "INSERT INTO `usuarios` (`id_usuario`, `str_nombre`, `str_apellido`, `str_email`, `dt_fecha_nacimiento`, `str_direcion`, `str_telefono_1`, `str_telefono_2`, `str_telefono_3`, `str_srcimg`, `str_password`) VALUES (NULL, '$_POST[username]', '$_POST[apellidos]', '$_POST[email]', '$_POST[edad]', '$_POST[direccion]', '$_POST[tel1]', '$_POST[tel2]', '$_POST[tel3]', '$_POST[imag]', '$_POST[password]');";
 if ($con->query($query) === TRUE) {
 
 echo "<br />" . "<h2>" . "Usuario Creado Exitosamente!" . "</h2>";
 echo "<h4>" . "Bienvenido: " . $_POST['username'] . "</h4>" . "\n\n";
 echo "<h5>" . "Hacer Login: " . "<a href='login.html'>Login</a>" . "</h5>"; 
 }
 else {
 echo "Error al crear el usuario." . $query . "<br>" . $con->error; 
   }
 }
 mysqli_close($con);
?>