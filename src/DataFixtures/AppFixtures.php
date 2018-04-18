<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Course;
use App\Entity\Student;

class AppFixtures extends Fixture {

    private $studentFirstNames = [
        'Guy', 'Cecil', 'Timmy', 'Al', 'Scald', 'Billy Bob', 'Brian', 'Sherry', 'Terry', 'Shiela'
    ];

    private $studentLastNames = [
        'Borland', 'Peppers', 'Shieka', 'Twizzle', 'Galtar', 'Lionel', 'Johnson', 'Jackson', 'Benson', 'Halson'
    ];

    private $classNames = [
        'cis-101', 'cis-102', 'cis-103', 'cis-104', 'cis-105', 'cis-106', 'cis-107', 'cis-108', 'cis-109', 'cis-121'
    ];

    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < sizeof($this->classNames); $i++) {
            $course = new Course();
            $course->setName($this->classNames[$i]);
            $student = new Student();
            $student->setFirstName($this->studentFirstNames[$i]);
            $student->setLastName($this->studentLastNames[$i]);

            $manager->persist($student);

            $course->addStudent($student);

            $manager->persist($course);
        }

        //execute the query
        $manager->flush();
    }

}