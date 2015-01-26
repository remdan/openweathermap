<?php

namespace Remdan\Openweathermap\Model;

class Wind
{
    /**
     * @var float
     */
    private $speed;

    /**
     * @var float
     */
    private $deg;

    /**
     * @var float
     */
    private $gust;

    /**
     * @param $speed
     * @param $deg
     * @param $gust
     */
    public function __construct(
        $speed,
        $deg,
        $gust
    ) {
        $this->speed = $speed;
        $this->deg = $deg;
        $this->gust = $gust;
    }

    /**
     * @return float
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * @return float
     */
    public function getDeg()
    {
        return $this->deg;
    }

    /**
     * @return float
     */
    public function getGust()
    {
        return $this->gust;
    }
}