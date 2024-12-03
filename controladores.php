<?php
require('conexion.php');

$db = new Conexion();
$conexion = $db->getConexion();

echo "<pre>";
print_r($_REQUEST);
echo "</pre>";

$nombre = $_REQUEST['nombre'];
$apellido = $_REQUEST['apellido'];
$correo = $_REQUEST['correo'];
$fecha_nacimiento = $_REQUEST['fecha_nacimiento'];
$id_genero = $_REQUEST['id_genero'];
$id_ciudad = $_REQUEST['id_ciudad'];
$id_leng = $_REQUEST['id_leng'];

/**ingresar registro */
$sql = "INSERT INTO USUARIOS (nombre,apellido,correo,fecha_nacimiento, id_genero,id_ciudad) VALUES
(:nombre, :apellido, :correo, :fecha_nacimiento, :id_genero, :id_ciudad)";





$stm = $conexion -> prepare($sql);

$stm -> bindParam(":nombre" , $nombre);
$stm -> bindParam(":apellido" , $apellido);
$stm -> bindParam(":correo" , $correo);
$stm -> bindParam(":fecha_nacimiento" , $fecha_nacimiento);
$stm -> bindParam(":id_genero" , $id_genero);
$stm -> bindParam(":id_ciudad" , $id_ciudad);

$usuarios = $stm-> execute();/**ejecuta consulta */
/**consulta selecte */
$sql = "SELECT * FROM USUARIOS";
$bandera = $conexion->prepare($sql);
$bandera->execute();
$usuarios = $bandera->fetchAll();
$sql = "SELECT * FROM LENGUAJES";
$bandera = $conexion->prepare($sql);
$bandera->execute();
$sql = "SELECT * FROM  GENEROS";
$bandera = $conexion->prepare($sql);
// $bandera->execute();




echo "<pre>";
print_r($usuarios);
echo "</pre>";
echo "<pre>";
print_r($id_leng);
echo "</pre>";





$id_usuario  = $conexion->lastInsertId();

var_dump($id_usuario);

/**recorrer */

include("tablas.php");




/**redirecionar  eliminar usuario id usuario*/