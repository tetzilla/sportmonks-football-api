<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class Types
 * @package Sportmonks\Football\Endpoint
 */
class Filters extends FootballClient {

    public $baseUri = 'https://api.sportmonks.com/v3/my/';

    /**
     * @return stdClass
     * @throws ApiRequestException
     */
    public function allEntity() {
        $url = "filters/entity";
        return $this->call($url);
    }
}
