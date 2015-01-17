<?php

namespace OpenweathermapConnector\Model;

class Weather
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $main;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $icon;

    /**
     * @param $id
     * @param $main
     * @param $description
     * @param $icon
     */
    public function __construct(
        $id,
        $main,
        $description,
        $icon
    ) {
        $this->id = $id;
        $this->main = $main;
        $this->description = $description;
        $this->icon = $icon;
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
    public function getMain()
    {
        return $this->main;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }
}