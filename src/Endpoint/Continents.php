<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class Types
 * @package Sportmonks\Football\Endpoint
 */
class Continents extends FootballClient {

    public $baseUri = 'https://api.sportmonks.com/v3/core/';

    /**
     * @return stdClass
     * @throws ApiRequestException
     */
    public function all() {
        $url = "continents";
        return $this->call($url);
    }

    /**
     * @param int $continentId
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getById(int $continentId) {
        $url = "continents/{$continentId}";
        return $this->call($url);
    }
}
