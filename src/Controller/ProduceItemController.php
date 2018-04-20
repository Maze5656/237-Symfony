<?php

namespace App\Controller;

use App\Entity\ProduceItem;
use App\Entity\Icon;
use App\Form\IconType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ProduceItemType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProduceItemController extends BaseController {

    /**
     * @Route("/new-produce-item")
     */
    public function new(Request $request) {
        $pItem = new ProduceItem();

        $form = $this->createForm(ProduceItemType::class, $pItem);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($pItem);
            $entityManager->flush();

            return new Response('New produce item was added to the database as item number ' . $pItem->getId());
        }

        return $this->render('new-produce-item.html.twig', ['produce_item_form' => $form->createView()]);
    }

    /**
     * list function to list all produceItems and all Icon Names
     * @Route("/items", name="produce_list")
     */
    public function list() {
        $repository = $this->getDoctrine()->getRepository(ProduceItem::class);
        $iconRepository = $this->getDoctrine()->getRepository(Icon::class);

        $items = $repository->findAll();
        $icons = $iconRepository->findAll();

        return $this->render('produce_list.html.twig', [
                                    'items' => $items,
                                    'iconNames' => $icons
                                ]
        );
    }

//    /**
//     * @Route("/items", name="produce_list")
//     */
//    public function getDate(str $expirationDate) {
//        $repository = $this->getDoctrine()->getRepository(ProduceItem::class);
//
//        $students = $repository->find($expirationDate);
//
//        return $this->render('student/student.html.twig', ['student' => $students]);
//    }
}