<?php
// core/Database.php

class Database {
    private $servername = $_ENV['DB_HOST'];
    private $username = $_ENV['DB_USERNAME'];
    private $password = $_ENV['DB_PASSWORD'];
    private $dbname = $_ENV['DB_NAME'];
    private $connection;

    public function connect() {
        $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        $this->connection->query("SET NAMES 'utf8'");
        return $this->connection;
    }

    public function close() {
        if ($this->connection) {
            $this->connection->close();
        }
    }
}