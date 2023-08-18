<?php

namespace Sportmonks\Football;

use Sportmonks\Football\Endpoint\Bookmakers;
use Sportmonks\Football\Endpoint\Coaches;
use Sportmonks\Football\Endpoint\Commentaries;
use Sportmonks\Football\Endpoint\Fixtures;
use Sportmonks\Football\Endpoint\Leagues;
use Sportmonks\Football\Endpoint\Livescores;
use Sportmonks\Football\Endpoint\Markets;
use Sportmonks\Football\Endpoint\PreMatchNews;
use Sportmonks\Football\Endpoint\InplayOdds;
use Sportmonks\Football\Endpoint\PreMatchOdds;
use Sportmonks\Football\Endpoint\Players;
use Sportmonks\Football\Endpoint\Predictions;
use Sportmonks\Football\Endpoint\Referees;
use Sportmonks\Football\Endpoint\Rivals;
use Sportmonks\Football\Endpoint\Rounds;
use Sportmonks\Football\Endpoint\Schedules;
use Sportmonks\Football\Endpoint\Seasons;
use Sportmonks\Football\Endpoint\Stages;
use Sportmonks\Football\Endpoint\States;
use Sportmonks\Football\Endpoint\Standings;
use Sportmonks\Football\Endpoint\Teams;
use Sportmonks\Football\Endpoint\TeamSquads;
use Sportmonks\Football\Endpoint\Topscorers;
use Sportmonks\Football\Endpoint\Transfers;
use Sportmonks\Football\Endpoint\TvStations;
use Sportmonks\Football\Endpoint\Types;
use Sportmonks\Football\Endpoint\Venues;
use Sportmonks\Football\Endpoint\Continents;
use Sportmonks\Football\Endpoint\Countries;
use Sportmonks\Football\Endpoint\Regions;
use Sportmonks\Football\Endpoint\Cities;
use Sportmonks\Football\Endpoint\Filters;
use Sportmonks\Football\Endpoint\My;


/**
 * Class FootballApi
 * @package Sportmonks\Football
 */
class FootballApi {
    /**
     * @return Bookmakers
     */
    public static function bookmakers() {
        return new Bookmakers();
    }

    /**
     * @return Coaches
     */
    public static function coaches() {
        return new Coaches();
    }

    /**
     * @return Commentaries
     */
    public static function commentaries() {
        return new Commentaries();
    }

    /**
     * @return Fixtures
     */
    public static function fixtures() {
        return new Fixtures();
    }

    /**
     * @return Leagues
     */
    public static function leagues() {
        return new Leagues();
    }

    /**
     * @return Livescores
     */
    public static function livescores() {
        return new Livescores();
    }

    /**
     * @return Markets
     */
    public static function markets() {
        return new Markets();
    }

    /**
     * @return PreMatchNews
     */
    public static function preMatchNews() {
        return new PreMatchNews();
    }

    /**
     * @return InplayOdds
     */
    public static function inplayOdds() {
        return new InplayOdds();
    }

    /**
     * @return PreMatchOdds
     */
    public static function preMatchOdds() {
        return new PreMatchOdds();
    }

    /**
     * @return Players
     */
    public static function players() {
        return new Players();
    }

    /**
     * @return Predictions
     */
    public static function predictions() {
        return new Predictions();
    }

    /**
     * @return Referees
     */
    public static function referees() {
        return new Referees();
    }

    /**
     * @return Rivals
     */
    public static function rivals() {
        return new Rivals();
    }

    /**
     * @return Rounds
     */
    public static function rounds() {
        return new Rounds();
    }

    /**
     * @return Schedules
     */
    public static function schedules() {
        return new Schedules();
    }

    /**
     * @return Seasons
     */
    public static function seasons() {
        return new Seasons();
    }

    /**
     * @return Stages
     */
    public static function stages() {
        return new Stages();
    }

    /**
     * @return States
     */
    public static function states() {
        return new States();
    }

    /**
     * @return Standings
     */
    public static function standings() {
        return new Standings();
    }

    /**
     * @return TeamSquads
     */
    public static function teamSquads() {
        return new TeamSquads();
    }

    /**
     * @return Teams
     */
    public static function teams() {
        return new Teams();
    }

    /**
     * @return Topscorers
     */
    public static function topScorers() {
        return new Topscorers();
    }

    /**
     * @return Transfers
     */
    public static function transfers() {
        return new Transfers();
    }


    /**
     * @return TvStations
     */
    public static function tvStations() {
        return new TvStations();
    }

    /**
     * @return Types
     */
    public static function types() {
        return new Types();
    }

    /**
     * @return Venues
     */
    public static function venues() {
        return new Venues();
    }

    /**
     * @return Continents
     */
    public static function continents() {
        return new Continents();
    }

    /**
     * @return Countries
     */
    public static function countries() {
        return new Countries();
    }

    /**
     * @return Regions
     */
    public static function regions() {
        return new Regions();
    }

    /**
     * @return Cities
     */
    public static function cities() {
        return new Cities();
    }

    /**
     * @return Filters
     */
    public static function filters() {
        return new Filters();
    }

    /**
     * @return My
     */
    public static function my() {
        return new My();
    }
}
