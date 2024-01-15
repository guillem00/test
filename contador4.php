<?php

ini_set('display_errors',1);
ini_set('display_stsrtup_errors',1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "guillem";
$password = "root";
$dbname = "estadistiques";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn -> connect_errno){

echo "Error en connectar a Mysql: " . $conn -> connect_error;
exit();
}

$ip=$_SERVER['REMOTE_ADDR'];
$sql="INSERT INTO registre(ip) VALUES ('" . $ip . "')";
$conn->query($sql);

$resultat = $conn->query("SELECT COUNT(*) FROM registre");
$row = mysqli_fetch_array($resultat);
echo $row[0];

$conn->close();


?>