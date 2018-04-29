<?php
//
//namespace App\Entity;
//
//use Doctrine\ORM\Mapping as ORM;
//use App\Entity\Student;
//
///**
// * @ORM\Entity(repositoryClass="App\Repository\CourseRepository") // Repository
// */
//class Course
//{
//    /**
//     * @ORM\Id()
//     * @ORM\GeneratedValue()
//     * @ORM\Column(type="integer")
//     */
//    private $id;
//
//    /**
//     * @ORM\Column(type="string")
//     */
//    private $name;
//
//    /**
//     * @ORM\ManyToMany(targetEntity="Student", mappedBy="courses")
//     */
//    private $students;
//
//    public function __construct() {
//        $this->students = new \Doctrine\Common\Collections\ArrayCollection();
//    }
//
//    public function getId()
//    {
//        return $this->id;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getName()
//    {
//        return $this->name;
//    }
//
//    /**
//     * @param mixed $name
//     */
//    public function setName($name): void
//    {
//        $this->name = $name;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getStudents()
//    {
//        return $this->students;
//    }
//
//
//    public function addStudent(Student $student) {
//        $this->students[] = $student;
//        $student->addCourse($this);
//
//        return $this;
//    }
//
//
//
//}
