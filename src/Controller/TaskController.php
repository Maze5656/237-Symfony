<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Task;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends BaseController {

    /**
     * @Route("/new-task")
     */
    public function new(Request $request) {
        $task = new Task("Need to wash the dishes", new \DateTime("today"));

        $form = $this->createFormBuilder($task)
            ->add('description', TextareaType::class)
            ->add('dueDate', DateType::class)
            ->add('save', SubmitType::class, ['label' => 'Create new Task'])
            ->getForm();

        $form->handleRequest($request);
        if($form->isSubmitted()) {
            print("<pre>" . print_r($form->getData(), true). '</pre>');
            $task = $form->getData();
            return new Response(
                '<html><body>New task was added: ' . $task->getDescription() . ' on ' . $task->getDueDate()->format('Y-m-d') . '</body></html>'
            );
        }

        return $this->render('new-task.html.twig', ['task_form' => $form->createView()]);
    }
}