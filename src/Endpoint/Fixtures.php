<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballApiHelper;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class Fixtures
 * @package Sportmonks\Football\Endpoint
 */
class Fixtures extends FootballClient {
    /**
     * @return stdClass
     * @throws ApiRequestException
     */
    public function all() {
        $url = "fixtures";
        return $this->call($url);
    }

    /**
     * @param int $fixtureId
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getById(int $fixtureId) {
        $url = "fixtures/{$fixtureId}";
        return $this->call($url);
    }

    /**
     * @param array $fixtureIds
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getByMultipleIds(array $fixtureIds) {
        $fixtureIds = implode(",", array_map("trim", array_filter($fixtureIds)));
        $url = "fixtures/multi/{$fixtureIds}";
        return $this->call($url);
    }

    /**
     * @param string $date
     * @return stdClass
     * @throws ApiRequestException
     * @throws InvalidDateFormatException
     */
    public function getByDate(string $date) {
        $date = FootballApiHelper::verifyDate($date);
        $url = "fixtures/date/{$date}";
        return $this->call($url);
    }

    /**
     * @param string $dateFrom
     * @param string $dateTo
     * @return stdClass
     * @throws ApiRequestException
     * @throws InvalidDateFormatException
     */
    public function getByDateRange(string $dateFrom, string $dateTo) {
        $dateFrom = FootballApiHelper::verifyDate($dateFrom);
        $dateTo = FootballApiHelper::verifyDate($dateTo);
        $url = "fixtures/between/{$dateFrom}/{$dateTo}";
        return $this->call($url);
    }


    /**
     * @param string $dateFrom
     * @param string $dateTo
     * @param int $teamId
     * @return stdClass
     * @throws ApiRequestException
     * @throws InvalidDateFormatException
     */
    public function getByDateRangeForTeam(string $dateFrom, string $dateTo, int $teamId) {
        $dateFrom = FootballApiHelper::verifyDate($dateFrom);
        $dateTo = FootballApiHelper::verifyDate($dateTo);
        $url = "fixtures/between/{$dateFrom}/{$dateTo}/{$teamId}";
        return $this->call($url);
    }

    /**
     * @param int $teamId1
     * @param int $teamId2
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getHeadToHead(int $teamId1, int $teamId2) {
        $url = "fixtures/head-to-head/{$teamId1}/{$teamId2}";
        return $this->call($url);
    }

    /**
     * @param string $searchQuery
     * @return stdClass
     * @throws ApiRequestException
     */
    public function search(string $searchQuery) {
        $url = "fixtures/search/{$searchQuery}";
        return $this->call($url);
    }

    /**
     * @param int $marketId
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getUpcommingByMarketId(int $marketId) {
        $url = "fixtures/upcoming/markets/{$marketId}";
        return $this->call($url);
    }

    /**
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getLastUpdated() {
        $url = "fixtures/updates";
        return $this->call($url);
    }
}
