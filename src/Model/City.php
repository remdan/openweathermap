<?php

namespace Remdan\OpenweathermapConnector\Model;

final class City
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $country;

    /**
     * @param $id
     * @param $name
     * @param $country
     */
    public function __construct(
        $id,
        $name,
        $country
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->country = $country;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }
}