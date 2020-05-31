<?php
//Se fija si no llegaron valores por POST
if(!isset($_POST["usuario"]) || !isset($_POST["clave"])) {
    header("Location: index.php");
    exit();
}

require_once ("bbdd.php");

//Setea a variables la supervariable $_POST
$usuario = $_POST["usuario"];
//Calcula el hash del string
$clave = md5($_POST["clave"]);

$stmt = $conn->prepare("INSERT into usuario (nombreUsuario, claveUsuario) values (?,?)");
$stmt->bind_param("ss", $usuario,$clave);
$ok = $stmt->execute();

if(!$ok){
    echo "Falló la ejecución: (" . $stmt->errno . ") " . $stmt->error;
}
$stmt->close();
$conn->close();
header("Location: registro.php?creado=true");
exit();



/*$archivo = $usuario . ".json";
$dir = __DIR__ . '/usuarios/';

if(!file_exists($dir.$archivo)) {
    $usuarioMatriz = array("usuario"=>$usuario,"clave"=>$clave);
//    Guardo un archivo
    file_put_contents($dir.$archivo, json_encode($usuarioMatriz));
//    echo $dir.$archivo;
        header("Location: registro.php?creado=true");
        exit();
} else {
    header("Location: index.php");
    exit();
}*/

