<?php

$matriz_ini = parse_ini_file("config.ini",true);

$server = $matriz_ini['DB_HOST'];
$usuario = $matriz_ini['DB_USER'];
$password = $matriz_ini['DB_PASS'];
$db = $matriz_ini['DB_NAME'];

$conn = new mysqli($server, $usuario, $password);


if ($conn->connect_error) {
    die("Fallo la conexión: " . $conn->connect_error);
}

echo "Conexión correcta";

$conn->select_db($db);