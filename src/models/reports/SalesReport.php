<?php

require_once __DIR__ . '../../../../core/connection.php';


class SalesReport
{

    private $db;
    private $table = "sales_orders";

    public function __construct()
    {
        $this->db = new Database();
    }


    public function buildWhere($where)
    {
        if (empty($where)) {
            return "";
        }

        return " WHERE " . $where;
    }


    public function getAll($where = '', $joins = '')
    {
        $mainScript =  "SELECT so.code, c.name, so.date, so.currency, so.final_price FROM " . $this->table . " so" . $joins . " WHERE " . $where;
        $result = $this->db->connect()->query($mainScript);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
