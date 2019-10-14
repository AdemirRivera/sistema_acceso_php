<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/estil4.css">
    <link rel="stylesheet" href="../css/estil3.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <title></title>
  </head>
  <body>
    <?php
    include '../includes/header.php';
     ?>
    <?php
         include '../php/codactper.php';
         include '../php/conexion.php';
          ?>

          <aside id="sidebar">
          <div class="burger">
        <a href="../principal/personal.php"><img src="../resources/icons/left-arro.png" alt="" style="width: 35px;"></a>
          </div>
          </aside>

  	<section id="container" style="padding-top: 80px;">
      <center>
              <div class="form_register">
  		<h1>Actualizacion de Personal</h1>
      <hr>
      <div class="alert"><?php echo isset($alert) ? $alert: ''; ?></div>
      <form action="" method="post">
              <img src="../resources/icons/user.png" alt="" class="logoy">
              <input name="idusuario" value="<?php echo $iduser ?>" type="hidden">
              <label for="nombre">Nombre</label>
              <input type="text" name="nombre" id="nombre" placeholder="Nombre Completo" value="<?php echo $nombre ?>">
              <label for="apellido">Apellido</label>
              <input type="text" name="apellido" id="apellido" placeholder="Apellido Completo" value="<?php echo $apellido ?>">
              <label for="ident">Numero de identidad</label>
              <input type="text" name="ident" id="ident" placeholder="DUI, NIT, etc" >
              <label for="tel">Telefono</label>
              <input type="number" name="tel" id="tel" placeholder="Telefono" value="<?php echo $tel ?>">
              <label for="rol">Usuario</label>

              <?php

              $query_rol = mysqli_query($conection, 'SELECT * FROM usuario');
              $result_rol = mysqli_num_rows($query_rol);

              ?>
              <select name="rol" id="rol" class="notitem">
                  <?php
                                          echo $option;
                  if($result_rol > 0){
                      while ($rol = mysqli_fetch_array($query_rol)){
                      ?>
                  <option value="<?php echo $rol['ID_USUARIO'] ?>"><?php echo $rol['NOMBRE_USUARIO'] ?></option>
                <?php
                      }
                  }
                  ?>

              </select>
              <input type="submit" value="Actualizar" class="btn_save">
          </form>
      </div>
    </center>
  	</section>
  </body>
</html>
