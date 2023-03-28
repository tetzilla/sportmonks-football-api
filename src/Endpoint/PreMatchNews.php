<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class PreMatchNews
 * @package Sportmonks\Football\Endpoint
 */
class PreMatchNews extends FootballClient {
    /**
     * @return stdClass
     * @throws ApiRequestException
     */
    public function all() {
        $url = "news/pre-match";
        return $this->call($url);
    }

    /**
     * @param int $seasonId
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getById(int $seasonId) {
        $url = "news/pre-match/seasons/{$seasonId}";
        return $this->call($url);
    }

    /**
     * @return stdClass
     * @throws ApiRequestException
     */
    public function upcommingFixtures() {
        $url = "news/pre-match/upcomming";
        return $this->call($url);
    }
}
