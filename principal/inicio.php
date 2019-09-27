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
     <a href="sistema.php" class="bto">Ingresar</a></center>
  </section>
  <section>
   <center class="center2">
   <h1>Ultimos Registros de Ingreso</h1>
   <hr>
   <div class="appt">
     <h1>00</h1>
     <hr>
     <h3>Usuarios que han ingresado</h3>
   </div>
   <div class="appt">
     <h1>00</h1>
     <hr>
     <h3>Ingresos del personal</h3>
   </div>
   <div class="appt">
     <h1>00</h1>
     <hr>
     <h3>Uso del sistema</h3>
   </div>
   </center>
  </section>
  <section class="parallax">
   <center class="center2">
  <h2>Ultimos Usuarios que Ingresaron</h2>
    <hr id="hrp">
  <br>
  <div class="appt">
    <img src="../resources/icons/user.png" alt="">
    <h1>Prueba</h1>
  </div>
  <div class="appt">
    <img src="../resources/icons/user.png" alt="">
    <h1>Prueba</h1>
  </div>
  <div class="appt">
  <img src="../resources/icons/user.png" alt="">
  <h1>Prueba</h1>
  </div>
   </center>
  </section>
  <section>
  <div class="app">
   <h1>Tambien para dispositivos moviles</h1>
 </div>
   <div class="app">
    <img src="../resources/images/tele.png" alt="" class="img1">
    <style>
    .apt{
      background: linear-gradient(90deg, #9C5BC8, #65CCC9);
      display: inline-block;
      border-radius: 25px;
      width: 140px;
      height: 140px;
    }

    .apt img {
      width: 100px;
      padding-top: 10px;
      margin-left: 15px;
      padding-bottom: 10px;
      margin-right: 10px;
    }
    </style>
    <div class="apt">
      <img src="../resources/icons/logo2.png" alt="">
    </div>
    <img src="" alt="">
  </div>
  </section>

  <script type="text/javascript" src="../js/main.js"></script>
  <script type="text/javascript" src="../js/app.js"></script>
  </body>
</html>
