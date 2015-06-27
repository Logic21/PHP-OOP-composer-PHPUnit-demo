<?php

namespace App;

use App\Report;

/**
 * ReportBuilder
 *
 * @author Ivan Proskoryakov <volgodark@gmail.com>
 */
class ReportBuilder{

    /**
     * @var array
     */
    protected $lines;

    /**
     * Constructor
     *
     * @param string $filename
     */
    public function __construct($filename){
        $this->lines = file(
            $filename,
            FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES
        );
    }

    /**
     * getReport
     *
     * @return array $report
     */
    public function buildReport(){

        $parser = new Parser();
        $log = array();

        foreach ($this->lines as $k => $line) {

            $entry = $parser->parse($line);
            $timestamp = getdate($entry->stamp);
            $host = $entry->host;
            $date = sprintf(
                "%s/%s/%s",
                $timestamp['mday'],
                $timestamp['mon'],
                $timestamp['year']
            );

            if (isset($log[$date][$host]) === false){
                $log[$date][$host] = 0;
            }
            $log[$date][$host]++ ;
        }
        $report = new Report($log);

        return $report;
    }

}