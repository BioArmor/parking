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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO tblproductos (idCategorias, strNombre, strColor, dbPrecio, strSize, strDescripcion, strImagen) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['idCategorias'], "int"),
                       GetSQLValueString($_POST['strNombre'], "text"),
                       GetSQLValueString($_POST['strColor'], "text"),
                       GetSQLValueString($_POST['dbPrecio'], "double"),
                       GetSQLValueString($_POST['strSize'], "text"),
                       GetSQLValueString($_POST['strDescripcion'], "text"),
					   GetSQLValueString($_POST['strImagen'], "text"));

  mysql_select_db($database_TinedaBrujo, $TinedaBrujo);
  $Result1 = mysql_query($insertSQL, $TinedaBrujo) or die(mysql_error());

  $insertGoTo = "Productos_lista.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_TinedaBrujo, $TinedaBrujo);
$query_consultaCategoria = "SELECT * FROM tblcategorias ORDER BY tblcategorias.strDescripcion";
$consultaCategoria = mysql_query($query_consultaCategoria, $TinedaBrujo) or die(mysql_error());
$row_consultaCategoria = mysql_fetch_assoc($consultaCategoria);
$totalRows_consultaCategoria = mysql_num_rows($consultaCategoria);
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
  <div class="content"><!-- InstanceBeginEditable name="contenido" --><h1>Administracion</h1>
  <script>
function subirimagen()
{
	self.name = 'opener' ;
	remote = open('GestionImagen.php','remote','width=400,height=150,location=no,scrollbars=yes,menubars=no,toolbars=no,resizable=yes,fullscreen=no, status=yes');
remote.focus();

	}
</script>
    <p>&nbsp;</p>
    <p>Esto es la administracion</p>
    <p>&nbsp;</p>
    <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
      <table align="center">
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Categorias:</td>
          <td><select name="idCategorias">
            <?php 
do {  
?>
            <option value="<?php echo $row_consultaCategoria['idCategoria']?>" ><?php echo $row_consultaCategoria['strDescripcion']?></option>
            <?php
} while ($row_consultaCategoria = mysql_fetch_assoc($consultaCategoria));
?>
          </select></td>
        </tr>
        <tr> </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Nombre:</td>
          <td><input type="text" name="strNombre" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Color:</td>
          <td><input type="text" name="strColor" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Precio:</td>
          <td><input type="text" name="dbPrecio" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Size:</td>
          <td><input type="text" name="strSize" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">StrDescripcion:</td>
          <td><input type="text" name="strDescripcion" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Imagenes:</td>
          <td><label for="textfield"></label>
          <input type="text" name="strImagen" id="strImagen" />
          <input type="Button" name="button" id="button" value="subir Imagen" onclick="javascript:subirimagen();" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">&nbsp;</td>
          <td><input type="submit" value="Insertar registro" /></td>
        </tr>
      </table>
      <input type="hidden" name="MM_insert" value="form1" />
    </form>
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
mysql_free_result($consultaCategoria);
?>
