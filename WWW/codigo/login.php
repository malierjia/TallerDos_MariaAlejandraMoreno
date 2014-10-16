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

$paginaDestino="";



?>

<!DOCTYPE html>
<html>
   <head>
<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

    <title>Login</title>

     <link rel="stylesheet" href="estilos.css">

</head>
    <body>

  
    <a  href="index.php">WEARABLES ARE THE FUTURE</a> 
      
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
 
        <section class ="datos">

        <div>
        <h1 class="bienvenida"> Bienvenido ingresa tus datos para empezar a comprar</h1>
        </div>
<?php

$paginaDestino=$_GET['paginaDestino'];


//if donde depende de donde llegue sin login le da una variable de destino para que cuando haga login vuelva a la
//misma pagina donde le dio click inicialmente
echo"<div class ='espacio'>";
if($paginaDestino=="perfil.php"){
  
  echo"</br>";
  echo"<form action='verificar.php?paginaDestino=perfil.php' method ='POST'>";
  echo "<label class='loginDatos'>Correo</label><input  class='cuadrosDatos' type='email' name='correo' value'' >";
  echo"</br>";
  echo"</br>";
  echo "<label class='loginDatos'>Contraseña</label><input  class='cuadrosDatos' type='password' name='password' value'' >";
  echo"</br>";
  echo"<input class='botonDatos' type='submit' name 'LOG IN' value ='Log in' >";
  echo"</form>";


}
if($paginaDestino=="agregarCarrito.php"){
  
   echo"<form action='verificar.php?paginaDestino=agregarCarrito.php' method ='POST'>";
   echo "<label class='loginDatos'>Correo</label><input class='cuadrosDatos' type='email' name='correo' value'' >";
   echo"</br>";
   echo "<label class='loginDatos'>Contraseña</label><input class='cuadrosDatos' type='password' name='password' value'' >";
   echo"</br>";
   echo"<input class='botonDatos' type='submit' name 'LOG IN' value ='Log in' >";
echo"</form>";
}

if($paginaDestino=="index.php"){
  
   echo"<form action='verificar.php?paginaDestino=index.php' method ='POST'>";
   echo "<label class='loginDatos'>Correo</label><input  class='cuadrosDatos' type='email' name='correo' value'' >";
   echo"</br>";
   echo "<label class='loginDatos'>Contraseña</label><input  class='cuadrosDatos' type='password' name='password' value'' >";
   echo"</br>";
   echo"<input class='botonDatos' type='submit' name 'LOG IN' value ='Log in' >";
echo"</form>";
}

if($paginaDestino=="catalogo.php"){
  
   echo"<form action='verificar.php?paginaDestino=catalogo.php' method ='POST'>";
   echo "<label class='loginDatos'>Correo</label><input class='cuadrosDatos' type='email' name='correo' value'' >";
   echo"</br>";
   echo "<label class='loginDatos'>Contraseña</label><input  class='cuadrosDatos' type='password' name='password' value'' >";
   echo"</br>";
   echo"<input class='botonDatos' type='submit' name 'LOG IN' value ='Log in' >";

   echo"</form>";
}

  ?>
      <button  type="button" class='botonDatosRR'><a class='botonDatosR' href="registrar.php">Registrar</a></button>
</div>
        </section>

       <footer>
	<h1>2014 @MorenoAlejandra</h1>
       </footer>

        </body>
</html>

