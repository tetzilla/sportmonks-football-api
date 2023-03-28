<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class States
 * @package Sportmonks\Football\Endpoint
 */
class States extends FootballClient {
    /**
     * @return stdClass
     * @throws ApiRequestException
     */
    public function all() {
        $url = "states";
        return $this->call($url);
    }

    /**
     * @param int $stageId
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getById(int $stateId) {
        $url = "states/{$stateId}";
        return $this->call($url);
    }
}
