<?php

namespace Remdan\OpenweathermapConnector\Model;

use Remdan\OpenweathermapConnector\Model\Weather;
use Remdan\OpenweathermapConnector\Model\Temp;

final class ForecastDailyEntry
{
    /**
     * @var int
     */
    private $dt;

    /**
     * @var float
     */
    private $pressure;

    /**
     * @var int
     */
    private $humidity;

    /**
     * @var Temp
     */
    private $temp;

    /**
     * @var Weather
     */
    private $weather;

    /**
     * @param $dt
     * @param $pressure
     * @param $humidity
     * @param Temp $temp
     * @param Weather $weather
     */
    public function __construct(
        $dt,
        $pressure,
        $humidity,
        Temp $temp,
        Weather $weather
    ) {
        $this->dt = $dt;
        $this->pressure = $pressure;
        $this->humidity = $humidity;
        $this->temp = $temp;
        $this->weather = $weather;
    }

    /**
     * @return int
     */
    public function getDt()
    {
        return $this->dt;
    }

    /**
     * @return float
     */
    public function getPressure()
    {
        return $this->pressure;
    }

    /**
     * @return int
     */
    public function getHumidity()
    {
        return $this->humidity;
    }

    /**
     * @return Temp
     */
    public function getTemp()
    {
        return $this->temp;
    }

    /**
     * @return Weather
     */
    public function getWeather()
    {
        return $this->weather;
    }
}