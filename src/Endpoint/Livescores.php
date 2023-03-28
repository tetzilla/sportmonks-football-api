<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class Livescores
 * @package Sportmonks\Football\Endpoint
 */
class Livescores extends FootballClient {

    /**
     * @return stdClass
     * @throws ApiRequestException
     */
    public function all() {
        $url = "livescores";
        return $this->call($url);
    }

    /**
     * @return stdClass
     * @throws ApiRequestException
     */
    public function inplay() {
        $url = "livescores/inplay";
        return $this->call($url);
    }

    /**
     * @return stdClass
     * @throws ApiRequestException
     */
    public function latest() {
        $url = "livescores/latest";
        return $this->call($url);
    }
}
