<?php

require_once __DIR__ . '../../../models/reports/SalesReport.php';

class SalesReportController
{

    private $DataHandler;

    public function __construct()
    {
        $this->DataHandler = new SalesReport();
    }

    public function getReportByDateRange($firstDate, $lastDate)
    {
        $firstDate = new DateTime($firstDate);
        $lastDate = new DateTime($lastDate);

        $where = " date BETWEEN '" . $firstDate->format('Y-m-d') . "' AND '" . $lastDate->format('Y-m-d') . "'";

        $joins = " INNER JOIN customers c ON so.customer_id = c.customer_id";
        $result = $this->DataHandler->getAll($where, $joins);
        return $result;
    }

    public function getReportByCustomer($customerId)
    {
        $where = "so.customer_id = '" . $customerId . "'";
        $joins = " INNER JOIN customers c ON so.customer_id = c.customer_id";
        $result = $this->DataHandler->getAll($where, $joins);
        return $result;
    }

    public function getReportByProduct($productId)
    {
        if (empty($productId)) {
            return [];
        }

        $result = $this->DataHandler->getByProductId($productId);
        return $result;
    }
}
