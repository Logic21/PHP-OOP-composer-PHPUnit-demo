<?php

namespace App;

/**
 * Report
 *
 * @author Ivan Proskoryakov <volgodark@gmail.com>
 */
class Report{

    /**
     * @var array
     */
    protected $log = array();

    /**
     * Constructor
     *
     * @param array $log
     */
    public function __construct(array $log){
        $this->log = $log;
    }

    /**
     * getHits
     *
     * @return array $hits
     */
    public function getHits(){
        $hits = array();

        foreach ($this->log as $date => $visitors) {
            $hits[$date] = 0;

            foreach ($visitors as $ip => $hitsNumber ){
                $hits[$date] += $hitsNumber;
            };
        }

        return $hits;
    }

    /**
     * getVisitors
     *
     * @return array $hits
     */
    public function getVisitors(){
        $visitors = array();

        foreach ($this->log as $date => $ips) {
            $visitors[$date] = 0;

            foreach ($ips as $ip => $hitsNumber ){
                $visitors[$date]++;
            };
        }

        return $visitors;
    }

    /**
     * getAverageNumberOfHits
     *
     * @return int $average
     */
    public function getAverageNumberOfHits(){
        $uniqVisitors = array();
        $totalHits = 0;

        foreach ($this->log as $date => $ips) {
            $visitors[$date] = 0;

            foreach ($ips as $ip => $hitsNumber ){

                if(in_array($ip, $uniqVisitors) === false) {
                    array_push($uniqVisitors, $ip);
                }
                $totalHits += $hitsNumber;
            };
        }
        $average = $totalHits / count($uniqVisitors);

        return $average;
    }
}