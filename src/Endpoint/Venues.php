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

    /**
     * @param int $seasonId
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getBySeasonId(int $seasonId) {
        $url = "venues/seasons/{$seasonId}";
        return $this->call($url);
    }

    /**
     * @param string $searchQuery
     * @return stdClass
     * @throws ApiRequestException
     */
    public function search(string $searchQuery) {
        $url = "venues/search/{$searchQuery}";
        return $this->call($url);
    }
}
