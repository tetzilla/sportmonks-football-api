<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class Stages
 * @package Sportmonks\Football\Endpoint
 */
class Stages extends FootballClient {
    /**
     * @return stdClass
     * @throws ApiRequestException
     */
    public function all() {
        $url = "stages";
        return $this->call($url);
    }

    /**
     * @param int $stageId
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getById(int $stageId) {
        $url = "stages/{$stageId}";
        return $this->call($url);
    }

    /**
     * @param int $seasonId
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getBySeasonId(int $seasonId) {
        $url = "stages/seasons/{$seasonId}";
        return $this->call($url);
    }

    /**
     * @param string $searchQuery
     * @return stdClass
     * @throws ApiRequestException
     */
    public function search(string $searchQuery) {
        $url = "stages/search/{$searchQuery}";
        return $this->call($url);
    }
}
