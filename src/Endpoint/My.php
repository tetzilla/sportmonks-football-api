<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class Types
 * @package Sportmonks\Football\Endpoint
 */
class My extends FootballClient {

    public $baseUri = 'https://api.sportmonks.com/v3/my/';

    /**
     * @return stdClass
     * @throws ApiRequestException
     */
    public function enrichments() {
        $url = "enrichments";
        return $this->call($url);
    }

    /**
     * @return stdClass
     * @throws ApiRequestException
     */
    public function resources() {
        $url = "resources";
        return $this->call($url);
    }

    /**
     * @return stdClass
     * @throws ApiRequestException
     */
    public function leagues() {
        $url = "leagues";
        return $this->call($url);
    }
}
