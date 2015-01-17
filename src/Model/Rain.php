<?php

namespace Remdan\OpenweathermapConnector\Model;

class Rain
{
    /**
     * @var int
     */
    private $oneHours;

    /**
     * @var int
     */
    private $threeHours;

    /**
     * @param $oneHours
     * @param $threeHours
     */
    public function __construct(
        $oneHours,
        $threeHours
    ) {
        $this->oneHours = $oneHours;
        $this->threeHours = $threeHours;
    }

    /**
     * @return int
     */
    public function getOneHours()
    {
        return $this->oneHours;
    }

    /**
     * @return int
     */
    public function getThreeHours()
    {
        return $this->threeHours;
    }
}