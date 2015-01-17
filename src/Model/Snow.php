<?php

namespace Remdan\OpenweathermapConnector\Model;

class Snow
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