<?php
require_once '../../models/sales/SalesStatus.php';

class AccountStatusController
{
    private $DataHandler;

    public function __construct()
    {
        $this->DataHandler = new SalesStatus();
    }

    public function getReportByDateRange($firstDate, $lastDate)
    {
        $firstDate = new DateTime($firstDate);
        $lastDate = new DateTime($lastDate);

        $where = "date BETWEEN '" . $firstDate->format('Y-m-d') . "' AND '" . $lastDate->format('Y-m-d') . "'";
        $joins = " INNER JOIN customers c ON so.customer_id = c.customer_id";
        $result = $this->DataHandler->getAll($where, $joins);

        return $result;
    }

    public function getSumByDateRange($firstDate, $lastDate)
    {
        $firstDate = new DateTime($firstDate);
        $lastDate = new DateTime($lastDate);

        $where = "date BETWEEN '" . $firstDate->format('Y-m-d') . "' AND '" . $lastDate->format('Y-m-d') . "'";
        $joins = " INNER JOIN customers c ON so.customer_id = c.customer_id";
        $totalSum = $this->DataHandler->getSum($where, $joins);

        return $totalSum;
    }
}
