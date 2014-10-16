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
        <meta name="viewport" content="width=device-width">

	<title>Home</title>

	 <link rel="stylesheet" href="estilos.css">

</head>

<body>


<?php

//toma el id de la variable de sesion
$id=$_SESSION['id'];

//si esta conectado entonces dice cuantos items hay en el carrito
if($_SESSION['contador']>0){
$query= "SELECT COUNT(id) FROM `carrito` WHERE tallerDos.carrito.idusuario = $id ";
$result= mysqli_query($con,$query);
$count = mysqli_fetch_array($result);
echo"<a class='carritoH' href='carrito.php'>CARRITO:$count[0] items</a> ";
}

//toma el nombre de la variable de session
$nombre= $_SESSION['nombreCliente'];

//si esta conectado un usuario entonces muestra el boton de logout y el nombre, sino muestra login
if ($_SESSION['contador']>0) {
echo"<a href='logout.php' class='logout'>LOGOUT</a>"; 
echo"<a href='perfil.php' class='nombreCliente'>$nombre</a>";
}else{
   echo" <a href='login.php?paginaDestino=index.php' class='login'>LOGIN</a> ";
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
                   
            <?php
        //si esta conectado entonces al darle en perfil se redigire al login    
        if($_SESSION['contador']>0){
        echo"<a href='perfil.php'>Perfil</a>"; 
    }else{
        echo"<a href='login.php?paginaDestino=perfil.php'>Perfil</a>";
        }        
 ?>
                </nav>  
            </div>
        </header>

<!---session carrito-->
<p class="verCarrito">
<!---a hecho con ayuda de un tutorial-->
<!---abre y cierra la seccion carrito-->
<a  href = "javascript:void(0)" 
onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">
Ver carrito</a></p>
   
    <div id="light" class="white_content"> 
    <a class="close" href = "javascript:void(0)" 
    onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">
    Close</a>

<!---productos del carro-->
<section class="carro">
<div class="productosCarro">
 <?php

$id=$_SESSION['id'];

if($_SESSION['contador']>0){
$query= "SELECT tallerDos.carrito.idarticulo, tallerDos.articulos.id, 
tallerDos.articulos.nombre, tallerDos.articulos.imagen, tallerDos.articulos.descripcion, tallerDos.articulos.precio 
FROM tallerDos.articulos 
RIGHT JOIN tallerDos.carrito ON tallerDos.articulos.id = tallerDos.carrito.idarticulo 
WHERE tallerDos.carrito.idusuario= $id" ;

$result= mysqli_query($con,$query);

while($row = mysqli_fetch_array($result)) {

echo "<article class= 'cotizado'>";
echo "<div>";
echo "<figure><img src=".$row['imagen']." class='imgcarro'></figure>";
echo "</div>";
echo "<div>";
echo "<h1 class='nombreArticulo'> <a href=#>".$row['nombre']."</a></h1> ";
echo "<p class='descripcionCa'> ".$row['descripcion']."</p>";
echo "<p class='precio'> $".$row['precio']."</p>";
echo "</div>";
echo "</article>";


}
  }

//da el precio total de los articulos en el carrito
$query="SELECT sum(tallerDos.articulos.precio) AS 
precio FROM tallerDos.articulos RIGHT JOIN tallerDos.carrito ON tallerDos.articulos.id =
 tallerDos.carrito.idarticulo WHERE tallerDos.carrito.idusuario=$id";

$result= mysqli_query($con,$query);
$countP = mysqli_fetch_array($result);
echo "<p class='precioTotal'> Precio Total $ $countP[0]</p>"

?>

<!---boton agregar compra-->
<form action='agregarCompra.php' method ='POST'>
<input type='submit' name 'COMPRAR' value ='Comprar' class= "comprarTodo">
</form>  

</div>
</section>
</div>


<!---seccion del futuro slider de imagenes-->
<section class="sSlider">

<article class="slides">
<div class ="imageSlides">
<h1 class="sText"> <a href="taller2.php?slide=LEDS" class="slidesText"> LEDS </a></h1>
<h1 class="sText"> <a href="taller2.php?slide=FLORA" class="slidesText"> FLORA </a> </h1>
<h1 class="sText"> <a href="taller2.php?slide=SENSORS" class="slidesText"> SENSORS </a> </h1>
<h1 class="sText"> <a href="taller2.php?slide=NEOPIXELS" class="slidesText"> NEOPIXELS </a> </h1>

</div>
</article>

</section>

<!---articulos destacados-->
<h1 class="titulosI"> Articulos destacados </h1>

<section class="destacados">
<div class="productos">

<?php

$query= "SELECT articulos.id, articulos.precio, articulos.nombre, articulos.imagen, articulos.descripcion FROM articulos WHERE articulos.destacado=1
";

$contador=0;

$result= mysqli_query($con,$query);

$idArticulo= 0;

while($row = mysqli_fetch_array($result)) {

$idArticulo= $row['id'];

echo "<article class= 'articulos'>";
echo "<div>";
echo "<figure><img src=".$row['imagen']."></figure>";
echo "</div>";
echo "<div>";
echo "<h1 class='nombreArticulo'> <a href=#>".$row['nombre']."</a></h1> ";
echo "<p class='descripcion'> ".$row['descripcion']."</p>";
echo "<p class='precio'> $".$row['precio']."</p>";

if ($_SESSION['contador']>0) {
echo "<a href= 'agregarCarrito.php?idArticulo=$idArticulo'><p class='anadirCarro'> AÑADIR AL CARRO</p><a>";
}else{

$_SESSION['articulo']=$idArticulo;
echo "<a href= 'login.php?paginaDestino=agregarCarrito.php'><p class='anadirCarro'> AÑADIR AL CARRO</p><a>";
}

echo "</div>";
echo "</article>";

}

?>
</div>
</section>

<!---footer-->
<footer>
	<h1>2014 @MorenoAlejandra</h1>
</footer>
</body>

</html>

