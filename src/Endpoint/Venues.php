<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class Venues
 * @package Sportmonks\Football\Endpoint
 */
class Venues extends FootballClient {

    /**
     * @return stdClass
     * @throws ApiRequestException
     */
    public function all() {
        $url = "venues";
        return $this->call($url);
    }

    /**
     * @param int $venueId
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getById(int $venueId) {
        $url = "venues/{$venueId}";
        return $this->call($url);
    }
}
