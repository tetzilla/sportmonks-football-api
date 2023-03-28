<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class Players
 * @package Sportmonks\Football\Endpoint
 */
class Players extends FootballClient {
    /**
     * @return stdClass
     * @throws ApiRequestException
     */
    public function all() {
        $url = "players";
        return $this->call($url);
    }

    /**
     * @param int $playerId
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getById(int $playerId) {
        $url = "players/{$playerId}";
        return $this->call($url);
    }

    /**
     * @param int $countryId
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getByCountryId(int $countryId) {
        $url = "players/countries/{$countryId}";
        return $this->call($url);
    }

    /**
     * @param string $searchQuery
     * @return stdClass
     * @throws ApiRequestException
     */
    public function search(string $searchQuery) {
        $url = "players/search/{$searchQuery}";
        return $this->call($url);
    }

    /**
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getLastUpdated() {
        $url = "players/latest";
        return $this->call($url);
    }
}
