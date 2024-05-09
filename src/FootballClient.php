<?php

namespace Sportmonks\Football;

use InvalidArgumentException;
use Sportmonks\Football\Exception\ApiRequestException;
use stdClass;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * Class FootballClient
 * @package Sportmonks\Football
 */
class FootballClient {

	public $baseUri = 'https://api.sportmonks.com/v3/football/';

	private $client;
	private $query = array();

	/**
	 * FootballClient constructor.
	 */
	public function __construct() {
		// Set API Key
		$this->query['api_token'] = $_ENV['SPORTMONKS_API_TOKEN'];

		// Validate API Key
		if (empty($this->query['api_token'])) {
			throw new InvalidArgumentException('Invalid API Key Provided');
		}

		// Set Timezone
		if (isset($_ENV['SPORTMONKS_TIMEZONE'])) {
			$this->query['timezone'] = $_ENV['SPORTMONKS_TIMEZONE'];
		}

		// Create Client
		$this->client = HttpClient::create(['base_uri' => $this->baseUri]);
	}

	/**
	 * @param string $url
	 * @return stdClass
	 * @throws ApiRequestException
	 */
	protected function call(string $url) {
		try {
			$response = $this->client->request('GET', $url, ['query' => $this->query])->getContent();
			return json_decode($response);
		} catch (TransportExceptionInterface $e) {
			throw new ApiRequestException($e->getMessage(), $e->getCode());
		} catch (RedirectionExceptionInterface $e) {
			throw new ApiRequestException($e->getMessage(), $e->getCode());
		} catch (ClientExceptionInterface $e) {
			throw new ApiRequestException($e->getMessage(), $e->getCode());
		} catch (ServerExceptionInterface $e) {
			throw new ApiRequestException($e->getMessage(), $e->getCode());
		}
	}

	/**
	 * @param array $includes
	 * @return $this
	 */
	public function setIncludes(array $includes) {
		// Trim & Join Array of Includes
		$this->query['include'] = implode(";", array_map("trim", array_filter($includes)));
		return $this;
	}

	/**
	 * @param array $includes
	 * @return $this
	 */
	public function setFilters(array $filters) {
		// prepare filter
		$filter = [];
		foreach ($filters as $filterName => $filterVars) {
			if (is_array($filterVars)) {
				$filter[] = $filterName . ':' . implode(",", array_map("trim", array_filter($filterVars)));
			} else {
				$filter[] = $filterVars;
			}
		}

		$this->query['filters'] = implode(";", $filter);

		return $this;
	}

	/**
	 * @param int $page
	 * @return $this
	 */
	public function setPage(int $page) {
		$this->query['page'] = $page;
		return $this;
	}

	/**
	 * @param int $perPage
	 * @return $this
	 */
	public function setPerPage(int $perPage) {
		$this->query['per_page'] = $perPage;
		return $this;
	}
}
