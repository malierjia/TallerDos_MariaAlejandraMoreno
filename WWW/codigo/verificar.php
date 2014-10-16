<?php require_once('includes/database.php');
session_start();
?>


<?php

//se conecta
include_once("includes/database.php");

$correo="";
$contrasena="";
$pagina="";

$pagina=$_GET['paginaDestino'];

//toma las variables arrojadas del index.php
$correo = $_POST['correo'];
$contrasena = $_POST['password'];




//si las variables no estan vacias
if(isset($correo) && !empty ($correo) && isset($contrasena) && !empty ($contrasena))
{  

//query descrito en word
 $query = "SELECT * FROM tallerDos.cliente WHERE `correo`= '$correo'";
 
 $result = mysqli_query($con,$query);

 //se recorre el arreglo con la informacion que arroja el query
 while($row = mysqli_fetch_array($result)){

//si la contraseña es igual a la dada en el registro entonces va a la siguiente pagina sino permanece en el login
  if($contrasena == $row['contrasena']){
    $_SESSION['contador']=1;
    $_SESSION['nombreCliente']=$row['nombre'];
    $_SESSION['id']= $row['id'];
    

    

    header('Location:' .$pagina);

  } else{
   header('Location: index.php');
   }
 }
}
else{
	header('Location: index.php');
}

?>