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
    <!--
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="mainNav">-->
      <nav class="navbar navbar-expand-lg navbar-light bg-light" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">ALQUILER DE PLAZAS DE PARKING</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        </button>
        <div class="pull-right">
          <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
        </div>

<div id="id01" class="modal">
  
  <form class="modal-content animate" method="post" action="loginComprobacionBBDD.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      
    </div>

    <div class="container">
      <label><b>Dirección de correo</b></label>
      <input type="text" placeholder="Enter email" name="uname" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit">Login</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      
    </div>
  </form>
</div>

<script src="assets/js/login.js"></script>
<script src="assets/js/validacion.js"></script>
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
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="store.html">CONTACTO</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


<br/>

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
        var uluru = {lat: -25.363, lng: 131.044};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
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
