<?php

namespace App\Entity;

class Task {

    private $description;
    private $dueDate;

    function __construct(string $description, \DateTime $dueDate) {
        $this->description = $description;
        $this->dueDate = $dueDate;
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

}