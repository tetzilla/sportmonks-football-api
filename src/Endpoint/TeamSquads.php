<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class TeamSquads
 * @package Sportmonks\Football\Endpoint
 */
class TeamSquads extends FootballClient {

    /**
     * @param int $teamId
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getByTeamId(int $teamId) {
        $url = "squads/teams/{$teamId}";
        return $this->call($url);
    }

    /**
     * @param int $teamId
     * @param int $seasonId
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getByTeamAndSeasonId(int $teamId, int $seasonId) {
        $url = "squads/seasons/{$seasonId}/teams/{$teamId}";
        return $this->call($url);
    }
}
