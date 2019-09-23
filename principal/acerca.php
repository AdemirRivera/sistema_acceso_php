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
    <link rel="stylesheet" type="text/css" href="../css/style3.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <title>Acerca de</title>
  </head>

  <body>
   <?php
    include '../includes/menu.php';
   ?>

   <section class="sec1">
     <div class="app">
     <center class="fact1">
       <img src="../resources/images/iti.png" alt="" class="iti">
     <h1>Información del Desarrollo</h1>
     <hr>
     <h2>Integrantes:<br>
     Emerson Alfredo Acosta Eduardo <br>
     Héctor Manuel Trejo Acosta <br>
     Ulises Ademir Rivera García</h2>
     </center>
   </div>
   <div class="app">
     <img src="../resources/images/Expedia-EPS.svg" alt="" id="mih">
     <div>
   </section>
   <section class="sec2">
     <center class="fact2">
     <h1>Información de contacto</h1>
     <hr>
     <h2>Boulevard Venezuela Colonia Roma, San Salvador, El Salvador.<br>
     Conmutador: 2224-6946 <br>
     Telefonos: 2223-3886, 2223-3156 <br>
     FAX: 2223-1385<br></h2>
     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1938.2068300295136!2d-89.22284869731232!3d13.693378265207677!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f633045e4056f3f%3A0x71e906b9e1a79eae!2sInstituto%20T%C3%A9cnico%20Industrial!5e0!3m2!1ses-419!2ssv!4v1568901711084!5m2!1ses-419!2ssv" frameborder="0" style="border:0;" allowfullscreen="" class="ifr"></iframe>
   </center>
   </section>
   <section class="sec3">
    <center class="fact3">
      <h1>Desarrollado en :</h1>
      <br>
      <img id="a1" src="../resources/icons/html.png" alt="">
      <img id="a2" src="../resources/icons/css.svg" alt="">
      <img id="a3" src="../resources/icons/php.png" alt="">
      <img id="a4" src="../resources/icons/js.png" alt="">
      <img id="a5" src="../resources/icons/git.png" alt="">
      <img id="a6" src="../resources/icons/github.svg" alt="">
      <img id="a7" src="../resources/icons/chart.svg" alt="">
      <img id="a8" src="../resources/icons/mysql.jpg" alt="">

    </center>
   </section>
  <script type="text/javascript" src="../js/app.js"></script>
  </body>
</html>
