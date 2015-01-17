<?php

namespace Remdan\OpenweathermapConnector\Factory;

use Remdan\OpenweathermapConnector\Model\City;
use Remdan\OpenweathermapConnector\Model\Clouds;
use Remdan\OpenweathermapConnector\Model\Coord;
use Remdan\OpenweathermapConnector\Model\ForecastDailyEntry;
use Remdan\OpenweathermapConnector\Model\ForecastEntry;
use Remdan\OpenweathermapConnector\Model\Main;
use Remdan\OpenweathermapConnector\Model\Rain;
use Remdan\OpenweathermapConnector\Model\Snow;
use Remdan\OpenweathermapConnector\Model\Temp;
use Remdan\OpenweathermapConnector\Model\Weather;
use Remdan\OpenweathermapConnector\Model\Wind;

Abstract class AbstractFactory
{
    /**
     * @param  array $data
     * @param  string $key
     * @return string
     */
    final static function readStringValue(array $data, $key)
    {
        $value = '';
        if (array_key_exists($key, $data)) {
            $value = $data[$key];
        }

        return self::valueOrNull($value);
    }

    /**
     * @param  string $str
     * @return string|null
     */
    final static function valueOrNull($str)
    {
        return empty($str) ? null : $str;
    }

    /**
     * @param $latitude
     * @param $longitude
     * @return null|Coord
     */
    final static function createCoord($latitude, $longitude)
    {
        if (null === $latitude || null === $longitude) {
            return null;
        }
        return new Coord((float)$latitude, (float)$longitude);
    }

    /**
     * @param array $data
     * @return City
     */
    final static function createCity(array $data)
    {
        $city = new City(
            self::readStringValue($data, 'id'),
            self::readStringValue($data, 'name'),
            self::readStringValue($data, 'country')
        );

        return $city;
    }

    /**
     * @param array $data
     * @return Main
     */
    final static function createMain(array $data)
    {
        $main = new Main(
            self::readStringValue($data, 'temp'),
            self::readStringValue($data, 'humidity'),
            self::readStringValue($data, 'temp_min'),
            self::readStringValue($data, 'temp_max'),
            self::readStringValue($data, 'pressure'),
            self::readStringValue($data, 'seaLevel'),
            self::readStringValue($data, 'grndLevel')
        );

        return $main;
    }

    /**
     * @param array $data
     * @return Wind
     */
    final static function createWind(array $data)
    {
        $wind = new Wind(
            self::readStringValue($data, 'speed'),
            self::readStringValue($data, 'deg'),
            self::readStringValue($data, 'gust')
        );

        return $wind;
    }

    /**
     * @param array $data
     * @return Clouds
     */
    final static function createClouds(array $data)
    {
        $clouds = new Clouds(
            self::readStringValue($data, 'all')
        );

        return $clouds;
    }

    /**
     * @param array $data
     * @return Weather
     */
    final static function createWeather(array $data)
    {
        $weather = new Weather(
            self::readStringValue($data, 'id'),
            self::readStringValue($data, 'main'),
            self::readStringValue($data, 'description'),
            self::readStringValue($data, 'icon')
        );

        return $weather;
    }

    /**
     * @param array $data
     * @return Rain
     */
    final static function createRain(array $data = array())
    {
        $rain = new Rain(
            self::readStringValue($data, '1h'),
            self::readStringValue($data, '3h')
        );

        return $rain;
    }

    /**
     * @param array $data
     * @return Snow
     */
    final static function createSnow(array $data)
    {
        $snow = new Snow(
            self::readStringValue($data, '1h'),
            self::readStringValue($data, '3h')
        );

        return $snow;
    }

    /**
     * @param array $data
     * @return Temp
     */
    final static function createTemp(array $data)
    {
        $temp = new Temp(
            self::readStringValue($data, 'day'),
            self::readStringValue($data, 'min'),
            self::readStringValue($data, 'max'),
            self::readStringValue($data, 'night'),
            self::readStringValue($data, 'eve'),
            self::readStringValue($data, 'morn')
        );

        return $temp;
    }

    /**
     * @param array $data
     * @return Snow
     */
    final static function createForecastEntry(array $data)
    {
        $main = self::readStringValue($data, 'main');
        if (!$main) {
            $main = array();
        }

        $wind = self::readStringValue($data, 'wind');
        if (!$wind) {
            $wind = array();
        }

        $clouds = self::readStringValue($data, 'clouds');
        if (!$clouds) {
            $clouds = array();
        }

        $weather = self::readStringValue($data, 'weather');
        if (!$weather) {
            $weather = array();
        }

        $rain = self::readStringValue($data, 'rain');
        if (!$rain) {
            $rain = array();
        }

        $snow = self::readStringValue($data, 'snow');
        if (!$snow) {
            $snow = array();
        }

        $forecastEntry = new ForecastEntry(
            self::readStringValue($data, 'dt'),
            self::readStringValue($data, 'dt_txt'),
            self::createMain($main),
            self::createWind($wind),
            self::createClouds($clouds),
            self::createWeather($weather),
            self::createRain($rain),
            self::createSnow($snow)
        );

        return $forecastEntry;
    }

    /**
     * @param array $data
     * @return Snow
     */
    final static function createForecastDailyEntry(array $data)
    {
        $temp = self::readStringValue($data, 'temp');
        if (!$temp) {
            $temp = array();
        }

        $weather = self::readStringValue($data, 'weather');
        if (!$weather) {
            $weather = array();
        }

        $forecastEntry = new ForecastDailyEntry(
            self::readStringValue($data, 'dt'),
            self::readStringValue($data, 'pressure'),
            self::readStringValue($data, 'humidity'),
            self::createTemp($temp),
            self::createWeather($weather)
        );

        return $forecastEntry;
    }
}