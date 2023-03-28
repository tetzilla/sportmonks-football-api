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
            $this->query['tz'] = $_ENV['SPORTMONKS_TIMEZONE'];
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
     * @param array $bookmakerIds
     * @return $this
     */
    public function setBookmakers(array $bookmakerIds) {
        // Trim & Join Array of Bookmaker IDs
        $this->query['bookmakers'] = implode(",", array_map("trim", array_filter($bookmakerIds)));
        return $this;
    }

    /**
     * @param array $fixtureIds
     * @return $this
     */
    public function setFixtures(array $fixtureIds) {
        // Trim & Join Array of Fixtures IDs
        $this->query['fixtures'] = implode(",", array_map("trim", array_filter($fixtureIds)));
        return $this;
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
     * @param array $leagueIds
     * @return $this
     */
    public function setLeagues(array $leagueIds) {
        // Trim & Join Array of League IDs
        $this->query['leagues'] = implode(",", array_map("trim", array_filter($leagueIds)));
        return $this;
    }

    /**
     * @param array $marketIds
     * @return $this
     */
    public function setMarkets(array $marketIds) {
        // Trim & Join Array of Market IDs
        $this->query['markets'] = implode(",", array_map("trim", array_filter($marketIds)));
        return $this;
    }

    /**
     * @param int $groupId
     * @return FootballClient
     */
    public function setGroup(int $groupId): self {
        // Add group ID
        $this->query['group_id'] = $groupId;
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
}
