<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/estil2.css">
    <link rel="stylesheet" href="../css/style4.css">
    <link rel="stylesheet" href="../css/style5.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
  </head>
  <body>
<?php
include '../includes/header.php';
include '../includes/sidebar.php';
 ?>
    <section id='container'>

     <h1>Lista de usuarios</h1>
    <!-- <a href="../register/registeru.php" class="btn_new">Crear usuario</a> -->
    <table>
    <tr>
      <th>ID</th>
      <th>NOMBRE_USUARIO</th>
      <th>TIPO_USUARIO_USUARIO</th>
      <th>Acciones</th>
    </tr>
    <?php
          require_once '../php/conexion.php';

// $sql_registe = mysqli_query($conection, "SELECT COUNT(*) AS total_registro FROM usuario WHERE estatus = 1;")
// $result_register = mysqli_fetch_array($sql_registe);
// $total_registro = $result_register

  $query = mysqli_query($conection, 'SELECT u.ID_USUARIO, u.NOMBRE_USUARIO, t.TIPO_USUARIO FROM usuario u INNER JOIN tipo_usuario t ON u.ID_TIPO_USUARIO_USUARIO = t.ID_TIPO_USUARIO WHERE estatus = 1 ORDER BY ID_USUARIO ASC');

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
        <a class="link_edit" href="../principal/edituser.php?id=<?php echo $data['ID_USUARIO']; ?>">Editar</a>
      <a class="link_delete" href="../principal/deluser.php?id=<?php echo $data['ID_USUARIO']; ?>">Eliminar</a>
    </td>
  </tr>
  <?php
  }
  }
  ?>
    </table>
    <div class="paginador">
      <ul>
        <li><a href="#"> |< </a></li>
        <li><a href="#"> << </a></li>
        <li class="pageSelected">1</li>
        <li><a href="#"> 2 </a></li>
        <li><a href="#"> 3 </a></li>
        <li><a href="#"> >> </a></li>
        <li><a href="#"> >| </a></li>
      </ul>
    </div>

</center>
  </section>
  <script type="text/javascript" src="../js/trast.js"></script>

  </body>
</html>
