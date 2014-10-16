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

//si esta conectado toma el id del articulo
if( $_SESSION['contador']>0){
$articulo=$_GET['idArticulo'];
}else{
$articulo=$_SESSION['articulo'];

}


//agrega el articulo a la tabla carrito tomando el id del usuario al compararlo con el nombre de la variable de session
$cliente=0;

$nombre= $_SESSION['nombreCliente'];

$queryId = "SELECT *  FROM tallerDos.cliente";

$result= mysqli_query($con,$queryId);

while($row = mysqli_fetch_array($result)) {

	if($nombre == $row['nombre']){
     $cliente= $row['id'];

     $query= "INSERT INTO tallerDos.carrito (`id`, `idarticulo`, `idusuario`) VALUES ('',$articulo,$cliente)";
 
     mysqli_query($con,$query);

     header('Location: index.php');

	}

}


?>

</body>
</html>

