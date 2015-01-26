<?php

namespace Remdan\Openweathermap\Model;

use Remdan\Openweathermap\Model\Main;
use Remdan\Openweathermap\Model\Wind;
use Remdan\Openweathermap\Model\Clouds;
use Remdan\Openweathermap\Model\Weather;
use Remdan\Openweathermap\Model\Rain;
use Remdan\Openweathermap\Model\Snow;

final class ForecastEntry
{
    /**
     * @var int
     */
    private $dt;

    /**
     * @var string
     */
    private $dtText;

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
     * @param $dt
     * @param $dtText
     * @param Main $main
     * @param Wind $wind
     * @param Clouds $clouds
     * @param Weather $weather
     * @param Rain $rain
     * @param Snow $snow
     */
    public function __construct(
        $dt,
        $dtText,
        Main $main,
        Wind $wind,
        Clouds $clouds,
        Weather $weather,
        Rain $rain,
        Snow $snow
    )
    {
        $this->dt = $dt;
        $this->dtText = $dtText;
        $this->main = $main;
        $this->wind = $wind;
        $this->clouds = $clouds;
        $this->weather = $weather;
        $this->rain = $rain;
        $this->snow = $snow;
    }

    /**
     * @return int
     */
    public function getDt()
    {
        return $this->dt;
    }

    /**
     * @return string
     */
    public function getDtText()
    {
        return $this->dtText;
    }

    /**
     * @return Main
     */
    public function getMain()
    {
        return $this->main;
    }

    /**
     * @return Wind
     */
    public function getWind()
    {
        return $this->wind;
    }

    /**
     * @return Clouds
     */
    public function getClouds()
    {
        return $this->clouds;
    }

    /**
     * @return Weather
     */
    public function getWeather()
    {
        return $this->weather;
    }

    /**
     * @return Rain
     */
    public function getRain()
    {
        return $this->rain;
    }

    /**
     * @return Snow
     */
    public function getSnow()
    {
        return $this->snow;
    }
}