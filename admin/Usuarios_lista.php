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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_listausuarios = 10;
$pageNum_listausuarios = 0;
if (isset($_GET['pageNum_listausuarios'])) {
  $pageNum_listausuarios = $_GET['pageNum_listausuarios'];
}
$startRow_listausuarios = $pageNum_listausuarios * $maxRows_listausuarios;

mysql_select_db($database_TinedaBrujo, $TinedaBrujo);
$query_listausuarios = "SELECT * FROM tblusuarios ORDER BY tblusuarios.strNombre";
$query_limit_listausuarios = sprintf("%s LIMIT %d, %d", $query_listausuarios, $startRow_listausuarios, $maxRows_listausuarios);
$listausuarios = mysql_query($query_limit_listausuarios, $TinedaBrujo) or die(mysql_error());
$row_listausuarios = mysql_fetch_assoc($listausuarios);

if (isset($_GET['totalRows_listausuarios'])) {
  $totalRows_listausuarios = $_GET['totalRows_listausuarios'];
} else {
  $all_listausuarios = mysql_query($query_listausuarios);
  $totalRows_listausuarios = mysql_num_rows($all_listausuarios);
}
$totalPages_listausuarios = ceil($totalRows_listausuarios/$maxRows_listausuarios)-1;

$queryString_listausuarios = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_listausuarios") == false && 
        stristr($param, "totalRows_listausuarios") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_listausuarios = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_listausuarios = sprintf("&totalRows_listausuarios=%d%s", $totalRows_listausuarios, $queryString_listausuarios);
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
    <h1>Lista Usuarios</h1>
    <p>&nbsp;</p>
    <p>&nbsp;
    <table border="1" align="center">
      <tr>
        <td>strNombre</td>
        <td>strTelefono</td>
        <td>dtAlta</td>
      </tr>
      <?php do { ?>
        <tr>
          <td><a href="usuarios_detalles.php?recordID=<?php echo $row_listausuarios['idUsuario']; ?>"> <?php echo $row_listausuarios['strNombre']; ?>&nbsp; </a></td>
          <td><?php echo $row_listausuarios['strTelefono']; ?>&nbsp; </td>
          <td><?php echo $row_listausuarios['dtAlta']; ?>&nbsp; </td>
        </tr>
        <?php } while ($row_listausuarios = mysql_fetch_assoc($listausuarios)); ?>
    </table>
    <br />
    <table border="0">
      <tr>
        <td><?php if ($pageNum_listausuarios > 0) { // Show if not first page ?>
            <a href="<?php printf("%s?pageNum_listausuarios=%d%s", $currentPage, 0, $queryString_listausuarios); ?>">Primero</a>
            <?php } // Show if not first page ?></td>
        <td><?php if ($pageNum_listausuarios > 0) { // Show if not first page ?>
            <a href="<?php printf("%s?pageNum_listausuarios=%d%s", $currentPage, max(0, $pageNum_listausuarios - 1), $queryString_listausuarios); ?>">Anterior</a>
            <?php } // Show if not first page ?></td>
        <td><?php if ($pageNum_listausuarios < $totalPages_listausuarios) { // Show if not last page ?>
            <a href="<?php printf("%s?pageNum_listausuarios=%d%s", $currentPage, min($totalPages_listausuarios, $pageNum_listausuarios + 1), $queryString_listausuarios); ?>">Siguiente</a>
            <?php } // Show if not last page ?></td>
        <td><?php if ($pageNum_listausuarios < $totalPages_listausuarios) { // Show if not last page ?>
            <a href="<?php printf("%s?pageNum_listausuarios=%d%s", $currentPage, $totalPages_listausuarios, $queryString_listausuarios); ?>">Último</a>
            <?php } // Show if not last page ?></td>
      </tr>
    </table>
Registros <?php echo ($startRow_listausuarios + 1) ?> a <?php echo min($startRow_listausuarios + $maxRows_listausuarios, $totalRows_listausuarios) ?> de <?php echo $totalRows_listausuarios ?>
</p>
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
mysql_free_result($listausuarios);
?>
