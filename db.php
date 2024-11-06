<?php
$servername = "mysql-frostwhisper.alwaysdata.net";
$username = "383111";
$password = "45653655";
$database = "frostwhisper_insertar-crud2";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
