<?php
// core/Database.php
class Database {
    public static function connect() {
        $db = new mysqli('roundhouse.proxy.rlwy.net', 'root', 'lHlEiCuwSJpDTgHauRVvkxiXgJuKpUbF', 'railway');
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}
