<?php

namespace Remdan\Openweathermap\Factory\Registry;

use Remdan\Openweathermap\Factory\FactoryInterface;

interface FactoryRegistryInterface
{
    /**
     * @return array|FactoryInterface[]
     */
    public function getFactories();

    /**
     * @param $key
     * @return FactoryInterface
     */
    public function getFactory($key);

    /**
     * @param array $factories
     */
    public function setFactories(array $factories);

    /**
     * @param $key
     * @param FactoryInterface $factory
     */
    public function addFactory($key, FactoryInterface $factory);

    /**
     * @param $key
     */
    public function removeFactory($key);
}