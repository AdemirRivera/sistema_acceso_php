<?php
//Verificacion de inicio de sesion

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== TRUE){
    header('location: index.php');
       exit();
}
?>
<!DOCTYPE html>
<html lang="es">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/style2.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <title>Inicio</title>
  </head>

  <body>
   <?php
    include '../includes/menu.php';
   ?>
      <!-- PARALLAX -->
  <section class="parallax">
    <center class="center1">
     <h1>Sistema de Acceso</h1>
     <h2>Iniciar Sistema</h2>
     <a href="#" class="bto">Ingresar</a></center>
  </section>
  <section>
   <center class="center2">
   <h1>Ultimos Registros de Ingreso</h1>
   <hr>
   </center>
  </section>
  <section class="parallax">
   <center class="center2">
  <h2>Ultimos Usuarios que Ingresaron</h2>
  <hr id="hrp">
   </center>
  </section>
  <section>
  <div class="app">
   <h1>No te olvides de usar la App</h1>
 </div>
   <div class="app2">
    <img src="../resources/images/tele.png" alt="" class="img1">
    <img src="" alt="">
  </div>
  </section>

  <script type="text/javascript" src="../js/main.js"></script>
  <script type="text/javascript" src="../js/app.js"></script>
  </body>
</html>
