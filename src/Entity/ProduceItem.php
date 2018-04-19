<?php
/**
 * Created by PhpStorm.
 * User: Josh
 * Date: 4/2/2018
 * Time: 7:40 PM
 */

namespace App\Entity;

use App\Entity\Icon;
use Doctrine\ORM\Mapping as ORM;

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
    public $icon;

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getExpirationDate() : \DateTime {
        return $this->expiration_date = new \DateTime();
    }

    public function setExpirationDate($expiration_date): void {
        $this->expiration_date = $expiration_date;
    }

    public function getIcon() {
        return $this->icon;
    }

    public function setIcon($icon) {
        $this->icon = $icon;
    }


}
