<?php

class Database {
    // Propiedades de la base de datos
    private $host = "localhost";
    private $db_name = "facturas";  // Nombre de la base de datos
    private $username = "root";  // Tu nombre de usuario de la base de datos
    private $password = "";  // Tu contraseña de la base de datos
    public $conn;

    // Método para obtener la conexión
    public function getConnection() {
        $this->conn = null;

        try {
            // Crear una nueva conexión PDO
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            // Configurar la codificación de caracteres a UTF-8
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }

        return $this->conn;
    }
}

?>