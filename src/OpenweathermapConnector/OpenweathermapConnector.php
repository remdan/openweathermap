<?php

namespace OpenweathermapConnector;

use Ivory\HttpAdapter\HttpAdapterInterface;

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
     */
    public function __construct(
        HttpAdapterInterface $httpAdapter,
        $locale = null,
        $unitsFormat = null,
        $apiKey = null
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
     * @return null|string
     */
    public function getUnitsFormat()
    {
        return $this->unitsFormat;
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
     * @param $name
     */
    public function getCurrentWeatherByCityName($name)
    {
        $query = 'weather';
        $query = sprintf('%s?q=%s', $query, $name);

        $this->executeQuery($query);
    }

    public function getCurrentWeatherByCityId($id)
    {

    }

    public function getCurrentWeatherByCoordinates(array $Coordinates)
    {

    }
}