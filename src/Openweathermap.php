<?php

namespace Remdan\Openweathermap;

use Ivory\HttpAdapter\HttpAdapterInterface;
use Remdan\Openweathermap\Factory\CurrentWeatherFactory;
use Remdan\Openweathermap\Factory\FactoryInterface;
use Remdan\Openweathermap\Factory\ForecastDailyFactory;
use Remdan\Openweathermap\Factory\ForecastFactory;
use Remdan\Openweathermap\Factory\Registry\FactoryRegistryInterface;
use Remdan\Openweathermap\Model\CurrentWeather;
use Remdan\Openweathermap\Model\Forecast;
use Remdan\Openweathermap\Model\ForecastDaily;

class Openweathermap
{
    /**
     * @var HttpAdapterInterface
     */
    protected $httpAdapter;

    /**
     * @var FactoryRegistryInterface
     */
    protected $factoryRegistery;

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
     * @param FactoryRegistryInterface $factoryRegistery
     */
    public function __construct(
        HttpAdapterInterface $httpAdapter,
        FactoryRegistryInterface $factoryRegistery
    ) {
        $this->httpAdapter = $httpAdapter;
        $this->factoryRegistery = $factoryRegistery;
    }

    /**
     * @return HttpAdapterInterface
     */
    public function getHttpAdapter()
    {
        return $this->httpAdapter;
    }

    /**
     * @param HttpAdapterInterface $httpAdapter
     */
    public function setHttpAdapter(HttpAdapterInterface $httpAdapter)
    {
        $this->httpAdapter = $httpAdapter;
    }

    /**
     * @return FactoryRegistryInterface
     */
    public function getFactoryRegistery()
    {
        return $this->factoryRegistery;
    }

    /**
     * @param FactoryRegistryInterface $factoryRegistery
     */
    public function setFactoryRegistery(FactoryRegistryInterface $factoryRegistery)
    {
        $this->factoryRegistery = $factoryRegistery;
    }

    /**
     * @return string
     */
    public function getApiUrl()
    {
        return $this->apiUrl;
    }

    /**
     * @param $apiUrl
     */
    public function setApiUrl($apiUrl)
    {
        $this->apiUrl = $apiUrl;
    }

    /**
     * @return null|string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @param $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
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
     * @param $url
     * @return string
     */
    protected function reworkUrl($url)
    {
        if (null !== $this->getLocale()) {
            $url = sprintf('%s&lang=%s', $url, $this->getLocale());
        }

        if (null !== $this->getUnitsFormat()) {
            $url = sprintf('%s&units=%s', $url, $this->getUnitsFormat());
        }

        if (null !== $this->apiKey) {
            $url = sprintf('%s&APPID=%s', $url, $this->getApiKey());
        }

        return $url;
    }

    /**
     * @param $url
     * @return string
     */
    public function executeUrl($url)
    {
        $url = $this->reworkUrl($url);

        $content = (string)$this->getHttpAdapter()->get($url)->getBody();

        return $content;
    }

    /**
     * @param $url
     * @param FactoryInterface $modelFactory
     * @return mixed
     */
    public function getCurrentWeatherResult($url, FactoryInterface $modelFactory = null)
    {
        $data = $this->executeUrl($url);

        if (!$modelFactory) {
            $modelFactory = $this->getFactoryRegistery()->getFactory(CurrentWeather::FACTORY_KEY);
        }

        return $modelFactory->createFromArray(json_decode($data, true));
    }

    /**
     * @param $url
     * @param FactoryInterface $modelFactory
     * @return mixed
     */
    public function getForecastResult($url, FactoryInterface $modelFactory = null)
    {
        $data = $this->executeUrl($url);

        if (!$modelFactory) {
            $modelFactory =  $this->getFactoryRegistery()->getFactory(Forecast::FACTORY_KEY);
        }

        return $modelFactory->createFromArray(json_decode($data, true));
    }

    /**
     * @param $url
     * @param FactoryInterface $modelFactory
     * @return mixed
     */
    public function getForecastDailyResult($url, FactoryInterface $modelFactory = null)
    {
        $data = $this->executeUrl($url);

        if (!$modelFactory) {
            $modelFactory = $this->getFactoryRegistery()->getFactory(ForecastDaily::FACTORY_KEY);
        }

        return $modelFactory->createFromArray(json_decode($data, true));
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
        $query = $this->getApiUrl() . 'forecast' . DIRECTORY_SEPARATOR . 'daily';
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
        $query = $this->getApiUrl() . 'forecast' . DIRECTORY_SEPARATOR . 'daily';
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
        $query = $this->getApiUrl() . 'forecast' . DIRECTORY_SEPARATOR . 'daily';
        $query = sprintf('%s?lat=%s&lon=%s', $query, $lat, $lon);
        $query = sprintf('%s&cnt=%s', $query, $cnt);

        return $this->getForecastDailyResult($query);
    }
}