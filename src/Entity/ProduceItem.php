<?php
/**
 * Created by PhpStorm.
 * User: Josh
 * Date: 4/2/2018
 * Time: 7:40 PM
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Icon;

/**
 * @ORM\Entity
 */
class ProduceItem {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;
    /**
     * @ORM\Column(type="datetime")
     */
    private $expiration_date;

    /**
     * @ORM\OneToOne(targetEntity="Icon")
     */
    private $icon;

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getExpirationDate() : \DateTime {
        return $this->expiration_date = new \DateTime("now");
    }

    /**
     * @param mixed $expiration_date
     */
    public function setExpirationDate($expiration_date) {
        $this->expiration_date = $expiration_date;
    }

    public function getIcon() {
        return $this->icon;
    }

    public function setIcon($icon) {
        $this->icon = $icon;
    }

}
