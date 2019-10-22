<!DOCTYPE html>
<?php
if (isset($_COOKIE['contador'])) {
  // code...
  setcookie('contador', $_COOKIE['contador']+1, time()+365*24*60*60);
  echo "Numero de Visitas: ".$_COOKIE['contador'];
}else {
  // code...
  setcookie('contador', 1, time()+365*24*60*60);
  echo "Bienvenido por primera vez";
}
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  </body>
</html>
