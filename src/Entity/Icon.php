<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Icon {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $iconName;

    /**
     * @ORM\Column(type="string")
     */
    private $iconImage;

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
    public function getIconName()
    {
        return $this->iconName;
    }

    /**
     * @param mixed $iconName
     */
    public function setIconName($iconName)
    {
        $this->iconName = $iconName;
    }

    public function getIconImage()
    {
        return $this->iconImage;
    }

    public function setIconImage($iconImage)
    {
        $this->iconImage = $iconImage;
    }

}
