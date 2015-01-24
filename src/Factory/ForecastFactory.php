<?php

namespace Remdan\OpenweathermapConnector\Factory;

use Remdan\OpenweathermapConnector\Factory\AbstractFactory;
use Remdan\OpenweathermapConnector\Factory\FactoryInterface;
use Remdan\OpenweathermapConnector\Model\Coord;
use Remdan\OpenweathermapConnector\Model\CurrentWeather;
use Remdan\OpenweathermapConnector\Model\Forecast;

final class ForecastFactory extends AbstractFactory implements FactoryInterface
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