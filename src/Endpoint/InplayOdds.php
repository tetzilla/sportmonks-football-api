<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class InplayOdds
 * @package Sportmonks\Football\Endpoint
 */
class InplayOdds extends FootballClient {
    /**
     * @return stdClass
     * @throws ApiRequestException
     */
    public function all() {
        $url = "odds/inplay";
        return $this->call($url);
    }

    /**
     * @param int $fixtureId
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getByFixtureId(int $fixtureId) {
        $url = "odds/inplay/fixtures/{$fixtureId}";
        return $this->call($url);
    }

    /**
     * @param int $fixtureId
     * @param int $bookmakerId
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getByFixtureAndBookmakerId(int $fixtureId, int $bookmakerId) {
        $url = "odds/inplay/fixtures/{$fixtureId}/bookmakers/{$bookmakerId}";
        return $this->call($url);
    }

    /**
     * @param int $fixtureId
     * @param int $marketId
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getByFixtureAndMarketId(int $fixtureId, int $marketId) {
        $url = "odds/inplay/fixtures/{$fixtureId}/markets/{$marketId}";
        return $this->call($url);
    }

    /**
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getLastUpdated() {
        $url = "odds/inplay/latest";
        return $this->call($url);
    }
}
