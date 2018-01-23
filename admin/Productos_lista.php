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
$query_ProductosLista = "SELECT * FROM tblproductos ORDER BY tblproductos.strNombre";
$ProductosLista = mysql_query($query_ProductosLista, $TinedaBrujo) or die(mysql_error());
$row_ProductosLista = mysql_fetch_assoc($ProductosLista);
$totalRows_ProductosLista = mysql_num_rows($ProductosLista);
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
    <h1>lista de productos</h1>
    <p>&nbsp;</p>
    <p><a href="Productos_add.php">A&ntilde;adir Producto</a></p>
    <table width="100%" border="1">
      <tr>
        <td>nombre</td>
        <td>Imagen</td>
        <td>Tama&ntilde;o</td>
        <td>Descripcion</td>
        <td>Acciones</td>
      </tr>
      <?php do { ?>
  <tr>
    <td><?php echo $row_ProductosLista['strNombre']; ?></td>
    <td><img src="../Documentos/Productos/<?php echo $row_ProductosLista['strImagen']; ?>" width="90" height="90" /></td>
    <td><?php echo $row_ProductosLista['strSize']; ?></td>
    <td><?php echo $row_ProductosLista['strDescripcion']; ?></td>
    <td><a href="Productos_edit.php?redordid=<?php echo $row_ProductosLista['idProductos']; ?>">Editar</a> - <a href="Productos_elim.php?redordid=<?php echo $row_ProductosLista['idProductos']; ?>">Eliminar</a></td>
  </tr>
  <?php } while ($row_ProductosLista = mysql_fetch_assoc($ProductosLista)); ?>
    </table>
    <p>&nbsp;</p>
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
mysql_free_result($ProductosLista);
?>
