<?php

namespace Remdan\OpenweathermapConnector;

use Ivory\HttpAdapter\HttpAdapterInterface;
use Remdan\OpenweathermapConnector\Factory\CurrentWeatherFactory;
use Remdan\OpenweathermapConnector\Factory\ForecastDailyFactory;
use Remdan\OpenweathermapConnector\Factory\ForecastFactory;

class OpenweathermapConnector
{
    /**
     * @var HttpAdapterInterface
     */
    protected $httpAdapter;

    /**
     * @var string
     */
    protected $apiUrl = 'http://api.openweathermap.org/data/2.5/';

    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var string|null
     */
    protected $locale;

    /**
     * @var string|null
     */
    protected $unitsFormat;

    /**
     * @param HttpAdapterInterface $httpAdapter
     * @param null $locale
     * @param null $unitsFormat
     * @param null $apiKey
     */
    public function __construct(
        HttpAdapterInterface $httpAdapter,
        $apiKey = null,
        $locale = null,
        $unitsFormat = null
    ) {
        $this->httpAdapter = $httpAdapter;
        $this->locale = $locale;
        $this->unitsFormat = $unitsFormat;
        $this->apiKey = $apiKey;
    }

    /**
     * @return HttpAdapterInterface
     */
    public function getHttpAdapter()
    {
        return $this->httpAdapter;
    }

    /**
     * @return string
     */
    public function getApiUrl()
    {
        return $this->apiUrl;
    }

    /**
     * @return null|string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @return null|string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param $local
     */
    public function setLocal($local)
    {
        $this->locale = $local;
    }

    /**
     * @return null|string
     */
    public function getUnitsFormat()
    {
        return $this->unitsFormat;
    }

    /**
     * @param $unitsFormat
     */
    public function setUnitsFormat($unitsFormat)
    {
        $this->unitsFormat = $unitsFormat;
    }

    /**
     * @param $query
     * @return string
     */
    protected function buildQuery($query)
    {
        if (null !== $this->getLocale()) {
            $query = sprintf('%s&lang=%s', $query, $this->getLocale());
        }

        if (null !== $this->getUnitsFormat()) {
            $query = sprintf('%s&units=%s', $query, $this->getUnitsFormat());
        }

        if (null !== $this->apiKey) {
            $query = sprintf('%s&APPID=%s', $query, $this->getApiKey());
        }

        return $query;
    }

    /**
     * @param $query
     * @return string
     */
    public function executeQuery($query)
    {
        $query = $this->buildQuery($query);

        $content = (string)$this->getHttpAdapter()->get($query)->getBody();

        return $content;
    }

    /**
     * @param $query
     * @return Model\CurrentWeather
     */
    public function getCurrentWeatherResult($query)
    {
        $data = $this->executeQuery($query);

        return CurrentWeatherFactory::createFromArray(json_decode($data, true));
    }

    /**
     * @param $query
     * @return Model\CurrentWeather
     */
    public function getForecastResult($query)
    {
        $data = $this->executeQuery($query);

        return ForecastFactory::createFromArray(json_decode($data, true));
    }

    /**
     * @param $query
     * @return Model\CurrentWeather
     */
    public function getForecastDailyResult($query)
    {
        $data = $this->executeQuery($query);

        return ForecastDailyFactory::createFromArray(json_decode($data, true));
    }

    /**
     * @param $name
     * @return string
     */
    public function getCurrentWeatherByCityName($name)
    {
        $query = $this->getApiUrl() . 'weather';
        $query = sprintf('%s?q=%s', $query, $name);

        return $this->getCurrentWeatherResult($query);
    }

    /**
     * @param $id
     * @return string
     */
    public function getCurrentWeatherByCityId($id)
    {
        $query = $this->getApiUrl() . 'weather';
        $query = sprintf('%s?id=%s', $query, $id);

        return $this->getCurrentWeatherResult($query);
    }

    /**
     * @param $lat
     * @param $lon
     * @return string
     */
    public function getCurrentWeatherByCoordinates($lat, $lon)
    {
        $query = $this->getApiUrl() . 'weather';
        $query = sprintf('%s?lat=%s&lon=%s', $query, $lat, $lon);

        return $this->getCurrentWeatherResult($query);
    }

    /**
     * @param $name
     * @return string
     */
    public function getForecastByCityName($name)
    {
        $query = $this->getApiUrl() . 'forecast';
        $query = sprintf('%s?q=%s', $query, $name);

        return $this->getForecastResult($query);
    }

    /**
     * @param $id
     * @return string
     */
    public function getForecastByCityId($id)
    {
        $query = $this->getApiUrl() . 'forecast';
        $query = sprintf('%s?id=%s', $query, $id);

        return $this->getForecastResult($query);
    }

    /**
     * @param $lat
     * @param $lon
     * @return string
     */
    public function getForecastByCoordinates($lat, $lon)
    {
        $query = $this->getApiUrl() . 'forecast';
        $query = sprintf('%s?lat=%s&lon=%s', $query, $lat, $lon);

        return $this->getForecastResult($query);
    }

    /**
     * @param $name
     * @param $cnt
     * @return Model\CurrentWeather
     */
    public function getForecastDailyByCityName($name, $cnt)
    {
        $query = $this->getApiUrl() . 'forecast';
        $query = sprintf('%s?q=%s', $query, $name);
        $query = sprintf('%s&cnt=%s', $query, $cnt);

        return $this->getForecastDailyResult($query);
    }

    /**
     * @param $id
     * @param $cnt
     * @return Model\CurrentWeather
     */
    public function getForecastDailyByCityId($id, $cnt)
    {
        $query = $this->getApiUrl() . 'forecast';
        $query = sprintf('%s?id=%s', $query, $id);
        $query = sprintf('%s&cnt=%s', $query, $cnt);

        return $this->getForecastDailyResult($query);
    }

    /**
     * @param $lat
     * @param $lon
     * @param $cnt
     * @return Model\CurrentWeather
     */
    public function getForecastDailyByCoordinates($lat, $lon, $cnt)
    {
        $query = $this->getApiUrl() . 'forecast';
        $query = sprintf('%s?lat=%s&lon=%s', $query, $lat, $lon);
        $query = sprintf('%s&cnt=%s', $query, $cnt);

        return $this->getForecastDailyResult($query);
    }
}