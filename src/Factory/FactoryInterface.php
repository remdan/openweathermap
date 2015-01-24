<?php

namespace Remdan\OpenweathermapConnector\Factory;

interface FactoryInterface
{
    /**
     * @param array $array
     */
    public static function createFromArray(array $array);

}