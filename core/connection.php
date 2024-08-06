<?php
// core/Database.php

class Database {
    public static function connect() {
        $servername = $_ENV['DB_HOST'];
        $username = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASSWORD'];
        $dbname = $_ENV['DB_NAME'];
        $db = new mysqli($servername, $username, $password, $dbname);
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}