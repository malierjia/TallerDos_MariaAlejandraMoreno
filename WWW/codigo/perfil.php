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
<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

	<title>Compras</title>

	 <link rel="stylesheet" href="estilos.css">

</head>

<body>

<?php



$nombre= $_SESSION['nombreCliente'];

if ($_SESSION['contador']>0) {
echo"<a href='logout.php' class='logout'>LOGOUT</a>"; 
echo"<a href='perfil.php' class='nombreCliente'>$nombre</a>"; 


}
else{
   echo" <a href='login.php' class='login'>LOGIN</a> ";
}
?>

<header class="Hheader">



            <div class="logo">
                <a href="index.php"><figure class="headerLogo"><img src="images/logoHeader.png"></figure></a>
            </div>

            <div class="botonesHeader">
                <nav>
                    <a href="index.php">Home</a> /
                    <a href="catalogo.php">Catalogo</a> /
                    <a href="perfil.php?id=1">Perfil</a>           
                </nav>  

            </div>

        </header>



<?php

echo"<h1 class='nombreU'> Perfil $nombre </h1>";

echo "<section class='destacados'>";
echo "<div class='productos'>";

echo"</br>";

echo"<h1 class='titulos'> Compras </h1>";

//toma los elementos de la tabla comprar que tenga el usuario 

$id=$_SESSION['id'];

$query= "SELECT tallerDos.compras.articulo, tallerDos.compras.cliente, tallerDos.compras.fecha, tallerDos.articulos.id, tallerDos.articulos.nombre, tallerDos.articulos.imagen, tallerDos.articulos.descripcion, tallerDos.articulos.precio 
FROM tallerDos.articulos 
RIGHT JOIN tallerDos.compras ON tallerDos.articulos.id = tallerDos.compras.articulo 
WHERE tallerDos.compras.cliente= $id" ;


$result= mysqli_query($con,$query);

while($row = mysqli_fetch_array($result)) {

echo "<article class= 'articulos'>";
echo "<div>";
echo "<figure><img src=".$row['imagen']."></figure>";
echo "</div>";
echo "<div>";
echo "<h1 class='nombreArticulo'> <a href=#>".$row['nombre']."</a></h1> ";
echo "<p class='descripcion'> ".$row['descripcion']."</p>";
echo "<p class='descripcion'> Fecha de compra ".$row['fecha']."</p>";
echo "<p class='precio'> $".$row['precio']."</p>";

echo "</div>";
echo "</article>";


}


?>

</div>
</section>


<footer>
    <h1>2014 @MorenoAlejandra</h1>
</footer>

</body>




</html>

