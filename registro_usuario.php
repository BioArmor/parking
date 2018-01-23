<!DOCTYPE html>

<?php
 $DB_SERVER = "127.0.0.1";
$DB_NAME = "parking";
$DB_USER = "root";
$DB_PASS = "";
  $con =mysqli_connect($DB_SERVER,$DB_USER,$DB_PASS,$DB_NAME);
 
 
 if ($con->connect_error) {
 die("La conexion falló: " . $con->connect_error);
}
?>

<head>
 <title>Registrar Usuario</title>

</head>

<body>

 <header>
 <h1>Registrate</h1>
 </header> 

 <form action="registrar-usuarios.php" method="post"> 

 <hr />
 <h3>Crea una cuenta</h3>

 <!--Nombre Usuario-->
 <label for="nombre">Nombre</label><br>
 <input type="text" name="username" maxlength="32" required>
 <br/><br/>
 <label for="apellidos">Apellidos</label><br>
 <input type="text" name="apellidos" maxlength="32" required>
 <br/><br/>
  <label for="email">Email</label><br>
 <input type="text" name="email" maxlength="32" required>
 <br/><br/>
 <label for="edad">Fecha Nacimiento</label><br>
 <input type="date" name="edad" maxlength="32" required>
 <br/><br/>
 <label for="direccion">Direccion</label><br>
 <input type="text" name="direccion" maxlength="90">
 <br/><br/>
 <label for="tel1">telefono 1</label><br>
 <input type="text" name="tel1" maxlength="9" >
 <br/><br/>
 <label for="tel2">telefono 2</label><br>
 <input type="text" name="tel2" maxlength="9" >
 <br/><br/>
 <label for="tel3">telefono 3</label><br>
 <input type="text" name="tel3" maxlength="9" >
 <br/><br/>
 <label for="imag">Imagen perfil</label><br>
 <input type="text" name="imag" maxlength="140" >
 <br/><br/>
 <!--Password-->
 <label for="pass">Password</label><br>
 <input type="password" name="password" maxlength="8" required>
 <br />

        
        <?php
                    
          $query = "SELECT * FROM roles where int_id_rol <> 1";
          $result = mysqli_query($con, $query);
                      
          while ($valores = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                        
            echo '<option value="'.$valores['int_id_rol'].'">'.$valores['str_rol'].'</option>';
                          
          }
        ?>
      </select>
 <br/><br/>
 <input type="submit" name="submit" value="Registrarme">
 <input type="reset" name="clear" value="Borrar">

 </form>

<hr /><br />



 </body>
</html>