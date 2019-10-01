<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/estil3.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <title></title>
  </head>
  <body>
    <?php
    include '../includes/header.php';
     ?>
    <?php
         include '../php/codactual.php';
         include '../php/conexion.php';
          ?>

          <aside id="sidebar">
          <div class="burger">
        <a href="usuarios.php"><img src="../resources/icons/left-arro.png" alt="" style="width: 35px;"></a>
          </div>
          </aside>

  	<section id="container">
              <div class="form_register">
  		<h1>Actualizacion de Usuario</h1>
                  <hr>
                  <div class="alert"><?php echo isset($alert) ? $alert: ''; ?></div>
                  <form action="" method="post">
                          <img src="../images/user.png" alt="" class="logo">
                          <input name="idusuario" value="<?php echo $iduser ?>" type="hidden">
                          <label for="nombre">Nombre</label>
                          <input type="text" name="nombre" id="nombre" placeholder="Nombre Completo" value="<?php echo $nombre ?>">
                          <label for="clave">Contraseña</label>
                          <input type="password" name="clave" id="clave" placeholder="Contraseña de acceso">
                          <label for="rol">Tipo de Usuario</label>

                          <?php

                          $query_rol = mysqli_query($conection, 'SELECT * FROM tipo_usuario');
                          $result_rol = mysqli_num_rows($query_rol);

                          ?>
                          <select name="rol" id="rol" class="notitem">
                              <?php
                                                      echo $option;
                              if($result_rol > 0){
                                  while ($rol = mysqli_fetch_array($query_rol)){
                                  ?>
                              <option value="<?php echo $rol['ID_TIPO_USUARIO'] ?>"><?php echo $rol['TIPO_USUARIO'] ?></option>
                            <?php
                                  }
                              }
                              ?>

                          </select>
                          <input type="submit" value="Actualizar" class="btn_save">
                      </form>
                  </div>
  	</section>
  </body>
</html>
