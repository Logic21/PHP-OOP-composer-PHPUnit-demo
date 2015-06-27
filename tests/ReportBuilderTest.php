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
    public function testReportBuilder()
    {
        $filename = realpath(__DIR__ . '/../logs/access.log');

        /** @var ReportBuilder $reportBuilder */
        $reportBuilder = new ReportBuilder($filename);
        /** @var Report $report */
        $report = $reportBuilder->buildReport();

        $this->assertEquals(count($report->getHits()), 16);
        $this->assertEquals($report->getHits()['23/12/2014'], 9);
        $this->assertEquals(count($report->getVisitors()), 16);
        $this->assertEquals($report->getVisitors()['23/12/2014'], 1);
        $this->assertEquals($report->getAverageNumberOfHits(), 7443);
    }
}