<?php require_once('../Connections/TinedaBrujo.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gestor de imagenes</title>
</head>

<body>
<?php 
//echo '1'.isset($_POST["enviado"]).'<br>';
//echo '2'.$_POST["enviado"] == "estado".'<br>';
if ((isset($_POST["enviado"])) && ($_POST["enviado"] == "estado")) {
	$nombre_archivo = $_FILES['userfile']['name'];
	move_uploaded_file($_FILES['userfile']['tmp_name'], "../Documentos/Productos/".$nombre_archivo);
	
	?>
    <script>
	opener.document.form1.strImagen.value="<?php echo $nombre_archivo; ?>";
	self.close();
	</script>
    <?php
	}
	else
	
	{?>
    
<form action="GestionImagen.php" method="post" enctype="multipart/form-data" id="form1">
<p>
<input name="userfile" type="file" />
</p>
<p>
<input name="Button" type="submit" id="Button" Value="Enviar" />
</p>
<input type="hidden" name="enviado" value="estado" />
</form>
<?php }?>
</body>
</html>