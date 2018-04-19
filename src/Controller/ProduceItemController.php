<?php

namespace App\Controller;

use App\Entity\ProduceItem;
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

        return $this->render('new-produce-item.html.twig', ['form' => $form-createView()]);
//        $pItem = new ProduceItem("", new \DateTime(""), new ChoiceType());
//
//        $form = $this->createForm(ProduceItemType::class, $pItem);
//
//        $form->handleRequest($request);
//
//        if($form->isSubmitted()) {
//            return new Response(
//                '<html><body>New Produce Item was added: ' . $pItem->getName()
//                . ' on ' . $pItem->getExpirationDate()->format('Y-m-d')
//                . ' with Icon: ' . $pItem->getIcon()->getIconImage()
//                . '</body></html>'
//            );
//        }
//
//        return $this->render('new-produce-item.html.twig', ['produce_item_form' => $form->createView()]);
    }

    /**
     * @Route("/items", name="produce_list")
     */
    public function list() {
        $repository = $this->getDoctrine()->getRepository(ProduceItem::class);

        $items = $repository->findAll();

        return $this->render('produce_list.html.twig', ['items' => $items]);
    }
}
