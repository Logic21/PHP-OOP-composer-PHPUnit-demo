<?php

namespace App;

use Kassner\LogParser\LogParser;

/**
 * Parser
 *
 * @author Ivan Proskoryakov <volgodark@gmail.com>
 */
class Parser extends LogParser{

    /**
     * Constructor
     */
    public function __construct(){

        // Fixing "OPTIONS" request, it could contain "-" which means zero bytes
        // EX: 127.0.0.1 - - [13/Apr/2015:20:34:55 +0200] "OPTIONS /api/v1/me HTTP/1.1" 200 - "" ""
        $this->patterns['%O'] = '(?P<sentBytes>(\d+|-))';
        $format = '%h %l %u %t "%r" %>s %O "%{Referer}i" \"%{User-Agent}i"';

        parent::__construct($format);
    }

}