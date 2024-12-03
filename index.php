<?php


require('conexion.php');

$db = "";
$conexion = "";

$db = new Conexion();
$conexion = $db->getConexion();



$id=$_GET['id'];
$sql="SELECT * FROM USUARIOS WHERE id_user = :id";
$stm=$conexion->prepare($sql);
$stm->bindParam(":id",$id);
$stm -> execute();
$USUARIOS = $stm->fetch();

$id=$_GET['id'];
$sql="SELECT * FROM generos WHERE id_genero = :id";
$stm=$conexion->prepare($sql);
$stm->bindParam(":id",$id);
$stm -> execute();
$generos = $stm->fetch();

$id=$_GET['id'];
$sql="SELECT * FROM CIUDADES WHERE id_ciudad = :id";
$stm=$conexion->prepare($sql);
$stm->bindParam(":id",$id);
$stm -> execute();
$CIUDADES = $stm->fetch();

$id=$_GET['id'];
$sql="SELECT * FROM LENGUAJES WHERE id_leng = :id";
$stm=$conexion->prepare($sql);
$stm->bindParam(":id",$id);
$stm -> execute();
$LENGUAJES= $stm->fetch();


?>
<form action="controladores.php" method="post">
    <fieldset>
        <legend>Conexion PHP a MySQL</legend>
        <div>
            <label for="nombre">Nombres</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>
        </div>
        <div>
            <label for="apellido">Apellido</label>
            <input type="text" id="apellido" name="apellido" placeholder="Apellido" required>
        </div>
        <div>
            <label for="correo">Correo</label>
            <input type="text" id="correo" name="correo" placeholder="Correo" required>
        </div>
        <div>
            <label for="fecha_nacimiento">Fecha Nacimiento</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Fecha" required>
        </div>

        <div>
            <label for="id_ciudad">Ciudades</label>
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
        <button type="submit">Guardar Datos</button>
                
    </fieldset>
</form>

