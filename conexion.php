<?php
/** Conexion a la base de datos */

class Conexion {
    private $conexion;
    private $host = "localhost";
    private $db = "adso_2894667";
    private $usuario = "johan_2894667";
    private $contraseña = "#Aprendiz2024";

    public function __construct() { 
        try {
            $opciones = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ];
            
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=utf8mb4";
            $this->conexion = new PDO($dsn, $this->usuario, $this->contraseña, $opciones);
            $this->conexion->exec("SET CHARACTER SET utf8");
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    function getConexion() {
        return $this->conexion;
    }

    function cerrarConexion() {
        $this->conexion = null;
    }
}
?>
