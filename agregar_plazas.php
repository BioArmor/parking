	<?php
	session_start();
	 		echo "usuari: " . $_SESSION["uname"];
	 		echo "<br> id: " . $_SESSION["id"]; 			
	 		echo "<br> nombre: " . $_SESSION["nombre"];
 			echo "<br> apellido: " . $_SESSION["apellido"];
 			echo "<br> DNI: " . $_SESSION["dni"] ;
 			echo "<br> Telefono: " . $_SESSION["telefono"];
 			echo "<br> direccion: " . $_POST["direccion"]; 
 			echo "<br> fecha_inicio: " . $_POST["fecha_inicio"]; 
 			echo "<br> fecha_final: " . $_POST["fecha_final"]; 
 			echo "<br> precio: " . $_POST["precio"]; 
 			echo "<br> caracteristicas: " . $_POST["caracteristicas"]; 
 			echo "<br> imagen: " . $_POST["imagen"]; echo "<br/>";	

 	 $DB_SERVER = "127.0.0.1";
 	 $DB_NAME = "parking";
 	 $DB_USER = "root";
 	 $DB_PASS = "";
 	 $con =mysqli_connect($DB_SERVER,$DB_USER,$DB_PASS,$DB_NAME);
 	
	//$query = " INSERT INTO parking (int_id_parking, int_id_usuario, flt_lat, flt_lon, str_descripcion, int_fecha_entrada, int_fecha_salida, str_tamano, dec_precio_dia, boo_validacion, str_srcimg_1, str_srcimg_2, str_srcimg_3, int_id_calendario, str_direcion) VALUES (NULL, '11', 0, 0, 'ghj', '2018-02-07', '2018-02-28', 0, '7', 0, 'Chrysanthemum.jpg', NULL, NULL, 0, NULL;";

 	$query = "INSERT INTO parking (int_id_parking, int_id_usuario, flt_lat, flt_lon, str_descripcion, int_fecha_entrada, int_fecha_salida, str_tamano, dec_precio_dia, boo_validacion, str_srcimg_1, str_srcimg_2, str_srcimg_3, int_id_calendario, str_direcion) VALUES (NULL, '$_SESSION[id]', 0, 0, '$_POST[caracteristicas]', '$_POST[fecha_inicio]', '$_POST[fecha_final]', 0, '$_POST[precio]', 0, '$_POST[imagen]', NULL, NULL, 0, '$_POST[direccion]')";
 	echo $query;

 	if (mysqli_query($con, $query) === TRUE) {
 		// insertat correctament
 		echo "Ok, tot correcte";
 	}else{
 		//error
 		echo "error";
 	}
 	mysqli_close($con);

 	?>
