
<?php


require('conexion.php');        

$db = "";
$conexion = "";

$db = new Conexion();
$conexion = $db->getConexion();



$sql="SELECT * FROM USUARIOS WHERE id_user = :id";
$stm=$conexion->prepare($sql);
$stm->bindParam(":id",$id);
$stm -> execute();
$USUARIOS = $stm->fetch();

$sql="SELECT * FROM USUARIOS";
$bandera=$conexion->prepare($sql);
$bandera->execute();
$USUARIOS=$bandera->fetchAll();
$sql2 = "SELECT * FROM ciudades"; // consulta para las ciudades
$sql_generos = "SELECT * FROM generos";
$sql_lenguajes = "SELECT * FROM LENGUAJES"; // consulta para los generos
// preparar los datos para las ciudades
// $sql="SELECT *FROM "
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
<div class="lista">
<form action="tablas.php" method="post">
    <fieldset class="fondo" >
        <legend class="title_card">Conexion PHP a MySQL</legend>
        <div>
            <label class="fondos"  for="nombre">Nombres</label>
            <input class="fondo__imput" type="text" id="nombre" name="nombre" placeholder="Nombre" required>
        </div>
        <div>
            <label class="fondos" for="apellido">Apellido</label>
            <input class="fondo__imput" type="text" id="apellido" name="apellido" placeholder="Apellido" required>
        </div>
        <div>
            <label class="fondos" for="correo">Correo</label>
            <input  class="fondo__imput"type="text" id="correo" name="correo" placeholder="Correo" required>
        </div>
        <div>
            <label  class="fondos"for="fecha_nacimiento">Fecha Nacimiento</label>
            <input class="fondo__imput" type="date" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Fecha" required>
        </div>

        <div>
            <label class="fondos" for="id_ciudad">Ciudades</label>
            <select name="id_ciudad" id="id_ciudad" >
                <?php
                
                foreach ($CIUDADES as $key => $value) {
                ?>
                    <option id="<?= $value['id_ciudad'] ?>" value="<?= $value['id_ciudad'] ?>">
                        <?= $value['nom_ciudad'] ?>
                    </option>
                <?php
                }
                ?>
            </select>
        </div>

        <div>
            
            <?php
                echo "<br>";
                foreach ($generos as $key => $value) {
            ?>
                <div>
                    <label for="GENEROS<?= $value['id_genero'] ?>" ><?= $value['nom_genero'] ?>
                        <input type="radio" name="id_genero" value="<?= $value['id_genero'] ?>" id="GENEROS<?= $value['id_genero'] ?>">
                    </label>
                </div>
            <?php
            }
            ?>
        </div>

        <div>
            <?php
                echo "<br>";
            foreach ($LENGUAJES as $key => $value) {
            ?>
                <div>
                    <label for="LENGUAJES<?= $value['id_leng'] ?>"><?= $value['nom_lenguaje'] ?>
                        <input type="checkbox" name="id_leng" value="<?= $value['id_leng'] ?>" id="LENGUAJES<?= $value['id_leng'] ?>">
                    </label>
                </div>
            <?php
            }
            ?>
        </div>
        
            <br>
        <button class="boton"  type="submit">Guardar Datos</button>
                
    </fieldset>
</form>
</div>