<?php

$server = "localhost";
$usuario = "root";
$password = "";
$db = "pw";

$conn = new mysqli($server, $usuario, $password);


if ($conn->connect_error) {
    die("Fallo la conexión: " . $conn->connect_error);
}

echo "Conexión correcta";

$conn->select_db($db);