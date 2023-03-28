<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class Referees
 * @package Sportmonks\Football\Endpoint
 */
class Referees extends FootballClient {
    /**
     * @return stdClass
     * @throws ApiRequestException
     */
    public function all() {
        $url = "referees";
        return $this->call($url);
    }

    /**
     * @param int $refereeId
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getById(int $refereeId) {
        $url = "referees/{$refereeId}";
        return $this->call($url);
    }

    /**
     * @param int $countryId
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getByCountryId(int $countryId) {
        $url = "referees/countries/{$countryId}";
        return $this->call($url);
    }

    /**
     * @param int $seasonId
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getBySeasonId(int $seasonId) {
        $url = "referees/seasons/{$seasonId}";
        return $this->call($url);
    }
}
