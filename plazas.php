<?php //funciona
session_start();
  if (!isset($_SESSION["uname"])){
    header('Location: index.php'); 
    exit();

  }
  // La variable de sessió uname té valor, sino t ha d enviar direcament al login
  // si existeix uname, fer un select a la taula usuaris per recuperar el nom sencer, telèfon,etc. que
  

// es posarà després al ormulari
$nom_complet = $_SESSION["nombre"];
$apellido = $_SESSION["apellido"];
$DNI = $_SESSION["dni"];
$telefon = $_SESSION["telefono"];
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

    <title>Agregar plazas</title>

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
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="alquiler.php">ALQUILER DE PARKING</a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="plazas.php">AGREGAR PLAZAS</a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="store.html">CONTACTO</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
<br/><br/>

    <!-- Agregar plazas-->

    <section id="plazas">
      <div class="container">
		<div class="row">
		  <div class="col-md-6">	
		      <h4>Subir parking</h4><br/>
          
			    <input type="text" class="form-control" id="Nombre" placeholder="Nombre" value="Nombre: <?=$nom_complet?>" readonly>
          <input type="text" class="form-control" id="Apellido" placeholder="Apellido" value="Apellido: <?=$apellido?>" readonly>
			    <input type="text" class="form-control" id="DNI" placeholder="DNI" value="DNI: <?=$DNI?>" readonly>
			 	  <input type="text" class="form-control" id="Telefono" placeholder="Telefono" value="Telefono: <?=$telefon?>">
				  <input type="text" class="form-control" id="Calle" placeholder="Calle del parking">
 <?php
    if ( !empty($_POST['submit']) ) {
$query = "INSERT INTO 'usuarios' (str_direcion) values ('{$_POST['str_direcion']}')";
$response = mysql_query($query, $conn);
}
 ?>
<div class="container">
     <div class="col-md-6"> 
       <div class="row">
        <div class="form-group">
          Fecha entrada
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
          Fecha salida
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
</script>			    <input type="text" class="form-control" id="Precio" placeholder="Precio">
			    <input type="text" class="form-control" id="Caracteristicas" placeholder="Caracteristicas"></div>
		 		  <div class="col-md-6">
					<div class="container">
			          <div class="form-group">
					      <input type="file" class="container" id="exampleInputFile" aria-describedby="fileHelp"><br/>
									    <!--<small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>-->
						    <br/>
						    <!--Imatges-->
						  <input type="image" class="container" src="parking.jpg">
					</div>
			  </div>
			</div>
		</div>
	  </div>
	</section>


<br/>

	  <div class="container">
		<div class="boto">
          <button type="button" class="boto">Modificar</button>          
          <button type="button" class="boto">Agregar</button>
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