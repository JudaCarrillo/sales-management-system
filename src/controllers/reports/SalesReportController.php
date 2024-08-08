<?php

require_once __DIR__ . '../../../models/reports/SalesReport.php';

class SalesReportController
{

    private $SalesOrderDataHandler;
    private $SalesOrderDetailsDataHandler;
    private $CustomerDataHandler;
    private $ProductDataHandler;

    private $DataHandler;

    public function __construct()
    {
        // $this->SalesOrderDataHandler  = new SalesOrders();
        // $this->SalesOrderDetailsDataHandler  = new SalesDetails();
        $this->DataHandler = new SalesReport();
    }

    public function getReportByDateRange($firstDate, $lastDate)
    {
        $firstDate = new DateTime($firstDate);
        $lastDate = new DateTime($lastDate);

        $where = "date BETWEEN '" . $firstDate->format('Y-m-d') . "' AND '" . $lastDate->format('Y-m-d') . "'";
        $result = $this->DataHandler->getAll($where);
        return $result;
    }

    public function getReportByClient($clientId)
    {
    }

    public function getReportByProduct($productId)
    {
    }
}
