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

	<title>Registro</title>

	 <link rel="stylesheet" href="estilos.css">

</head>

<body>


<a href="#">WEARABLES ARE THE FUTURE</a> 
<a href="login.php" class="login">LOGIN</a> 


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

//se conecta
include_once("includes/database.php");

?>
 <section class ="datos">
<div class ='espacio'>
<form action="AgregarUsuario.php" method ="POST">

   <label class='loginDatos'>Nombre:</label><input class='cuadrosDatos' type="text" name="nombre" value"" ><br>
   <label class='loginDatos'>Apellido:</label><input class='cuadrosDatos' type="text" name="apellido" value"" ><br>
   <label class='loginDatos'>Correo:</label><input class='cuadrosDatos' type="text" name="correo" value"" ><br>
   <label class='loginDatos'>Contrasena:</label><input class='cuadrosDatos' type="text" name="contrasena" value""><br>
   <h1 class="bienvenidaR">*Todos los campos son oblligatorios</h1>
   <input class='botonDatosRR' type="submit" name="Enviar" value="Enviar" >

</form>
</div>
</section>



<footer>
	<h1>2014 @MorenoAlejandra</h1>
</footer>

</body>

</html>