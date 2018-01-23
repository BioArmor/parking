<?php require_once('../Connections/TinedaBrujo.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_TinedaBrujo, $TinedaBrujo);
$query_listaCategoria = "SELECT * FROM tblcategorias ORDER BY tblcategorias.strDescripcion";
$listaCategoria = mysql_query($query_listaCategoria, $TinedaBrujo) or die(mysql_error());
$row_listaCategoria = mysql_fetch_assoc($listaCategoria);
$totalRows_listaCategoria = mysql_num_rows($listaCategoria);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/BaseAdmin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>El Rincon Del Brujo</title>
<!-- InstanceEndEditable -->
<link href="../estilos/pagina.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>

<div class="container">
  <div class="header">hola
  </div>
  <div class="sidebar1">
    
    <?php include("../includes/cabeceradmin.php");
	 ?>
    <!-- end .sidebar1 --></div>
  <div class="content"><!-- InstanceBeginEditable name="contenido" -->
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
          <td><?php echo $row_listaCategoria['strDescripcion']; ?></td>
          <td><a href="Categorias_edit.php?recordid=<?php echo $row_listaCategoria['idCategoria']; ?>">Editar</a> - <a href="Categorias_elim.php?recordid=<?php echo $row_listaCategoria['idCategoria']; ?>">Eliminar</a></td>
        </tr>
        <?php } while ($row_listaCategoria = mysql_fetch_assoc($listaCategoria)); ?>
    </table>
    <p>&nbsp;</p>
  <!-- InstanceEndEditable -->
    
    <!-- end .content --></div>
  <div class="footer">
    <p>Administracion tienda del brujo.</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($listaCategoria);
?>
