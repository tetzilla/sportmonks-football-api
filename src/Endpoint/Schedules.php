<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class Schedules
 * @package Sportmonks\Football\Endpoint
 */
class Schedules extends FootballClient {

    /**
     * @param int $seasonId
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getBySeasonId(int $seasonId) {
        $url = "schedules/seasons/{$seasonId}";
        return $this->call($url);
    }

    /**
     * @param int $teamId
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getByTeamId(int $teamId) {
        $url = "schedules/teams/{$teamId}";
        return $this->call($url);
    }


    /**
     * @param int $teamId
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getBySeasonAndTeamId(int $seasonId, int $teamId) {
        $url = "schedules/seasons/{$seasonId}teams/{$teamId}";
        return $this->call($url);
    }
}
