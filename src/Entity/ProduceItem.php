<?php
/**
 * Created by PhpStorm.
 * User: Josh
 * Date: 4/2/2018
 * Time: 7:40 PM
 */

namespace App\Entity;


class ProduceItem {

    private $name;
    private $expiration_date;
    private $icon;

    function __construct($name, \DateTime $expiration_date, $icon) {
        $this->name = $name;
        $this->expiration_date = $expiration_date;
        $this->icon = $icon;
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
    public function setName($name): void {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getExpirationDate() : \DateTime {
        return $this->expiration_date;
    }

    /**
     * @param mixed $expiration_date
     */
    public function setExpirationDate($expiration_date): void {
        $this->expiration_date = $expiration_date;
    }

    /**
     * @return mixed
     */
    public function getIcon() {
        return $this->icon;
    }

    /**
     * @param mixed $icon
     */
    public function setIcon($icon): void {
        $this->icon = $icon;
    }



}