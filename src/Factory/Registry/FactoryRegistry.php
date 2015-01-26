<?php

namespace Remdan\Openweathermap\Factory\Registry;

use Remdan\Openweathermap\Factory\Registry\FactoryRegistryInterface;
use Remdan\Openweathermap\Factory\FactoryInterface;
use Remdan\Openweathermap\Model\CurrentWeather;
use Remdan\Openweathermap\Model\Forecast;
use Remdan\Openweathermap\Model\ForecastDaily;
use Remdan\Openweathermap\Factory\CurrentWeatherFactory;
use Remdan\Openweathermap\Factory\ForecastFactory;
use Remdan\Openweathermap\Factory\ForecastDailyFactory;

class FactoryRegistry implements FactoryRegistryInterface
{
    /**
     * @var array|FactoryInterface[]
     */
    protected $factories = array();

    /**
     * @param array $factories
     */
    public function __construct(array $factories = array())
    {
        $this->setDefaultFactories();
        $this->setFactories($factories);
    }

    /**
     * @return array|FactoryInterface[]
     */
    public function getFactories()
    {
        return $this->factories;
    }

    /**
     * @param $key
     * @return FactoryInterface
     * @throws \InvalidArgumentException
     */
    public function getFactory($key)
    {
        if (!isset($this->factories[$key])) {
            throw new \InvalidArgumentException("Invalid factory name given or factory is not registered");
        }

        return $this->factories[$key];
    }

    /**
     *
     */
    private function setDefaultFactories()
    {
        $this->addFactory(CurrentWeather::FACTORY_KEY, new CurrentWeatherFactory());
        $this->addFactory(Forecast::FACTORY_KEY, new ForecastFactory());
        $this->addFactory(ForecastDaily::FACTORY_KEY, new ForecastDailyFactory());
    }

    /**
     * @param array $factories
     */
    public function setFactories(array $factories)
    {
        foreach ($factories as $key => $factory) {
            $this->addFactory($key, $factory);
        }
    }

    /**
     * @param $key
     * @param FactoryInterface $factory
     */
    public function addFactory($key, FactoryInterface $factory)
    {
        $this->factories[$key] = $factory;
    }

    /**
     * @param $key
     */
    public function removeFactory($key)
    {
        unset($this->factories[$key]);
    }
}