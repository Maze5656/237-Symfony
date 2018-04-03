<?php
/**
 * Created by PhpStorm.
 * User: Josh
 * Date: 4/2/2018
 * Time: 7:40 PM
 */

namespace App\Entity;


class ProductItem {

    private $name;
    private $expiration_date;

    function __construct($name, $expiration_date) {
        $this->name = $name;
        $this->expiration_date = $expiration_date;
    }

}