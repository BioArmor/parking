<?php //funciona
session_start();

  // La variable de sessió uname té valor, sino t ha d enviar direcament al login
  // si existeix uname, fer un select a la taula usuaris per recuperar el nom sencer, telèfon,etc. que
  
               $mostrar_admin=0;
               $mostrar_alquiler=0;
               $mostrar_usuari=0;


// es posarà després al ormulari
if(isset($_SESSION['uname'])){
  $nom_complet = $_SESSION["nombre"];
  $apellido = $_SESSION["apellido"];
  $DNI = $_SESSION["dni"];
  $telefon = $_SESSION["telefono"];
  $rol=$_SESSION["role"];

               //recorrer l'arrey i comprovar
               for($i=0; $i<count($rol);$i++){
                if($rol[$i]==1){//admin
                  $mostrar_admin=1;
                }
                if ($rol[$i]==2) {//usuari
                  $mostrar_alquiler=1;
                }
               if ($rol[$i] == 3) {//propietari
                  $mostrar_usuari=1;
               }
               }
}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Parking</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="css.css">
  </head>

  <body id="page-top">

    <!-- Navigation -->
    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="mainNav">-->
      <nav class="navbar navbar-expand-lg navbar-light bg-light" id="mainNav">
           <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">ALQUILER DE PLAZAS DE PARKING</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        </button>
       
        <?php
        if (!isset($_SESSION["uname"])){ ?>
          <div class="pull-right">
            <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Entra</button>
            <button onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Regístrate</button>
          </div>
        <?php }else{ ?>
          <div class="pull-right">
            <button onclick="window.location='logout.php';" style="width:auto;">Logout</button>
        </div>
        <?php } ?>
      </div>


<div id="id01" class="modal">
  
  <form class="modal-content animate" method="post" action="loginComprobacionBBDD.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      
    </div>

    <div class="container">
      <h1>Entra</h1></br>
      <label><b>Dirección de correo</b></label></br>
      <input type="text" placeholder="Introduce tu correo electrónico" name="uname" required></br>

      <label><b>Contraseña</b></label></br>
      <input type="password" placeholder="Introduce tu contraseña" name="psw" required></br>
        
      <!--<button type="submit">Entra</button>-->
      
    </div>

        <?php
      if (isset($_GET["error"])){
        if ($_GET["error"] == "1"){
          echo "<p align='center' id='error'>*Login incorrecto. Pruébalo de nuevo. Recuerde que el nombre de usuario es el mail.</p>";
        }
      }
    ?>
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Volver</button>
      <button type="submit" class="acceptbtn">Entra</button>
    </div>
  </form>
</div>

<script src="assets/js/login.js"></script>
<script src="assets/js/validacion.js"></script>

<div id="id02" class="modal">
  
  <form class="modal-content animate" method="post" action="registrar-usuarios.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Cerrar">&times;</span>
      
    </div>

    <div class="container">
      <div class="caja2">
      <h1>Regístrate</h1></br>
      <label><b>Nombre</b></label></br>
      <input type="text" name="username" maxlength="32" required></br>
        
      <label><b>Apellido</b></label></br>
      <input type="text" name="apellidos" maxlength="32" required></br>

      <label><b>Email</b></label></br>
      <input type="text" name="email" maxlength="32" required></br>

      <label><b>Direccion</b></label></br>
      <input type="text" name="direccion" maxlength="90" required></br>

      <label><b>Fecha Nacimiento</b></label></br></br>
      <input type="date" name="edad" maxlength="32" required></br></br>    
      </div>

      <div class="caja3">
      <h1>Regístrate</h1></br>
      <label><b>Telefono 1</b></label></br>
      <input type="text" name="tel1" maxlength="9" required></br>
      
      <label><b>Telefono 2</b></label></br>
      <input type="text" name="tel2" maxlength="9"></br>

      <label><b>DNI</b></label></br>
      <input type="text" name="dni" maxlength="9" required></br>

      <label><b>Password</b></label></br>
      <input type="password" name="password" maxlength="8" required></br>

      <label><b>Imagen perfil</b></label>
      <input type="file" name="imag" class="container" id="exampleInputFile" aria-describedby="fileHelp">
      <br />
      </div>
      <br/><br/><br/><br/>
       <select name="role"> 
        <?php
                    
          $query = "SELECT * FROM roles where int_id_rol <> 1";
          $result = mysqli_query($con, $query);
                      
          while ($valores = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                        
            echo '<option value="'.$valores['int_id_rol'].'">'.$valores['str_rol'].'</option>';
                          
          }
        ?>
      </select><br/>
      <!--<button type="submit">Registrarme</button>-->
      <input type="reset" name="clear" value="Limpiar">  
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Volver</button>
      <button type="submit" class="acceptbtn">Registrarme</button>  
    </div>
  </form>
</div>
      </nav>


    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light py-lg-4" id="mainNav">
      <div class="container">
        <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item active px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="index.php">INICIO
                <span class="sr-only">(current)</span>
              </a>
            </li><?php
              if(($mostrar_alquiler == 1) || ($mostrar_admin == 1)){ ?>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="alquiler.php">ALQUILER DE PARKING</a>
            </li>
            <?php } ?>
            <?php
              if(($mostrar_usuari == 1) || ($mostrar_admin == 1)){ ?>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="plazas.php">AGREGAR PLAZAS</a>
            </li>
            <?php } ?>
            <?php
              if(($mostrar_usuari == 1) || ($mostrar_admin == 1)){ ?>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="mis_plazas.php">MIS PLAZAS</a>
            </li>
            <?php } ?>
            <?php
              if(($mostrar_alquiler == 1) || ($mostrar_admin == 1)){ ?>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="mis_alquileres.php">MIS ALQUILERES</a>
            </li>
            <?php } ?>
            <?php
              if(($mostrar_alquiler == 1) || ($mostrar_admin == 1)){ ?>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="calendario_alquiler.php">CALENDARIO</a>
            </li>
            <?php } ?>
            <?php
              if(($mostrar_usuari == 1) || ($mostrar_admin == 1)){ ?>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="mis_plazas.php">MIS PLAZAS</a>
            </li>
            <?php } ?>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="store.html">CONTACTO</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <section id="about">
      <div class="container">
       <h4>Reserva tu aparcamiento al mejor precio</h4>
            <ul>
              <li>Encuentra y reserva tu plaza de parking y ahorra unos billetes</li>
              <li>¿Dónde quieres ir? No te preocupes, te ayudaremos a aparcar. Sólo dinos dónde quieres ir y encontraremos el mejor precio.</li>
              <li>Elige la oferta que mejor se adapte a ti. Reservar una plaza de parking nunca fue tan fácil.</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

<br/>


    <!-- google maps -->
  <section id="scrollspy">
  <div id="map">
    <script>
      function initMap() {
        var uluru = {lat: 41.3979911, lng: 2.0518154000000095};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 10,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLvg5OnSQAH9aJ7bdNC0HV9wjWrpCb2RM&callback=initMap">
    </script>
  </div>
</section>

<br/><br/>

    <!--tabla ofertas-->
      <div class="container">
        <h4>Ofertas</h4>

    <div id="taula"><table>
      <tr>
        <td><b>Nombre del parking</b></td>
        <td><b>Precio / hora</b></td>
        <td><b>Lugar</b></td>
      </tr>
      <tr>
        <td>Parking manolo 33</td>
        <td>4€</td>
        <td>Calle inventada 23</td>
      </tr>
      <tr>
        <td>Parking josefa 105</td>
        <td>5€</td>
        <td>Ave del paraiso</td>
      </tr>
    </table>
   </div>  
  </div>
</div>
 </section>

<br/><br/>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom JavaScript for this theme -->
    <script src="js/scrolling-nav.js"></script>

  </body>

</html>
