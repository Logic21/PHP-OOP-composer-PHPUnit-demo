<?php
/**
 * ua-parser
 *
 * Copyright (c) 2011-2012 Dave Olsen, http://dmolsen.com
 *
 * Released under the MIT license
 */
namespace App;

use App\ReportBuilder;
use App\Report;
use PHPUnit_Framework_TestCase as AbstractTestCase;

class ReportBuilderTest extends AbstractTestCase
{

    public function testReportBuilderAccessLogOne()
    {
        $filename = realpath(__DIR__ . '/../logs/accessOne.log');

        /** @var ReportBuilder $reportBuilder */
        $reportBuilder = new ReportBuilder($filename);
        /** @var Report $report */
        $report = $reportBuilder->buildReport();

        $this->assertEquals(count($report->getHits()), 16);
        $this->assertEquals(count($report->getVisitors()), 16);
        $this->assertEquals($report->getAverageNumberOfHits(), 7443);

    }
    
    public function testReportBuilderAccessLogTwo()
    {
        $filename = realpath(__DIR__ . '/../logs/accessTwo.log');

        /** @var ReportBuilder $reportBuilder */
        $reportBuilder = new ReportBuilder($filename);
        /** @var Report $report */
        $report = $reportBuilder->buildReport();

        $this->assertEquals(count($report->getHits()), 6);
        $this->assertEquals(count($report->getVisitors()), 6);
        $this->assertEquals($report->getAverageNumberOfHits(), 2);

    }
}