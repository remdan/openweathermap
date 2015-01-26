<?php

namespace Remdan\Openweathermap\Model;

class Temp
{
    /**
     * @var float
     */
    private $day;

    /**
     * @var float
     */
    private $min;

    /**
     * @var float
     */
    private $max;

    /**
     * @var float
     */
    private $night;

    /**
     * @var float
     */
    private $eve;

    /**
     * @var float
     */
    private $morn;

    /**
     * @param $day
     * @param $min
     * @param $max
     * @param $night
     * @param $eve
     * @param $morn
     */
    public function __construct(
        $day,
        $min,
        $max,
        $night,
        $eve,
        $morn
    ) {
        $this->day = $day;
        $this->min = $min;
        $this->max = $max;
        $this->night = $night;
        $this->eve = $eve;
        $this->morn = $morn;
    }

    /**
     * @return float
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @return float
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * @return float
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * @return float
     */
    public function getNight()
    {
        return $this->night;
    }

    /**
     * @return float
     */
    public function getEve()
    {
        return $this->eve;
    }

    /**
     * @return float
     */
    public function getMorn()
    {
        return $this->morn;
    }
}