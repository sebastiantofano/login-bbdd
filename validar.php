    <?php
//Se fija si no llegaron valores por POST
if(!isset($_POST["usuario"]) || !isset($_POST["clave"])) {
    header("Location: index.php");
    exit();
}

require_once('bbdd.php');

//Setea a variables la supervariable $_POST
$usuario = $_POST["usuario"];
$clave = md5($_POST["clave"]);

/* Crear una sentencia preparada*/
$stmt = $conn->prepare("select * from usuario where nombreUsuario = ? and claveUsuario = ?");
$stmt->bind_param("ss",$usuario, $clave);

/*Ejecutar el stmt*/
$stmt->execute();
$result = $stmt->get_result();
//print_r($resultado);

    if($result->num_rows != 0){
        session_start();
        $_SESSION["usuario"] = $usuario;
        header("Location: interno.php");
        exit();
    }else{
        header("Location: index.php?fallo=true");
        exit();
    }




/*
$archivo = __DIR__. "/usuarios/".$usuario . ".json";
//Si el archivo que contiene al usuario existe
if(file_exists($archivo)) {
//    Convierte el archivo en un string (pero tiene formato JSON)
    $usuarioMatriz = file_get_contents($archivo);
//    echo $usuarioMatriz . "<br />";
    //Convierte un string codificado en JSON a una variable de PHP
    //Lo convierte en un array asociativo con TRUE
    $usuarioMatriz = json_decode($usuarioMatriz, TRUE);
//    print para ver el array asociativo
//    print_r($usuarioMatriz) ;
    if($usuarioMatriz["usuario"] == $usuario && $usuarioMatriz["clave"] == md5($clave)) {
        session_start();
        $_SESSION["usuario"] = $usuario;
        header("Location: interno.php");
        exit();
    }else{
        header("Location: index.php?fallo=true");
        exit();
    }
} else {
    header("Location: index.php?fallo=true");
    exit();
}]*/
?>