<?php

namespace OpenweathermapConnector\Factory;

use OpenweathermapConnector\Factory\AbstractFactory;
use OpenweathermapConnector\Model\Coord;
use OpenweathermapConnector\Model\CurrentWeather;
use OpenweathermapConnector\Model\Forecast;

final class ForecastFactory extends AbstractFactory
{
    /**
     * @param array $result
     * @return CurrentWeather
     */
    public static function createFromArray(array $result)
    {
        $forecast = new Forecast();

        $forecast->setCod(AbstractFactory::readStringValue($result, 'cod'));
        $forecast->setMessage(AbstractFactory::readStringValue($result, 'message'));
        $forecast->setCnt(AbstractFactory::readStringValue($result, 'cnt'));

        $city = AbstractFactory::readStringValue($result, 'city');
        if ($city) {
            $forecast->setCity(AbstractFactory::createCity($city));
        }

        $list = AbstractFactory::readStringValue($result, 'list');
        if (is_array($list)) {

            $entries = array();
            foreach ($list as $item) {
                $entries[] = AbstractFactory::createForecastEntry($item);
            }

            $forecast->setEntries($entries);
        }

        return $forecast;
    }
}