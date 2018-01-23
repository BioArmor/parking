<?php require_once('../inicio.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
<?php 
 	
 		$sql = "SELECT * FROM parking";
 		$listaparking = mysqli_query($_SESSION["con"],$sql);
 		$row_listaparking = mysqli_fetch_assoc($listaparking);
		$totalRows_listaparking = mysqli_num_rows($listaparking);
 		
?>
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
  <h1>Lista Categoria</h1>
    <p>&nbsp;</p>
    <p><a href="Categorias_add.php">A&ntilde;adir Categoria</a></p>
    <table width="100%" border="1">
      <tr>
        <td>Nombre De categoria</td>
        <td>Acciones</td>
      </tr>
      <?php do { ?>
        <tr>
          <td><?php echo $row_listaparking['str_descripcion']; ?></td>
          <td><a href="Categorias_edit.php?recordid=<?php echo $row_listaparking['int_id_parking']; ?>">Editar</a> - <a href="Categorias_elim.php?recordid=<?php echo $row_listaparking['int_id_parking']; ?>">Eliminar</a></td>
        </tr>
        <?php } while ($row_listaparking = mysqli_fetch_assoc($listaparking)); ?>
    </table>
    <p>&nbsp;</p>
  
  
  
  <!-- InstanceEndEditable -->

    <?php include '..\includes\footeradmin.php' ?>

</body>
</html>