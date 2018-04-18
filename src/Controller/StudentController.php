<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Student;
use App\Form\StudentType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentController extends Controller
{
    /**
     * @Route("/new-student", name="student")
     */
    public function index(Request $request)
    {
        $student = new Student();

        $form = $this->createForm(StudentType::class, $student);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            // for saving data to database
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($student);
            $entityManager->flush();

            return new Response('New student got added to the database' . $student->getId());
        }

        return $this->render('student/index.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/students", name="student_list")
     */
    public function list() {
        $repository = $this->getDoctrine()->getRepository(Student::class);

        $students = $repository->findAll();

        return $this->render('student/list.html.twig', ['students' => $students]);
    }

    /**
     * @Route("/students/{id}", name="get_student")
     */
    public function getStudent(int $id) {
        $repository = $this->getDoctrine()->getRepository(Student::class);

        $students = $repository->find($id);

        return $this->render('student/student.html.twig', ['student' => $students]);
    }
}
