<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Course;
use App\Form\CourseType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CourseController extends Controller
{
    /**
     * @Route("/new-course", name="new_course")
     */
    public function index(Request $request)
    {
        $course = new Course();
        $form = $this->createForm(CourseType::class, $course);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $course->addStudent($course->getStudents()[0]);
//            var_dump($course->getStudents());
//            die();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($course);
            $entityManager->flush();

            return new Response('New course added to the database.');
        }
        return $this->render('course/index.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/courses/{course}", name="courses")
     */
    public function listByCourse(Request $request, $course) {
        $repository = $this->getDoctrine()->getRepository(Course::class);

        $courses = $repository->findAllStudentsByCourse($course);

        return $this->render('course/list.html.twig', ['courses' => $courses]);
    }
}
