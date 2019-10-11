<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
        <link rel="stylesheet" href="../css/estil5.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <title></title>
  </head>
  <body>

    <?php
         include '../php/codpers.php';
         include '../php/conexion.php';
          ?>
          <aside id="sidebar">
          <div class="burger">
          <a href="../principal/usuarios.php"><img src="../resources/icons/left-arro.png" alt="" style="width: 35px;"></a>
          </div>
          </aside>
    <section id="container">
      <center>
              <div class="data_delete">
                  <h2>¿Esta seguro de eliminar el siguiente registro?</h2>
                  <p class="for">Usuario: <span id="tre"><?php echo $nombre ?></span></p>
                  <p class="for">Tipo Usuario: <span><?php echo $rol ?></span></p>

                  <form method="post" action="">
                      <input name="idusuario" value="<?php echo $iduser ?>" type="hidden">
                      <a href="personal.php" class="cancel">Cancelar</a>
                      <input type="submit" value="Aceptar">
                  </form>
              </div>
</center>
    </section>
  </body>
</html>
