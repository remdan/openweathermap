<?php

namespace Remdan\OpenweathermapConnector\Model;

class Main
{
    /**
     * @var float
     */
    private $temp;

    /**
     * @var int
     */
    private $humidity;

    /**
     * @var float
     */
    private $tempMin;

    /**
     * @var float
     */
    private $tempMax;

    /**
     * @var float
     */
    private $pressure;

    /**
     * @var float
     */
    private $seaLevel;

    /**
     * @var float
     */
    private $grndLevel;

    /**
     * @param $temp
     * @param $humidity
     * @param $tempMin
     * @param $tempMax
     * @param $pressure
     * @param $seaLevel
     * @param $grndLevel
     */
    public function __construct(
        $temp,
        $humidity,
        $tempMin,
        $tempMax,
        $pressure,
        $seaLevel,
        $grndLevel
    ) {
        $this->temp = $temp;
        $this->humidity = $humidity;
        $this->tempMin = $tempMin;
        $this->tempMax = $tempMax;
        $this->pressure = $pressure;
        $this->seaLevel = $seaLevel;
        $this->grndLevel = $grndLevel;
    }

    /**
     * @return float
     */
    public function getTemp()
    {
        return $this->temp;
    }

    /**
     * @return int
     */
    public function getHumidity()
    {
        return $this->humidity;
    }

    /**
     * @return float
     */
    public function getTempMin()
    {
        return $this->tempMin;
    }

    /**
     * @return float
     */
    public function getTempMax()
    {
        return $this->tempMax;
    }

    /**
     * @return float
     */
    public function getPressure()
    {
        return $this->pressure;
    }

    /**
     * @return float
     */
    public function getSeaLevel()
    {
        return $this->seaLevel;
    }

    /**
     * @return float
     */
    public function getGrndLevel()
    {
        return $this->grndLevel;
    }
}