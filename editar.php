<?php
require('conexion.php');
$db =new conexion();
$conexion=$db->getConexion();

$id=$_GET['id'];
$sql="SELECT * FROM USUARIOS WHERE id_user = :id";
$stm=$conexion->prepare($sql);
$stm->bindParam(":id",$id);
$stm -> execute();
$USUARIOS = $stm->fetch();


?>

<form action="actulizar.php" method="POST">
    
<div>
    <input type="hidden" name="id" value="<?=$id?>">
    <label for="nombre">Nombres</label>
    <input type="text" id="nombre" name="nombre" value="<?=$USUARIOS['nombre']?>">
    </div>
    <div>
    <label for="apellido">Apellido</label>
    <input type="text" id="apellido" name="apellido" value="<?=$USUARIOS['apellido']?>">
    </div>
    <div>
    <label for="correo">Correo</label>
    <input type="text" id="correo" name="correo" value="<?=$USUARIOS['correo']?>">
    </div>
    <div>
    <label for="fecha_nacimiento">Fecha Nacimiento</label>
    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"value="<?=$USUARIOS['fecha_nacimiento']?>">
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
</div>
    <button>actulizacion</button>

    
</form>

