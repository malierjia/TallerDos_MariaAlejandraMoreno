<?php //se conecta

require_once('includes/database.php');

//inicia, continua session
session_start();

//variables de session
//para saber si esta conectado, 1 o 0
if(!isset($_SESSION['contador'])){
    $_SESSION['contador']=0;
}

//pasa el nombre del cliente

if(!isset($_SESSION['nombreCliente'])){
$_SESSION['nombreCliente']="";
}

//pasa el id del cliente
if(!isset($_SESSION['id'])){
$_SESSION['id']=0;
}

//pasa el id del articulo seleccionado

if(!isset($_SESSION['articulo'])){
$_SESSION['articulo']="";
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
</head>

<body>
<?php




//variables que reciben 
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$contrasena= $_POST["contrasena"];
$apellido= $_POST["apellido"];

//inserta los datos en la base de datos, query descrito en word
$query= "INSERT INTO tallerDos.cliente (`id`, `nombre`, `apellido`, `contrasena`, `correo`) VALUES
 ('', '$nombre', '$apellido','$contrasena','$correo')";

mysqli_query($con,$query);

//cuando acaba vuelve a la pagina de login
header('Location: login.php');
?>

</body>
</html>

