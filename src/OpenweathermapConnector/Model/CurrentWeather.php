<?php

namespace OpenweathermapConnector\Model;

use OpenweathermapConnector\Model\Coord;
use OpenweathermapConnector\Model\Main;
use OpenweathermapConnector\Model\Wind;
use OpenweathermapConnector\Model\Clouds;
use OpenweathermapConnector\Model\Weather;
use OpenweathermapConnector\Model\Rain;
use OpenweathermapConnector\Model\Snow;

final class CurrentWeather
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $dt;

    /**
     * @var string
     */
    private $name;

    /**
     * @var Coord
     */
    private $coord;

    /**
     * @var Main
     */
    private $main;

    /**
     * @var Wind
     */
    private $wind;

    /**
     * @var Clouds
     */
    private $clouds;

    /**
     * @var Weather
     */
    private $weather;

    /**
     * @var Rain
     */
    private $rain;

    /**
     * @var Snow
     */
    private $snow;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getDt()
    {
        return $this->dt;
    }

    /**
     * @param int $dt
     */
    public function setDt($dt)
    {
        $this->dt = $dt;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return Coord
     */
    public function getCoord()
    {
        return $this->coord;
    }

    /**
     * @param Coord $coord
     */
    public function setCoord($coord)
    {
        $this->coord = $coord;
    }

    /**
     * @return Main
     */
    public function getMain()
    {
        return $this->main;
    }

    /**
     * @param Main $main
     */
    public function setMain($main)
    {
        $this->main = $main;
    }

    /**
     * @return Wind
     */
    public function getWind()
    {
        return $this->wind;
    }

    /**
     * @param Wind $wind
     */
    public function setWind($wind)
    {
        $this->wind = $wind;
    }

    /**
     * @return Clouds
     */
    public function getClouds()
    {
        return $this->clouds;
    }

    /**
     * @param Clouds $clouds
     */
    public function setClouds($clouds)
    {
        $this->clouds = $clouds;
    }

    /**
     * @return Weather
     */
    public function getWeather()
    {
        return $this->weather;
    }

    /**
     * @param Weather $weather
     */
    public function setWeather($weather)
    {
        $this->weather = $weather;
    }

    /**
     * @return Rain
     */
    public function getRain()
    {
        return $this->rain;
    }

    /**
     * @param Rain $rain
     */
    public function setRain($rain)
    {
        $this->rain = $rain;
    }

    /**
     * @return Snow
     */
    public function getSnow()
    {
        return $this->snow;
    }

    /**
     * @param Snow $snow
     */
    public function setSnow($snow)
    {
        $this->snow = $snow;
    }
}