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
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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