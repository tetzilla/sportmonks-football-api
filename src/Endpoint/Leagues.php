<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballApiHelper;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class Leagues
 * @package Sportmonks\Football\Endpoint
 */
class Leagues extends FootballClient {
    /**
     * @return stdClass
     * @throws ApiRequestException
     */
    public function all() {
        $url = "leagues";
        return $this->call($url);
    }

    /**
     * @param int $leagueId
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getById(int $leagueId) {
        $url = "leagues/{$leagueId}";
        return $this->call($url);
    }

    /**
     * @return stdClass
     * @throws ApiRequestException
     */
    public function live() {
        $url = "leagues/live";
        return $this->call($url);
    }

    /**
     * @param string $date
     * @return stdClass
     * @throws ApiRequestException
     * @throws InvalidDateFormatException
     */
    public function getByFixtureDate(string $date) {
        $date = FootballApiHelper::verifyDate($date);
        $url = "leagues/fixtures/date/{$date}";
        return $this->call($url);
    }

    /**
     * @param int $countryId
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getByCountryId(int $countryId) {
        $url = "leagues/countries/{$countryId}";
        return $this->call($url);
    }

    /**
     * @param string $searchQuery
     * @return stdClass
     * @throws ApiRequestException
     */
    public function search(string $searchQuery) {
        $url = "leagues/search/{$searchQuery}";
        return $this->call($url);
    }

    /**
     * @param int $teamId
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getByTeamId(int $teamId) {
        $url = "leagues/teams/{$teamId}";
        return $this->call($url);
    }

    /**
     * @param int $teamId
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getCurrentByTeamId(int $teamId) {
        $url = "leagues/teams/{$teamId}/current";
        return $this->call($url);
    }
}
