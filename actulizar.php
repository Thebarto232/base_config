<?php
require('conexion.php');
$db =new conexion();
$conexion=$db->getConexion();
$id=$_POST['id'];
$nombre = $_REQUEST['nombre'];
$apellido = $_REQUEST['apellido'];
$correo = $_REQUEST['correo'];
$fecha_nacimiento = $_REQUEST['fecha_nacimiento'];
// $id_genero = $_REQUEST['id_genero'];
// $id_ciudad = $_REQUEST['id_ciudad'];
// $id_leng = $_REQUEST['id_leng'];

// $sql="UPDATE USUARIOS SET nombre=:nombre,apellido=:apellido,correo=:correo,fecha_nacimiento=:fecha_nacimiento,id_genero=:id_genero=:id_ciudad,id_leng=:id_leng";
$sql="UPDATE USUARIOS SET nombre=:nombre,apellido=:apellido,correo=:correo,fecha_nacimiento=:fecha_nacimiento WHERE id_user=:id_user";
$stm=$conexion->prepare(($sql));
$stm->bindParam(":nombre",$nombre);
$stm->bindParam(":apellido",$apellido);
$stm->bindParam(":correo",$correo);
$stm->bindParam(":fecha_nacimiento",$fecha_nacimiento);

$stm->bindParam(":id_user",$id);

$stm->execute();


$sql="UPDATE LENGUAJES SET nombre=:nombre,apellido=:apellido,correo=:correo,fecha_nacimiento=:fecha_nacimiento WHERE id_leng=:id_leng";
$stm=$conexion->prepare(($sql));
$stm->bindParam(":nombre",$nombre);
$stm->bindParam(":apellido",$apellido);
$stm->bindParam(":correo",$correo);
$stm->bindParam(":fecha_nacimiento",$fecha_nacimiento);

$stm->bindParam(":id_user",$id);

$stm->execute();