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
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

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

        return $this->render('new-produce-item.html.twig', ['produce_item_form' => $form->createView(), 'label' => 'New Produce Item']);
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

    /**
     * @Route("/items/refrigerator/{id}"), name="get_refItem")
     * @Method("GET")
     */
    public function getRefItem(int $id) {
        $repo = $this->getDoctrine()->getRepository(ProduceItem::class);

        $rItem = $repo->find($id);

        return $this->render('produce_list.html.twig', ['rItem' => $rItem]);
    }

    /**
     * @Route("/items/refrigerator/{id}", name="delete_refItem")
     * @Method("DELETE")
     */
    public function deleteRefItem(int $id) {
        $repo = $this->getDoctrine()->getRepository(ProduceItem::class);
        $rItem = $repo->find($id);

        $em = $this->getDoctrine()->getManager();
        // remove from the database
        $em->remove($rItem);
        $em->flush();

        return new JsonResponse([], Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/items/{id}/edit", name="edit_refItem")
     *
     */
    public function editRefItem(int $id, Request $request) {
        $repo = $this->getDoctrine()->getRepository(ProduceItem::class);
        $rItem = $repo->find($id);

        $form = $this->createForm(ProduceItemType::class, $rItem);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($rItem);
            $entityManager->flush();

            return new Response('Produce Item ' . $rItem->getId() . ' was updated. ' .
                '<br><a href="../refrigerator">View My Refrigerator</a>');
        }

        return $this->render('new-produce-item.html.twig', ['produce_item_form' => $form->createView(), 'label' => 'Edit Produce Item']);
    }

    /**
     * @Route("/items/{id}", name="ajax_edit_refItem")
     * @Method("PUT")
     */
    public function ajaxEditRefItem(int $id, Request $request) {
        $rItem = $this->getDoctrine()->getRepository(ProduceItem::class)->find($id);

        //extract data from request
        $data = $request->request->all();

        // Save that data to a ProduceItem
        $form = $this->createForm(ProduceItemType::class, $rItem);
        $form->submit($data);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($rItem);
        $entityManager->flush();

        return new JsonResponse([], Response::HTTP_OK);
    }

    // Move an item to the shopping list
    /**
     * @Route("items/refrigerator/{id}", name="ref_to_list")
     * @Method("PUT")
     */
    public function moveToShoppingList(int $id) {
        $rItem = $this->getDoctrine()->getRepository(ProduceItem::class)->find($id);
        $rItem->setIsInShoppingList(true);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($rItem);
        $entityManager->flush();

        return new JsonResponse([], Response::HTTP_OK);
    }

}