<?php

require('conexion.php');
$db =new conexion();
$conexion=$db->getConexion();


$id=$_GET['id'];

$sql="DELETE FROM  lenguajes_usuarios WHERE id_user=:id";
$stm=$conexion->prepare($sql);
$stm->bindParam(":id",$id);
$stm -> execute();
$USUARIOS = $stm->fetch();

$sql="DELETE FROM  USUARIOS WHERE id_user=:id";
$stm=$conexion->prepare($sql);
$stm->bindParam(":id",$id);
$stm -> execute();
$USUARIOS = $stm->fetch();

header ("location: tablas.php");