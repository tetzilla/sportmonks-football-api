<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class Topscorers
 * @package Sportmonks\Football\Endpoint
 */
class Topscorers extends FootballClient {

    /**
     * @param int $seasonId
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getBySeasonId(int $seasonId) {
        $url = "topscorers/seasons/{$seasonId}";
        return $this->call($url);
    }

    /**
     * @param int $stageId
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getByStageId(int $stageId) {
        $url = "topscorers/stages/{$stageId}";
        return $this->call($url);
    }
}
