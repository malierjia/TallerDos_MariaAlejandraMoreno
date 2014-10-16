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

    <title>Catalogo</title>

     <link rel="stylesheet" href="estilos.css">

</head>

<body>


<!---conteo de los items en el carrito y nombre del cliente-->
<?php


$id=$_SESSION['id'];


if($_SESSION['contador']>0){

$query= "SELECT COUNT(id) FROM `carrito` WHERE tallerDos.carrito.idusuario = $id ";
$result= mysqli_query($con,$query);
$count = mysqli_fetch_array($result);
echo"<a class= 'carritoHC' href='#'>CARRITO:$count[0] items</a> ";
}


$nombre= $_SESSION['nombreCliente'];

if ($_SESSION['contador']>0) {
echo"<a href='logout.php' class='logoutC'>LOGOUT</a>"; 
echo"<a href='perfil.php' class='nombreCliente'>$nombre</a>"; 
}
else{
   echo" <a href='login.php?paginaDestino=catalogo.php' class='login'>LOGIN</a> ";
}
?>

<!---header-->
<header class="Hheader">

           <div class="logo">
                <a href="index.php"><figure class="headerLogo"><img src="images/logoHeader.png"></figure></a>
            </div>

            <div class="botonesHeader">
                <nav>
                    <a href="index.php">Home</a> /
                    <a href="catalogo.php">Catalogo</a> /
                   
            <?php
        //si esta conectado va al perfil sino al login    
        if($_SESSION['contador']>0){
        echo"<a href='perfil.php'>Perfil</a>";   }else{

        echo"<a href='login.php?paginaDestino=perfil.php'>Perfil</a>";
        }        
 ?>
                </nav>  
            </div>
        </header>

<!--carrito-->
<p class="verCarrito">
<!--a hecho con ayuda de un tutorial, abre y cierra la seccion carrito-->
<a  href = "javascript:void(0)" 
onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">

<!---session carrito-->
Ver carrito</a></p>
    
    <div id="light" class="white_content"> 
    <a class="close" href = "javascript:void(0)" 
    onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">
    Close</a>

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


<form action='agregarCompra.php' method ='POST'>
<input type='submit' name 'COMPRAR TODO' value ='Comprar Todo' class= "comprarTodo">
</form>  


</div>
</section>
</div>


<!--titulo-->
<section class="sSlider">

<h1 class="titulosIC"> Catalogo </h1>

</article>


</section>


<!--todos los articulos-->
<section class="catalogoTodo">
<div class="productosTodo">


<?php

$query= "SELECT articulos.id, articulos.precio, articulos.nombre, articulos.imagen, articulos.descripcion 
FROM articulos
";

$contador=0;

$result= mysqli_query($con,$query);

$idArticulo= 0;

while($row = mysqli_fetch_array($result)) {

$idArticulo= $row['id'];

echo "<article class= 'articulosTodo'>";
echo "<div>";
echo "<figure><img class ='pequenas' src=".$row['imagen']."></figure>";
echo "</div>";
echo "<div>";
echo "<h1 class='nombreArticulo'> <a href=#>".$row['nombre']."</a></h1> ";
echo "<p class='descripcionC'> ".$row['descripcion']."</p>";
echo "<p class='precio'> $".$row['precio']."</p>";

if ($_SESSION['contador']>0) {
echo "<a href= 'agregarCarrito.php?idArticulo=$idArticulo'><p class='anadirCarroC'> AÑADIR AL CARRO</p><a>";
}else{

$_SESSION['articulo']=$idArticulo;
echo "<a href= 'login.php?paginaDestino=agregarCarrito.php'><p class='anadirCarroC'> AÑADIR AL CARRO</p><a>";


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



