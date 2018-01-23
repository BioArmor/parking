<?php

// Quick settings
set_time_limit(2);
error_reporting(E_ALL);
ini_set('display_errors', 'On');
if (isset($_SESSION["con"])){
echo "La sesión existe ...";
} else{session_start();}

?>

 <?php

// datos para la coneccion a mysql
$DB_SERVER = "127.0.0.1";
$DB_NAME = "parking";
$DB_USER = "root";
$DB_PASS = "";

$_SESSION["con"] =mysqli_connect($DB_SERVER,$DB_USER,$DB_PASS,$DB_NAME);
/*if (1==1) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}*/


?> 