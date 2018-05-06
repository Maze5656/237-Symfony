<?php

namespace App\Controller;

use App\Entity\ProduceItem;
use App\Entity\Icon;
use App\Form\IconType;
use App\Form\ShoppingListItemType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class ShoppingListController extends BaseController {

    /**
     * @Route("/new-shopping-list-item", name="new_shopping_list_item")
     */
    public function new(Request $request) {
        $pItem = new ProduceItem();

        // Set flag to inside shopping list
        $pItem->setIsInShoppingList(true);

        $form = $this->createForm(ShoppingListItemType::class, $pItem);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($pItem);
            $entityManager->flush();

            return new Response('Item added to Shopping List.' .
                '<br><a href="items/refrigerator">View My Refrigerator</a>
                 <br><a href="items/shopping-list">View My Shopping List</a>
                 <br><a href="new-produce-item">Back to New Shopping List Item</a></body></html>');
        }

        return $this->render('new-shopping-list-item.html.twig', ['shopping_item_form' => $form->createView()]);
    }

    /**
     * @Route("/items/shopping-list", name="shopping_list")
     */
    public function listAllShoppingList() {
        $repository = $this->getDoctrine()->getRepository(ProduceItem::class);

        $items = $repository->getShoppingListItems();

        return $this->render('shopping_list.html.twig', ['items' => $items]);
    }

    /**
     * @Route("items/shopping-list-download", name="shopping_list_download")
     */
    public function download() {
        $repository = $this->getDoctrine()->getRepository(ProduceItem::class);

        $items = $repository->getShoppingListItems();
        $fileName = 'shopping_list.txt';

        $fp = fopen($fileName, 'w');

        $content = '';

        foreach($items as $item) {
            $iName = $item->getName();
            $content .= "$iName \n";
        }

        fwrite($fp, $content);
        fclose($fp);

        return $this->file($fileName);
    }

    /**
     * @Route("items/shopping-list/{id}", name="list-to-ref")
     * @Method("PUT")
     */
    public function moveToRefrigerator(int $id) {
        $rItem = $this->getDoctrine()->getRepository(ProduceItem::class)->find($id);
        $rItem->setIsInShoppingList(false);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($rItem);
        $entityManager->flush();

        return new JsonResponse([], Response::HTTP_OK);
    }

}