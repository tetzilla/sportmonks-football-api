<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class Coaches
 * @package Sportmonks\Football\Endpoint
 */
class Coaches extends FootballClient {
    /**
     * @return stdClass
     * @throws ApiRequestException
     */
    public function all() {
        $url = "coaches";
        return $this->call($url);
    }

    /**
     * @param int $coachId
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getById(int $coachId) {
        $url = "coaches/{$coachId}";
        return $this->call($url);
    }

    /**
     * @param int $countryId
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getByCountryId(int $countryId) {
        $url = "coaches/countries/{$countryId}";
        return $this->call($url);
    }

    /**
     * @param string $searchQuery
     * @return stdClass
     * @throws ApiRequestException
     */
    public function search(string $searchQuery) {
        $url = "coaches/search/{$searchQuery}";
        return $this->call($url);
    }

    /**
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getLastUpdated() {
        $url = "coaches/latest";
        return $this->call($url);
    }
}
