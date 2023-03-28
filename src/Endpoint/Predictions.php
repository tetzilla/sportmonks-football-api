<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class Predictions
 * @package Sportmonks\Football\Endpoint
 */
class Predictions extends FootballClient {
    /**
     * @return stdClass
     * @throws ApiRequestException
     */
    public function all() {
        $url = "predictions/probabilities";
        return $this->call($url);
    }

    /**
     * @param int $leagueId
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getPredictabilityByLeagueId(int $leagueId) {
        $url = "predictions/probabilities/leagues/{$leagueId}";
        return $this->call($url);
    }

    /**
     * @param int $fixtureId
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getPredictabilityByFixtureId(int $fixtureId) {
        $url = "predictions/probabilities/fixtures/{$fixtureId}";
        return $this->call($url);
    }

    /**
     * @return stdClass
     * @throws ApiRequestException
     */
    public function valueBets() {
        $url = "predictions/value-bets/";
        return $this->call($url);
    }
}
