<?php //funciona
session_start();
  if (!isset($_SESSION["uname"])){
    header('Location: index.php'); 
    exit();

  }


$nom_complet = $_SESSION["nombre"];
$apellido = $_SESSION["apellido"];
$DNI = $_SESSION["dni"];
$telefon = $_SESSION["telefono"];
$rol=$_SESSION["role"];
               $mostrar_admin=0;
               $mostrar_alquiler=0;
               $mostrar_usuari=0;
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
?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

    <title>Alquiler de parking</title>

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
          <button onclick="window.location='logout.php';" style="width:auto;">Logout</button>
        </div>
      </nav>
        </div>


    <!-- Navigation -->
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light py-lg-4" id="mainNav">
      <div class="container">
        <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item active px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="index.php">INICIO
                <span class="sr-only">(current)</span>
              </a>
            </li>             
            <?php
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
  </div>

    <!-- Buscador de places-->

    <section id="alquiler">
      <div class="container">
        <div class="row">
         <div class="col-md-offset-4 col-md-4 col-md-offset-4"> 
            <h4>Alquiler de parking</h4>
             
        <div class="row">
          <div class="col-xs-3">
          <br/>
            <input class="typeahead form-control" type="text" placeholder="Buscar">
            <?php /*
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "parking";
            $sql = "SELECT employee_name FROM employee WHERE employee_name LIKE '%".$_GET['query']."%' LIMIT 20";
            $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
            $json = array();
            while( $rows = mysqli_fetch_assoc($resultset) ) {
            $json[] = $rows["employee_name"]; 
            }
            echo json_encode($json); */
            ?>
          </div>
        </div>
      
          </div>
        </div>
      </div>
    </section>
<br/>


<!-- Calendari-->

<div class="container">
     <div class="col-md-6"> 
       <div class="row">
        <div class="form-group">
          Hora llegada
            <div class='input-group date' id='datetimepicker6'>
                <input type='date' class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            
            </div>
          </div>
          </div>
        </div>
    </div>
<div class="container">
     <div class="col-md-6"> 
       <div class="row">
        <div class="form-group">
          Hora salida
            <div class='input-group date' id='datetimepicker6'>
                <input type='date' class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
          </div>
        </div>
      </div>
    </div>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker6').datetimepicker();
        $('#datetimepicker7').datetimepicker({
            useCurrent: false //Important! See issue #1075
        });
        $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
    });
</script>

<!--Desplegable vehicles-->
  <div class="container">
    Selecciona el tipo de vehiulo
    <div class="row">
     <div class="col-md-3"> 
       <select class="form-control" id="vehiulo">
        <option>Coche</option>
        <option>Moto</option>
        </select>
      </div>
    </div>
  </div>
<br/>



<!--Desplegable km-->
  <div class="container">
     <div class="row">
     <div class="col-md-3"> 
    <label for="exampleSelect1">Selecciona la distancia</label>
    <select class="form-control" id="exampleSelect1">
      <option>1km</option>
      <option>5km</option>
      <option>10km</option>
      <option>20km</option>
    </select>
  </div>
</div>
</div>
<br/>


<form>
  <div class="container">
     <div class="row">
     <div class="col-md-3"> 
       <input type="text" class="form-control" id="matricula" placeholder="matricula">
       <input type="text" class="form-control" id="modelo" placeholder="modelo">
       <input type="text" class="form-control" id="telefono" placeholder="telefono">
    </div>
  </div>
</div>
</form>

    <!-- google maps -->
  <section id="scrollspy" class="contanidor2">
     <div class="row">
     <div class="col-md-6"> 
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
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLvg5OnSQAH9aJ7bdNC0HV9wjWrpCb2RM&callback=initMap">
    </script>
  </div>
</section>
<br/>


    <div class="container">
    <div class="boto">
          <button type="button" class="boto">Alquilar</button>          
          </div>
    </div>
</div>

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