<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'conexion.php';

if(!empty($_POST)){

    $idpersonal = $_POST['idpersonal'];

    $query_delete = mysqli_query($conection, "UPDATE personal SET estatus = 0 WHERE ID_PERSONAL = $idpersonal");

    if($query_delete){
    header('location: ../principal/personal.php');
    }else{
        echo 'Error al eliminar';
    }
}

if(empty($_REQUEST['id'])){
    header('location: ../principal/personal.php');
}else{

    include 'conexion.php';

    $idpersonal = $_REQUEST['id'];

    $query = mysqli_query($conection, "SELECT p.NOMBRE_PERSONAL, p.APELLIDOS_PERSONAL, p.NUMERO_IDENTIDAD_PERSONAL, u.NOMBRE_USUARIO FROM personal p INNER JOIN usuario u ON p.ID_USUARIO_PERSONAL = u.ID_USUARIO WHERE ID_PERSONAL ='$idpersonal' ");

    $result = mysqli_num_rows($query);

    if($result > 0){

        while ($data = mysqli_fetch_array($query)){

            $nombre = $data['NOMBRE_PERSONAL'];
            $apellido = $data['APELLIDOS_PERSONAL'];
            $ident = $data['NUMERO_IDENTIDAD_PERSONAL'];
            $rol = $data['NOMBRE_USUARIO'];
        }
    }  else {
            header('location: usuarios.php');

    }
}
