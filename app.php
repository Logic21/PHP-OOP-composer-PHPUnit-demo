<?php

require_once 'vendor/autoload.php';

use App\ReportBuilder;
use App\Report;

$filename = 'logs/access.log';

/** @var ReportBuilder $reportBuilder */
$reportBuilder = new ReportBuilder($filename);
$report = $reportBuilder->buildReport();

/** @var Report $report */
var_dump($report->getHits());
var_dump($report->getVisitors());
var_dump($report->getAverageNumberOfHits());