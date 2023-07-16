<?php

class DBconexion {
    private $host = "localhost";
    private $usuario = "root";
    private $clave = "";
    private $db = "Almancenador";
    public $conexion;

    public function __construct() {
        $this->conexion = new mysqli($this->host, $this->usuario, $this->clave, $this->db) or die(mysqli_error());
        $this->conexion->set_charset("utf8");

       // echo "¡Conexión establecida correctamente!";
    }

    public function insert($tabla, $datos) {
        $resultado = $this->conexion->query("INSERT INTO $tabla VALUES(null, $datos)") or die($this->conexion->error);
        if ($resultado)
            return true;
        return false;
    }

    public function search($tabla, $condicion) {
        $resultado = $this->conexion->query("SELECT * FROM $tabla WHERE $condicion") or die($this->conexion->error);
        if ($resultado)
            return $resultado->fetch_all(MYSQLI_ASSOC);
        return false;
    }
}

?>
