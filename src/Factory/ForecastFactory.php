<?php

namespace Remdan\Openweathermap\Factory;

use Remdan\Openweathermap\Factory\AbstractFactory;
use Remdan\Openweathermap\Factory\FactoryInterface;
use Remdan\Openweathermap\Model\Coord;
use Remdan\Openweathermap\Model\CurrentWeather;
use Remdan\Openweathermap\Model\Forecast;

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