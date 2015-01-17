<?php

namespace Remdan\OpenweathermapConnector\Factory;

use Remdan\OpenweathermapConnector\Factory\AbstractFactory;
use Remdan\OpenweathermapConnector\Model\Coord;
use Remdan\OpenweathermapConnector\Model\CurrentWeather;

final class CurrentWeatherFactory extends AbstractFactory
{
    /**
     * @param array $result
     * @return CurrentWeather
     */
    public static function createFromArray(array $result)
    {
        $currentWeather = new CurrentWeather();

        $currentWeather->setId(AbstractFactory::readStringValue($result, 'id'));
        $currentWeather->setDt(AbstractFactory::readStringValue($result, 'dt'));
        $currentWeather->setName(AbstractFactory::readStringValue($result, 'name'));

        $coord = AbstractFactory::readStringValue($result, 'coord');
        if ($coord) {
            $currentWeather->setCoord(AbstractFactory::createCoord($coord['lat'], $coord['lon']));
        }

        $main = AbstractFactory::readStringValue($result, 'main');
        if ($main) {
            $currentWeather->setMain(AbstractFactory::createMain($main));
        }

        $wind = AbstractFactory::readStringValue($result, 'wind');
        if ($wind) {
            $currentWeather->setWind(AbstractFactory::createWind($wind));
        }

        $clouds = AbstractFactory::readStringValue($result, 'clouds');
        if ($clouds) {
            $currentWeather->setClouds(AbstractFactory::createClouds($clouds));
        }

        $snow = AbstractFactory::readStringValue($result, 'snow');
        if ($snow) {
            $currentWeather->setSnow(AbstractFactory::createSnow($snow));
        }

        $rain = AbstractFactory::readStringValue($result, 'rain');
        if ($rain) {
            $currentWeather->setRain(AbstractFactory::createRain($rain));
        }

        $weather = AbstractFactory::readStringValue($result, 'weather');
        if (is_array($weather)) {
            $currentWeather->setWeather(AbstractFactory::createWeather($weather[0]));
        }

        return $currentWeather;
    }
}