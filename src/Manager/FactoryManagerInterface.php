<?php

namespace Remdan\OpenweathermapConnector\Manager;

use Remdan\OpenweathermapConnector\Factory\FactoryInterface;

interface FactoryManagerInterface
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