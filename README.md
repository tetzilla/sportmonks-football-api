# Sportmonks Football API PHP Client

PHP Library for [Sportmonks](https://www.sportmonks.com/) Soccer API v3. Developed by [Carsten Tetzlaff](mailto:carsten-tetzlaff@outlook.com). This Library is heavily inspired by https://github.com/joesaunderson/sportmonks-soccer.

## Prerequisites

PHP >= 7.3

## Installation

```
composer require tetzilla/sportmonks-football-api
```

## Setup

The API Client relies on [Environment variables](https://www.php.net/manual/en/reserved.variables.environment.php) for 
configuration (setting API token & timezone).

## Prerequisites

PHP >= 7.3

Install:
```
composer require symfony/dotenv
```

Usage:
```
use Symfony\Component\Dotenv\Dotenv;
$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');
```

An example .env file:

```dotenv
# API TOKEN (Required)
# https://docs.sportmonks.com/football/welcome/authentication
SPORTMONKS_API_TOKEN=_YOUR_API_TOKEN_HERE

# TIMEZONE (Optional)
# https://docs.sportmonks.com/football/tutorials-and-guides/tutorials/introduction/set-your-time-zone
SPORTMONKS_TIMEZONE=Europe/London
```

## Usage

```php
use Sportmonks\Football\FootballApi;

...

// Basic API call for all Bookmakers
$response = FootballApi::bookmakers()->getAll();
```

## Pagination, Filtering, Sorting & Data Enrichment 

The [Sportmonks API](https://docs.sportmonks.com/football/tutorials-and-guides/tutorials/introduction/make-your-first-request) 
allows for advanced filtering and sorting, as well as adding data via relationships. This client supports the following:

### Pagination

```php
// API call for Fixtures with page specified 
$response = FootballApi::fixtures()
    ->setPage(3)
    ->getByDate('2023-03-19');
```

Note: The pagination (`$response['pagination']`) can be used to loop through pages and build a result set.

### Includes

```php
// API call for Fixtures with includes
$response = FootballApi::fixtures()
    ->setInclude(['scores', 'lineups', 'events'])
    ->getByDate('2023-03-19');
```

### Filtering
// API call for Fixtures with filters
```php
$response = FootballApi::fixtures()
    ->setInclude(['events','statistics.type'])
    ->setFilter(['eventTypes:18,14'])
    ->getByDate('2023-03-19');
```
Note: This client will not validate the usage for the correct endpoints and will not throw an error. Refer to the 
[Sportmonks docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints) to see which endpoints support the above parameters. 


## Full Endpoint Examples

### Livescores

##### Get all - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/livescores/get-all-livescores)

```php
$response = FootballApi::livescores()->all();
```


##### Get all inplay - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/livescores/get-inplay-livescores)

```php
$response = FootballApi::livescores()->inplay();
```

##### Get latest - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/livescores/get-latest-updated-livescores)

```php
$response = FootballApi::livescores()->latest();
```

### Fixtures

#### Get all - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-all-fixtures)

```php
$response = FootballApi::fixtures()->all();
```

##### Get by Id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-fixture-by-id)

```php
$response = FootballApi::fixtures()->getById($fixtureId);
```

##### Get by multiple ids - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-multiple-ids)

```php
$response = FootballApi::fixtures()->getByMultipleIds([$fixtureId1,$fixtureIds2,...]);
```

##### Get by date - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-multiple-ids)

```php
$response = FootballApi::fixtures()->getByDate($date);
```

##### Get by date range - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-date-range)

```php
$response = FootballApi::fixtures()->getByDateRange($dateFrom, $dateTo);
```

##### Get by date range for team - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-date-range-for-team)

```php
$response = FootballApi::fixtures()->getByDateRangeForTeam($dateFrom, $dateTo, $teamId);
```

##### Get by head to head - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-head-to-head)

```php
$response = FootballApi::fixtures()->getHeadToHead($teamId1, $teamId2);
```

##### Get upcoming by market id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-upcoming-fixtures-by-market-id)

```php
$response = FootballApi::fixtures()->getUpcommingByMarketId($marketId);
```

##### Get by search by name - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-search-by-name)

```php
$response = FootballApi::fixtures()->search($searchQuery);
```

##### Get last updated - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-latest-updated-fixtures)

```php
$response = FootballApi::fixtures()->getLastUpdated();
```

### States

#### Get all states - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/states)

```php
$response = FootballApi::states()->all();
```

#### Get by id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/states/get-state-by-id)

```php
$response = FootballApi::states()->getById();
```

### Types

#### Get all types - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/types/get-all-types)

```php
$response = FootballApi::types()->all();
```

#### Get by id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/types/get-type-by-id)

```php
$response = FootballApi::types()->getById();
```

### Leagues

##### Get all - [View Sportmonks Docs](https://sportmonks.com/docs/football/2.0/leagues/a/get-all-leagues/6)

```php
$response = FootballApi::leagues()->all();
```

##### Get by Id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/leagues/get-leagues-by-live)

```php
$response = FootballApi::leagues()->getById($leagueId);
```

##### Get by live - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/leagues/get-leagues-by-live)

```php
$response = FootballApi::leagues()->live();
```

##### Get by fixture date - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/leagues/get-leagues-by-fixture-date)

```php
$response = FootballApi::leagues()->getByFixtureDate($date);
```

##### Get by country id- [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/leagues/get-leagues-by-country-id)

```php
$response = FootballApi::leagues()->getByCountryId($countryId);
```

##### Get by search by name - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/leagues/get-leagues-search-by-name)

```php
$response = FootballApi::leagues()->search($searchQuery);
```

##### Get all by team id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/leagues/get-all-leagues-by-team-id)

```php
$response = FootballApi::leagues()->getAllByTeamId($teamId);
```

##### Get current by team id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/leagues/get-current-leagues-by-team-id)

```php
$response = FootballApi::leagues()->getCurrentByTeamId($teamId);
```

### Seasons

##### Get all - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/seasons/get-all-seasons)

```php
$response = FootballApi::season()->all();
```

##### Get by id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/seasons/get-seasons-by-id)

```php
$response = FootballApi::season()->getById($seasonId);
```

##### Get by team id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/seasons/get-seasons-by-team-id)

```php
$response = FootballApi::season()->getByTeamId($teamId);
```

##### Get by search by name - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/seasons/get-seasons-by-search-by-name)

```php
$response = FootballApi::season()->search($searchQuery);
```

### Schedules

##### Get by season id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/schedules/get-schedules-by-season-id)

```php
$response = FootballApi::schedules()->bySeasonId($seasonId);
```

##### Get by season id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/schedules/get-schedules-by-team-id)

```php
$response = FootballApi::schedules()->byTeamId($teamId);
```

##### Get by season id and team id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/schedules/get-schedules-by-season-id-and-team-id)

```php
$response = FootballApi::schedules()->bySeasonAndTeamId($seasonId, $teamId);
```

### Stages

##### Get all - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/stages/get-all-stages)

```php
$response = FootballApi::stages()->all();
```

##### Get by id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/stages/get-stage-by-id)

```php
$response = FootballApi::stages()->getById($stageId);
```

##### Get by season id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/stages/get-stages-by-season-id)

```php
$response = FootballApi::stages()->getBySeasonId($seasonId);
```

##### Get by search by name - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/stages/get-stages-by-search-by-name)

```php
$response = FootballApi::stages()->search($searchQuery);
```

### Rounds

##### Get all - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/rounds/get-all-rounds)

```php
$response = FootballApi::rounds()->all();
```

##### Get by id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/rounds/get-round-by-id)

```php
$response = FootballApi::rounds()->getById($roundId);
```

##### Get by season id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/rounds/get-rounds-by-season-id)

```php
$response = FootballApi::rounds()->getBySeasonId($seasonId);
```

##### Get by search by name - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/rounds/get-rounds-by-search-by-name)

```php
$response = FootballApi::rounds()->search($searchQuery);
```

### Standings

##### Get all - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standings/get-all-standings)

```php
$response = FootballApi::standings()->all();
```

##### Get by id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standings/get-standings-by-season-id)

```php
$response = FootballApi::standings()->getBySeasonId($seasonId);
```

##### Get by round id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standings/get-standings-by-round-id)

```php
$response = FootballApi::standings()->getByRoundId($roundId);
```

##### Get corrections by season id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standings/get-standing-correction-by-season-id)

```php
$response = FootballApi::standings()->getCorrectionsBySeasonId($seasonId);
```

##### Get live standings by league id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standings/get-live-standings-by-league-id)

```php
$response = FootballApi::standings()->getLiveByLeagueId($leagueId);
```

### Topscorers

#### Get all by season id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/topscorers/get-topscorers-by-season-id)

```php
$response = FootballApi::topscorers()->getBySeasonId($seasonId);
```

#### Get all by stage id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/topscorers/get-topscorers-by-stage-id)

```php
$response = FootballApi::topscorers()->getByStageId($stageId);
```

### Teams

#### Get all - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/teams/get-all-teams)

```php
$response = FootballApi::teams()->all();
```

#### Get by id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/teams/get-team-by-id)

```php
$response = FootballApi::teams()->getById($teamId);
```

#### Get by country id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/teams/get-teams-by-country-id)

```php
$response = FootballApi::teams()->getByCountryId($countryId);
```

#### Get by season id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/teams/get-teams-by-season-id)

```php
$response = FootballApi::teams()->getBySeasonId($seasonId);
```

#### Get by search by name - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/teams/get-teams-by-search-by-name)

```php
$response = FootballApi::teams()->search($searchQuery);
```

### Team Squads

#### Get by team id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/teams/get-teams-by-search-by-name)

```php
$response = FootballApi::teamSquads()->getByTeamId($teamId);
```

#### Get by team id and season id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/teams/get-teams-by-search-by-name)

```php
$response = FootballApi::teamSquads()->getByTeamAndSeasonId($teamId,$seasonId);
```

### Players

#### Get all - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/players/get-all-players)

```php
$response = FootballApi::players()->all();
```

#### Get by id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/players/get-player-by-id)

```php
$response = FootballApi::players()->getById($playerId);
```

#### Get by country id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/players/get-players-by-country-id)

```php
$response = FootballApi::players()->getByCountryId($countryId);
```

#### Get by search by name - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/players/get-players-by-search-by-name)

```php
$response = FootballApi::players()->search($searchQuery);
```

#### Get last updated - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/players/get-last-updated-players)

```php
$response = FootballApi::players()->getLastUpdated();
```

### Coaches

#### Get all - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/coaches/get-all-coaches)

```php
$response = FootballApi::coaches()->all();
```

#### Get by id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/coaches/get-coach-by-id)

```php
$response = FootballApi::coaches()->getById($coachId);
```

#### Get by country id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/coaches/get-coaches-by-country-id)

```php
$response = FootballApi::coaches()->getByCountryId($countryId);
```

#### Get by search by name - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/coaches/get-coaches-by-search-by-name)

```php
$response = FootballApi::coaches()->search($searchQuery);
```

#### Get last updated - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/coaches/get-last-updated-coaches)

```php
$response = FootballApi::coaches()->getLastUpdated();
```

### Referees

#### Get all - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/referees/get-all-referees)

```php
$response = FootballApi::referees()->all();
```

#### Get by id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/referees/get-referee-by-id)

```php
$response = FootballApi::referees()->getById($refereeId);
```

#### Get by country id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/referees/get-referees-by-country-id)

```php
$response = FootballApi::referees()->getByCountryId($countryId);
```

#### Get by season id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/referees/get-referees-by-season-id)

```php
$response = FootballApi::referees()->getBySeasonId($countryId);
```

#### Get by search by name - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/referees/get-referees-by-search-by-name)

```php
$response = FootballApi::referees()->search($searchQuery);
```

#### Transfers

#### Get all - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/transfers/get-all-transfers)

```php
$response = FootballApi::transfers()->all();
```

#### Get by id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/transfers/get-transfer-by-id)

```php
$response = FootballApi::transfers()->getById($transferId);
```

#### Get latest - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/transfers/get-latest-transfers)

```php
$response = FootballApi::transfers()->latest();
```

#### Get between date range - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/transfers/get-transfers-between-date-range)

```php
$response = FootballApi::transfers()->getByDateRange($dateFrom,$dateTo);
```

#### Get by team id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/transfers/get-transfers-by-team-id)

```php
$response = FootballApi::transfers()->getByTeamId($teamId);
```

#### Get by player id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/transfers/get-transfers-by-player-id)

```php
$response = FootballApi::transfers()->getByPlayerId($playerId);
```

### Venues

#### Get all - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/venues/get-all-venues)

```php
$response = FootballApi::venues()->all();
```

#### Get by id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/venues/get-venue-by-id)

```php
$response = FootballApi::venues()->getById($venueId);
```

#### Get by season id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/venues/get-venues-by-season-id)

```php
$response = FootballApi::venues()->getBySeasonId($seasonId);
```

#### Get by search by name - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/venues/get-venues-by-search-by-name)

```php
$response = FootballApi::venues()->search($searchQuery);
```

### TV Stations

#### Get all - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/tv-stations/get-all-tv-stations)

```php
$response = FootballApi::tvStations()->all();
```

#### Get by id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/tv-stations/get-tv-station-by-id)

```php
$response = FootballApi::tvStations()->getById($stationId);
```

#### Get by fixture id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/tv-stations/get-tv-stations-by-fixture-id)

```php
$response = FootballApi::tvStations()->getByFixtureId($fixtureId);
```

### Predictions 

#### Get predictability - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/predictions/get-probabilities)

```php
$response = FootballApi::predictions()->probabilities();
```

#### Get predictability by league id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/predictions/get-predictability-by-league-id)

```php
$response = FootballApi::predictions()->getPredictabilityByLeagueId($leagueId);
```

#### Get predictability by fixture id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/predictions/get-probabilities-by-fixture-id)

```php
$response = FootballApi::tvStations()->getPredictabilityByFixtureId($fixtureId);
```

#### Get value bets - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/predictions/get-value-bets)

```php
$response = FootballApi::tvStations()->valueBets();
```

### Pre-match Odds 

#### Get all - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/pre-match-odds/get-all-odds)

```php
$response = FootballApi::preMatchOdds()->all();
```

#### Get by fixture id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/pre-match-odds/get-odds-by-fixture-id)

```php
$response = FootballApi::preMatchOdds()->getByFixtureId($fixtureId);
```

#### Get by fixture id and bookmaker id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/pre-match-odds/get-odds-by-fixture-id-and-bookmaker-id)

```php
$response = FootballApi::preMatchOdds()->getByFixtureAndBookmakerId($fixtureId,$bookmakerId);
```

#### Get by fixture id and market id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/pre-match-odds/get-odds-by-fixture-id-and-market-id)

```php
$response = FootballApi::preMatchOdds()->getByFixtureAndMarketId($fixtureId,$marketId);
```
#### Get last updated - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/pre-match-odds/get-last-updated-odds)

```php
$response = FootballApi::preMatchOdds()->getLastUpdated();
```

### Inplay Odds 

#### Get all - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/inplay-odds/get-all-inplay-odds)

```php
$response = FootballApi::inplayOdds()->all();
```

#### Get by fixture id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/inplay-odds/get-inplay-odds-by-fixture-id)

```php
$response = FootballApi::inplayOdds()->getByFixtureId($fixtureId);
```

#### Get by fixture id and bookmaker id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/inplay-odds/get-inplay-odds-by-fixture-id-and-bookmaker-id)

```php
$response = FootballApi::inplayOdds()->getByFixtureAndBookmakerId($fixtureId,$bookmakerId);
```

#### Get by fixture id and market id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/inplay-odds/get-inplay-odds-by-fixture-id-and-market-id)

```php
$response = FootballApi::inplayOdds()->getByFixtureAndMarketId($fixtureId,$marketId);
```
#### Get last updated - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/inplay-odds/get-last-updated-inplay-odds)

```php
$response = FootballApi::inplayOdds()->getLastUpdated();
```

### Markets

#### Get all - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/markets/get-all-markets)

```php
$response = FootballApi::markets()->all();
```

#### Get by market id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/markets/get-market-by-id)

```php
$response = FootballApi::markets()->getById($marketId);
```

#### Get by search - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/markets/get-market-by-search)

```php
$response = FootballApi::markets()->search($searchQuery);
```

### Bookmakers

#### Get all - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/bookmakers/get-all-bookmakers)

```php
$response = FootballApi::bookmakers()->all();
```

#### Get by bookmaker id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/bookmakers/get-bookmaker-by-id)

```php
$response = FootballApi::bookmakers()->getById($bookmakerId);
```

#### Get by search - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/bookmakers/get-bookmaker-by-search)

```php
$response = FootballApi::bookmakers()->search($searchQuery);
```

#### Get by market id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/bookmakers/get-bookmaker-by-fixture-id)

```php
$response = FootballApi::bookmakers()->getByFixtureId($fixtureId);
```

### News

#### Get pre-match news - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/news/get-pre-match-news)

```php
$response = FootballApi::preMatchNews()->all();
```

#### Get by season id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/news/get-pre-match-news-by-season-id)

```php
$response = FootballApi::preMatchNews()->getBySeasonId($seasonId);
```

#### Get pre-match news for upcoming fixtures - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/news/get-pre-match-news-for-upcoming-fixtures)

```php
$response = FootballApi::preMatchNews()->upcomingFixtures();
```

### Rivals

#### Get all rivales - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/rivals/get-all-rivals)

```php
$response = FootballApi::rivals()->all();
```

#### Get by team id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/rivals/get-rivals-by-team-id)

```php
$response = FootballApi::rivals()->getByTeamId($teamId);
```

### Commentaries

#### Get all commentaries - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/commentaries/get-all-commentaries)

```php
$response = FootballApi::commentaries()->all();
```

#### Get by team id - [View Sportmonks Docs](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/commentaries/get-commentaries-by-fixture-id)

```php
$response = FootballApi::commentaries()->getByFixtureId($fixtureId);
```

## License
[MIT](https://tldrlegal.com/license/mit-license)