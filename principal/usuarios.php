<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/estil2.css">
    <link rel="stylesheet" href="../css/style4.css">
    <link rel="stylesheet" href="../css/style5.css">
    <link rel="stylesheet" href="../css/stil.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
  </head>
  <body>
<?php
include '../includes/header.php';
include '../includes/sidebar.php';
 ?>
 <form class="buscar-caja" action="../process/search.php" method="get">
<input type="text" name="busqueda" id="busqueda" class="buscar-txt" placeholder="Buscar...">
<input class="buscar-btn" type="submit" value="">
</input>
</form>
    <section id='container'>
     <h1>Lista de usuarios</h1>

    <a href="../process/reguser.php" class="btn_new">Crear usuario</a>
    <table>
    <tr>
      <th>ID</th>
      <th>Nombre de Usuario</th>
      <th>Tipo de Usuario</th>
      <th>Acciones</th>
    </tr>
    <?php
          require_once '../php/conexion.php';

$sql_registe = mysqli_query($conection, "SELECT COUNT(*) AS total_registro FROM usuario WHERE estatus = 1;");
$result_register = mysqli_fetch_array($sql_registe);
$total_registro = $result_register['total_registro'];

$por_pagina = 5;

if(empty($_GET['pagina']))
{
  $pagina = 1;
}else{
  $pagina = $_GET['pagina'];
}

$desde = ($pagina-1) * $por_pagina;
$total_paginas = ceil($total_registro / $por_pagina);

  $query = mysqli_query($conection, "SELECT u.ID_USUARIO, u.NOMBRE_USUARIO, t.TIPO_USUARIO FROM usuario u INNER JOIN tipo_usuario t ON u.ID_TIPO_USUARIO_USUARIO = t.ID_TIPO_USUARIO WHERE estatus = 1 ORDER BY ID_USUARIO ASC LIMIT $desde,$por_pagina");

  $result = mysqli_num_rows($query);
  if ($result > 0) {
    // code...
    while ($data = mysqli_fetch_array($query)) {
      // code...

  ?>
  <tr>
    <td><?php echo $data['ID_USUARIO']; ?></td>
    <td><?php echo $data['NOMBRE_USUARIO']; ?></td>
    <td><?php echo $data['TIPO_USUARIO']; ?></td>
    <td>
        <a class="link_edit" href="../process/edituser.php?id=<?php echo $data['ID_USUARIO']; ?>">Editar</a>
      <a class="link_delete" href="../process/deluser.php?id=<?php echo $data['ID_USUARIO']; ?>">Eliminar</a>
    </td>
  </tr>
  <?php
  }
  }
  ?>
    </table>
    <div class="paginador">
      <ul>

        <?php
if($pagina != 1){
        ?>
        <li><a href="?pagina=<?php echo 1; ?>"> |< </a></li>
        <li><a href="?pagina=<?php echo $pagina-1; ?>"> << </a></li>
<?php
}
    for ($i=1; $i < $total_paginas+1; $i++) {
      // code...
      if($i == $pagina){
          echo '<li class="pageSelected">'.$i.'</li>';
      }else{
echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';
    }
}

if($pagina !=$total_paginas){
 ?>
        <li><a href="?pagina=<?php echo $pagina+1; ?>"> >> </a></li>
        <li><a href="?pagina=<?php echo $total_paginas; ?>"> >| </a></li>
<?php } ?>
      </ul>
    </div>

</center>
  </section>
  <script type="text/javascript" src="../js/trast.js"></script>

  </body>
</html>
