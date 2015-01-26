<?php

namespace Remdan\Openweathermap\Factory;

use Remdan\Openweathermap\Factory\AbstractFactory;
use Remdan\Openweathermap\Factory\FactoryInterface;
use Remdan\Openweathermap\Model\Coord;
use Remdan\Openweathermap\Model\CurrentWeather;
use Remdan\Openweathermap\Model\ForecastDaily;

final class ForecastDailyFactory extends AbstractFactory implements FactoryInterface
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