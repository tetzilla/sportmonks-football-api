<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class Types
 * @package Sportmonks\Football\Endpoint
 */
class Regions extends FootballClient {

    public $baseUri = 'https://api.sportmonks.com/v3/core/';

    /**
     * @return stdClass
     * @throws ApiRequestException
     */
    public function all() {
        $url = "regions";
        return $this->call($url);
    }

    /**
     * @param int $regionId
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getById(int $regionId) {
        $url = "regions/{$regionId}";
        return $this->call($url);
    }

    /**
     * @param string $searchQuery
     * @return stdClass
     * @throws ApiRequestException
     */
    public function search($searchQuery) {
        $url = "regions/search/{$searchQuery}";
        return $this->call($url);
    }
}
