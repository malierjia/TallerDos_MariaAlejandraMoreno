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

//agrega la compra tomando el id del articulo del carrito, y colocando la fecha del dia
$id=$_SESSION['id'];

$fecha =date("Y-m-d");

$cliente=0;

$nombre= $_SESSION['nombreCliente'];

$queryArticulos= "SELECT tallerDos.articulos.id 
FROM tallerDos.articulos 
RIGHT JOIN tallerDos.carrito ON tallerDos.articulos.id = tallerDos.carrito.idarticulo 
WHERE tallerDos.carrito.idusuario= $id";

$resultA= mysqli_query($con,$queryArticulos);

$queryId = "SELECT *  FROM tallerDos.cliente";

$result= mysqli_query($con,$queryId);

while($row = mysqli_fetch_array($result)) {

	if($nombre == $row['nombre']){

     $cliente= $row['id'];
    
	}
}

while($row = mysqli_fetch_array($resultA)) {

$articulo= $row['id'];

$query= "INSERT INTO tallerDos.compras (`id`, `cliente`, `articulo`, `fecha`) VALUES ('',$cliente,$articulo,NOW())";
 
mysqli_query($con,$query);

$queryBorrar= "DELETE FROM tallerDos.carrito";
mysqli_query($con,$queryBorrar);


}

header('Location: index.php');

?>

</body>
</html>

