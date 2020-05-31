<?php
session_start();
if(!isset($_SESSION["usuario"])){
    session_destroy();
    header("location: index.php");
    exit();
}
require_once("bbdd.php");

$usuario = $_SESSION["usuario"];
//$archivo = $usuario . ".json";
//$dir = __DIR__ . "/usuarios/";
$claveNueva = md5($_POST["clave-nueva"]);

$stmt = $conn->prepare("UPDATE usuario SET claveUsuario = ? WHERE nombreUsuario = ? ");
$stmt->bind_param("ss",$claveNueva,$usuario);
$stmt->execute();

$stmt->close();
$conn->close();
header("Location: interno.php?cambio=true");
exit();

/*
//    Convierte el archivo en un string (pero tiene formato JSON)
$archivoUsuarioJSON = file_get_contents($dir.$archivo);
//Convierte un string codificado en JSON a una variable de PHP
$archivoUsuarioArray = json_decode($archivoUsuarioJSON,TRUE);

//Pongo en el array la nueva contraseña
$archivoUsuarioArray["clave"] = md5($claveNueva);
//Convierto a JSON y escribo en el archivo
file_put_contents($dir.$archivo, json_encode($archivoUsuarioArray));
*/

//header("Location: interno.php?cambio=true");
//exit();


?>

