<?php

namespace Sportmonks\Football\Endpoint;

use Sportmonks\Football\Exception\ApiRequestException;
use Sportmonks\Football\FootballApiHelper;
use Sportmonks\Football\FootballClient;
use stdClass;

/**
 * Class Transfers
 * @package Sportmonks\Football\Endpoint
 */
class Transfers extends FootballClient {

	/**
	 * @return stdClass
	 * @throws ApiRequestException
	 */
	public function all() {
		$url = "transfers";
		return $this->call($url);
	}

	/**
	 * @param int $transferId
	 * @return stdClass
	 * @throws ApiRequestException
	 */
	public function getById(int $transferId) {
		$url = "transfers/{$transferId}";
		return $this->call($url);
	}

	/**
	 * @return stdClass
	 * @throws ApiRequestException
	 */
	public function latest() {
		$url = "transfers/latest";
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
		$dateTo   = FootballApiHelper::verifyDate($dateTo);
		$url      = "transfers/between/{$dateFrom}/{$dateTo}";
		return $this->call($url);
	}

	/**
	 * @param int $teamId
	 * @return stdClass
	 * @throws ApiRequestException
	 */
	public function getByTeamId(int $teamId) {
		$url = "transfers/teams/{$teamId}";
		return $this->call($url);
	}

	/**
	 * @param int $playerId
	 * @return stdClass
	 * @throws ApiRequestException
	 */
	public function getByPlayerId(int $playerId) {
		$url = "transfers/players/{$playerId}";
		return $this->call($url);
	}
}
