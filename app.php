<?php

require_once 'vendor/autoload.php';

use App\ReportBuilder;
use App\Report;

if (isset($_FILES['log']) === false) {
    throw new Exception('Log file was not sent, use "upload.html" file');
}

$filename = $_FILES['log']['tmp_name'];
/** @var ReportBuilder $reportBuilder */
$reportBuilder = new ReportBuilder($filename);
/** @var Report $report */
$report = $reportBuilder->buildReport();

// KISS principle in action :)
echo " Average for all period:<pre>";
print_r($report->getAverageNumberOfHits());
echo "</pre>";

echo " Hits:<pre>";
print_r($report->getHits());
echo "</pre>";

echo " Visitors:<pre>";
print_r($report->getVisitors());
echo "</pre>";
