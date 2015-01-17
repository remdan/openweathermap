<?php

namespace OpenweathermapConnector\Factory;

use OpenweathermapConnector\Factory\AbstractFactory;
use OpenweathermapConnector\Model\Coord;
use OpenweathermapConnector\Model\CurrentWeather;
use OpenweathermapConnector\Model\ForecastDaily;

final class ForecastDailyFactory extends AbstractFactory
{
    /**
     * @param array $result
     * @return CurrentWeather
     */
    public static function createFromArray(array $result)
    {
        $forecastDaily = new ForecastDaily();

        $forecastDaily->setCod(AbstractFactory::readStringValue($result, 'cod'));
        $forecastDaily->setMessage(AbstractFactory::readStringValue($result, 'message'));
        $forecastDaily->setCnt(AbstractFactory::readStringValue($result, 'cnt'));

        $city = AbstractFactory::readStringValue($result, 'city');
        if ($city) {
            $forecastDaily->setCity(AbstractFactory::createCity($city));
        }

        $list = AbstractFactory::readStringValue($result, 'list');
        if (is_array($list)) {

            $entries = array();
            foreach ($list as $item) {
                $entries[] = AbstractFactory::createForecastDailyEntry($item);
            }

            $forecastDaily->setEntries($entries);
        }

        return $forecastDaily;
    }
}