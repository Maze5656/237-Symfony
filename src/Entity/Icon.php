<?php

namespace App\Entity;

class Icon {
    private $iconName;
    private $iconImage;

    /**
     * Icon constructor.
     * @param $iconName
     * @param $iconImage
     */
    public function __construct($iconName, $iconImage)
    {
        $this->iconName = $iconName;
        $this->iconImage = $iconImage;
    }

    /**
     * @return mixed
     */
    public function getIconName()
    {
        return $this->iconName;
    }

    /**
     * @param mixed $iconName
     */
    public function setIconName($iconName): void
    {
        $this->iconName = $iconName;
    }

    /**
     * @return mixed
     */
    public function getIconImage()
    {
        return $this->iconImage;
    }

    /**
     * @param mixed $iconImage
     */
    public function setIconImage($iconImage): void
    {
        $this->iconImage = $iconImage;
    }

}