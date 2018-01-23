<html>
<head>
<link rel="stylesheet" type="text/css" href="assets/css/css.css">
</head>
<body>

<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
<button onclick="window.location='logout.php';" style="width:auto;">Logout </button>

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
</body>
</html>
