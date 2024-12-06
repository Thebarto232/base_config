<?php
require("conexion.php");
$db =new conexion();
$conexion=$db->getConexion();

$sql="SELECT * FROM USUARIOS";
$bandera=$conexion->prepare($sql);
$bandera->execute();
$USUARIOS=$bandera->fetchAll();

$sql2 = "SELECT * FROM ciudades"; // consulta para las ciudades
$sql_generos = "SELECT * FROM generos";
$sql_lenguajes = "SELECT * FROM LENGUAJES"; // consulta para los generos
// preparar los datos para las ciudades
// $sql="SELECT *FROM ";



// preparar los datos para los generos
$bandera_generos = $conexion->prepare($sql_generos);
$bandera_generos->execute();
$generos = $bandera_generos->fetchAll();
// preparar para lenguajes
$bandera_lenguajes = $conexion -> prepare($sql_lenguajes);
$bandera_lenguajes -> execute();
$LENGUAJES = $bandera_lenguajes ->fetchAll();

$bandera_lenguajes = $conexion -> prepare($sql2);
$bandera_lenguajes -> execute();
$CIUDADES = $bandera_lenguajes ->fetchAll();
?>


<link rel="stylesheet" href="styles.css">
<table class="fondo__tabla" border ="2">
      <tr>
        <td>nombre</td>
        <td>apellido</td>
        <td>correo</td>
        <td>fecha_nacimiento</td>
        <td>genero</td>
        <td>ciudad</td>

        <?php foreach ($USUARIOS as $key => $value){
        $id = $value['id_user'];
          $sql_lenguajes="SELECT id_leng FROM lenguajes_usuarios  WHERE id_user=:id_user";
          $sql_lenguajes=$conexion->prepare($sql_lenguajes);
          $sql_lenguajes->execute(['id_user'=>$id]);
          $lenguajes_usuario=$sql_lenguajes->fetchAll();
        ?>
        <tr>
            <td><?= $value["nombre"]; ?></td>
            <td><?= $value["apellido"]; ?></td>
            <td><?= $value["correo"]; ?></td>
            <td><?= $value["fecha_nacimiento"]; ?></td>
            <td><?= $value["id_genero"]; ?></td>
            <td><?= $value["id_ciudad"]; ?></td>
            <td>
              <?php
              foreach ($lenguajes_usuario as $key => $values) {
                $values['id_leng'];
              }
              ?>
            </td>
             <td>
             <a class="title" href="editar.php?id=<?=$value['id_user']?>">editar</a>

             </td>
             <td>
             <a class="title" href="eliminar.php?id=<?=$value['id_user']?>">eliminar</a>   
             </td>
          <br>
     
        
        </tr>
        <?php
        }
        ?>
      </tr>    
</table>


