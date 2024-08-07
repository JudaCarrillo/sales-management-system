<?php

require_once __DIR__ . '/../vendor/autoload.php'; // Ruta correcta al autoload.php

use Dotenv\Dotenv;

class Database
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $port;
    private $connection;

    public function __construct()
    {
        $this->loadEnv(); // Llama al método para cargar las variables de entorno
        // Inicializa las propiedades utilizando las variables de entorno
        $this->servername = $_ENV['DB_HOST'];
        $this->username = $_ENV['DB_USERNAME'];
        $this->password = $_ENV['DB_PASSWORD'];
        $this->dbname = $_ENV['DB_NAME'];
        $this->port = $_ENV['DB_PORT'];
    }

    // Método para cargar las variables de entorno
    private function loadEnv()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../'); // Ruta ajustada a la raíz del proyecto
        $dotenv->load();
    }

    public function connect()
    {
        // Crear conexión usando mysqli
        $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->dbname, $this->port);

        // Verificar si hubo errores en la conexión
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        // Establecer el conjunto de caracteres de la conexión
        $this->connection->set_charset("utf8");

        return $this->connection;
    }

    public function close()
    {
        if ($this->connection) {
            $this->connection->close();
        }
    }
}
