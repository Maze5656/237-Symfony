<?php
//
//namespace App\Entity;
//
//use Doctrine\ORM\Mapping as ORM;
//use App\Entity\Course;
//
///**
// * @ORM\Entity
// */
//class Student {
//
//    /**
//     * @ORM\Id
//     * @ORM\GeneratedValue
//     * @ORM\Column(type="integer")
//     */
//    private $id;
//
//    /**
//     * @ORM\Column(type="string", length=50)
//     */
//    private $firstName;
//
//    /**
//     * @ORM\Column(type="string", length=50)
//     */
//    private $lastName;
//
//    /**
//     * @ORM\ManyToMany(targetEntity="Course", inversedBy="students")
//     */
//    private $courses;
//
//    public function __construct() {
//        $this->courses = new \Doctrine\Common\Collections\ArrayCollection();
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getId()
//    {
//        return $this->id;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getFirstName()
//    {
//        return $this->firstName;
//    }
//
//    /**
//     * @param mixed $firstName
//     */
//    public function setFirstName($firstName): void
//    {
//        $this->firstName = $firstName;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getLastName()
//    {
//        return $this->lastName;
//    }
//
//    /**
//     * @param mixed $lastName
//     */
//    public function setLastName($lastName): void
//    {
//        $this->lastName = $lastName;
//    }
//
//    public function addCourse(Course $course) {
//        $this->courses[] = $course;
//
//    }
//
//}