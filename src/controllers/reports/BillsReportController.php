<?php

require_once __DIR__ . '/../../models/sales/Bills.php';

class BillsReportController
{

    private $db;

    public function __construct()
    {
        $this->db = new Bills();
    }

    public function getReportByDateRange($firstDate, $lastDate)
    {
        $firstDate = new DateTime($firstDate);
        $lastDate = new DateTime($lastDate);

        $result = $this->db->getReportByDateRange($firstDate, $lastDate);
        return $result;
    }
}
