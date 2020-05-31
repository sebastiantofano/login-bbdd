<html>
<head></head>
<body>

Registro

<form action="guardarUsuario.php" method="post" enctype="application/x-www-form-urlencoded">
    <label>Usuario</label> <input type="text" name="usuario" required><br />
    <label>Clave</label> <input type="password" name="clave" required><br />
    <input type="submit" value="enviar">
</form>
<?php
echo (isset($_GET["creado"])) ? "<p style='color:green'>Usuario Creado</p>" : "";
echo (isset($_GET["existe"])) ? "<p style='color:red'>Usuario ya existente</p>" : "";
?>
<a href="index.php">Volver al inicio</a>
</body>
</html>
