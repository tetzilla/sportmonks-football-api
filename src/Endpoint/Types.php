<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballApiHelper;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class Types
 * @package Sportmonks\Football\Endpoint
 */
class Types extends FootballClient {

    /**
     * @return stdClass
     * @throws ApiRequestException
     */
    public function all() {
        $url = "types";
        return $this->call($url);
    }

    /**
     * @param int $typeId
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getById(int $typeId) {
        $url = "types/{$typeId}";
        return $this->call($url);
    }
}
