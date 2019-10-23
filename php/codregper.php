<?php
   $alert = '';

if(!empty($_POST))
{
  if(empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['ident']) || empty($_POST['tel']) || empty($_POST['rol']))
  {
    $alert = '<p class="msg_error">Todos los campos son Obligatorios</p>';
  } else{
    include '../php/conexion.php';

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $tel = $_POST['tel'];
    $rol = $_POST['rol'];

    if($_POST['ident'] < 4){
        $alert ='<p class="msg_error">Su Numero de identidad debe tener mas de 4 caracteres</p>' ;
    }else{
         $ident = $_POST['ident'];

    $query= mysqli_query($conection,"SELECT * FROM personal WHERE NUMERO_IDENTIDAD_PERSONAL = '$ident'");
        $result = mysqli_fetch_array($query);


    if($result > 0){
      $alert='<p class="msg_error">El Personal ya existe.</p>';
    }else{

     $query_insert = mysqli_query($conection,"INSERT INTO personal(NOMBRE_PERSONAL, APELLIDOS_PERSONAL, NUMERO_IDENTIDAD_PERSONAL, TELEFONO_PERSONAL, ID_USUARIO_PERSONAL, estatus)
                                                VALUES('$nombre','$apellido','$ident','$tel','$rol', 1)");

     if($query_insert ){
       mysqli_query($conection, "UPDATE usuario SET vacante = 1 WHERE ID_USUARIO = '$iduser' ");
      $alert='<p class="msg_save">Nuevo Personal creado.</p>';

    }else{
     $alert='<p class="msg_error">Error al Crear el Personal.</p>';

   }
 }
    }
}
}
