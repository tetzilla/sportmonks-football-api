<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class Seasons
 * @package Sportmonks\Football\Endpoint
 */
class Seasons extends FootballClient {
    /**
     * @return stdClass
     * @throws ApiRequestException
     */
    public function all() {
        $url = "seasons";
        return $this->call($url);
    }

    /**
     * @param int $seasonId
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getById(int $seasonId) {
        $url = "seasons/{$seasonId}";
        return $this->call($url);
    }

    /**
     * @param int $teamId
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getByTeamId(int $teamId) {
        $url = "seasons/teams/{$teamId}";
        return $this->call($url);
    }

    /**
     * @param string $searchQuery
     * @return stdClass
     * @throws ApiRequestException
     */
    public function search(string $searchQuery) {
        $url = "seasons/search/{$searchQuery}";
        return $this->call($url);
    }
}
