<?php

namespace Remdan\OpenweathermapConnector\Model;

class Clouds
{
    /**
     * @var int
     */
    private $all;

    /**
     * @param $all
     */
    public function __construct($all)
    {
        $this->all = $all;
    }

    /**
     * @return int
     */
    public function getAll()
    {
        return $this->all;
    }
}