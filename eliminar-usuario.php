<?php
session_start();

if(!isset($_SESSION["usuario"]) /*or $_SESSION["usuario"] != 'admin'*/){
    header("Location: index.php");
    exit();
}
if($_SESSION["usuario"] == $_GET["usuario"]){
    header("location: listar-usuarios.php?auto=true");
    exit();
}

require_once("bbdd.php");
//Usuario enviado a eliminar
$usuario = $_GET["usuario"];
//$dirUsuarios = "./Usuarios/";

/*unlink($dirUsuarios.$usuario.".json");*/

$stmt = $conn->prepare("DELETE FROM usuario WHERE nombreUsuario = ?");
$stmt->bind_param("s", $usuario);
$result = $stmt->execute();

if(!$result){
    die("Falló la ejecución: (" . $stmt->errno . ") " . $stmt->error);
}
$stmt->close();
$conn->close();
header("location: listar-usuarios.php");
exit();
