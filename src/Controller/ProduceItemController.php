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
     * @Route("/new-produce-item", name="new_produce_item")
     */
    public function new(Request $request) {
        $pItem = new ProduceItem();

        // Set flag to NOT inside shopping list
        $pItem->setIsInShoppingList(false);

        $form = $this->createForm(ProduceItemType::class, $pItem);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($pItem);
            $entityManager->flush();

            return new Response('New produce item added to the database as item number ' . $pItem->getId() .
                '<br><a href="items/refrigerator">View My Refrigerator</a>
                 <br><a href="items/shopping-list">View My Shopping List</a>
                 <br><a href="new-produce-item">Back to New Produce Item</a></body></html>');
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

    /**
     * @Route("/items/refrigerator", name="refrigerator")
     */
    public function listRefrigeratorItemsByDate() {
        $repository = $this->getDoctrine()->getRepository(ProduceItem::class);

        $items = $repository->getRefrigeratorItems();
        //findBy(array('isInShoppingList' => false));

        return $this->render('produce_list.html.twig', ['items' => $items]);
    }

}