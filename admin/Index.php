<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>parking</title>

<link href="../assets/css/admincss.css" rel="stylesheet" type="text/css" />

<?php include '..\includes\cdn.php' ?>

</head>

<body>
  
<nav class="navbar navbar-inverse cuadrado">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="../index.php">Parking</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">index<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <?php include("../includes/cabeceradmin.php");?>
          
        </ul>
      </li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
  


  
    <!-- end .sidebar1 -->
    <div class="jumbotron centrado redondeado">
      <h1>Administracion</h1>
        <p>&nbsp;</p>
          <p>Esto es la administracion</p>
        <p>&nbsp;</p>
    </div>
  <div class="container">
    <div class="row">
       <div class="col-md-8">.col-md-8</div>
       <div class="col-md-4">.col-md-4</div>
    </div>
    <div class="row">
       <div class="col-md-4">.col-md-4</div>
       <div class="col-md-4">.col-md-4</div>
       <div class="col-md-4">.col-md-4</div>
    </div>
    <div class="row">
      <div class="col-md-6">.col-md-6</div>
      <div class="col-md-6">.col-md-6</div>
    </div>
  </div>
  
  
  
  <!-- InstanceEndEditable -->

    <?php include '..\includes\footeradmin.php' ?>

</body>
<!-- InstanceEnd --></html>