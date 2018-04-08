<?php

namespace App\Entity;

class Task {

    private $description;
    private $dueDate;
    private $image;

    function __construct(string $description, \DateTime $dueDate, $image) {
        $this->description = $description;
        $this->dueDate = $dueDate;
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getDescription(): string {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void {
        $this->description = $description;
    }

    /**
     * @return \DateTime
     */
    public function getDueDate(): \DateTime {
        return $this->dueDate;
    }

    /**
     * @param \DateTime $dueDate
     */
    public function setDueDate(\DateTime $dueDate): void {
        $this->dueDate = $dueDate;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }

}