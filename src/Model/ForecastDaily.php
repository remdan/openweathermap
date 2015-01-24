<?php

namespace Remdan\OpenweathermapConnector\Model;

use Remdan\OpenweathermapConnector\Model\City;
use Remdan\OpenweathermapConnector\Model\ForecastDailyEntry;

final class ForecastDaily
{
    const FACTORY_KEY =  'forecastDaily';

    /**
     * @var int
     */
    private $cod;

    /**
     * @var string
     */
    private $message;

    /**
     * @var int
     */
    private $cnt;

    /**
     * @var City
     */
    private $city;

    /**
     * @var ForecastDailyEntry[]
     */
    private $entries;

    /**
     * @return int
     */
    public function getCod()
    {
        return $this->cod;
    }

    /**
     * @param int $cod
     */
    public function setCod($cod)
    {
        $this->cod = $cod;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return int
     */
    public function getCnt()
    {
        return $this->cnt;
    }

    /**
     * @param int $cnt
     */
    public function setCnt($cnt)
    {
        $this->cnt = $cnt;
    }

    /**
     * @return City
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param City $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return ForecastEntry[]
     */
    public function getEntries()
    {
        return $this->entries;
    }

    /**
     * @param ForecastEntry[] $entries
     */
    public function setEntries($entries)
    {
        $this->entries = $entries;
    }
}