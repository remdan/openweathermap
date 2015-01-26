<?php

namespace Remdan\Openweathermap\Factory;

interface FactoryInterface
{
    /**
     * @param array $array
     */
    public static function createFromArray(array $array);

}