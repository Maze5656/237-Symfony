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
        $pItem = new ProduceItem("", new \DateTime(""), new ChoiceType());

        $form = $this->createForm(ProduceItemType::class, $pItem);

        $form->handleRequest($request);

        if($form->isSubmitted()) {
            $iconFile = $pItem->getIcon();
//            $fileName = md5(uniqid()) . '.' . $iconFile->guessExtension();
//
//            $rootDirPath = $this->get('kernel')->getRootDir() . '/../public/uploads';
//            $iconFile->move($rootDirPath, $fileName);
//
//            $pItem->setIcon($fileName);

            return new Response(
                '<html><body>New Produce Item was added: ' . $pItem->getName() . ' on ' . $pItem->getExpirationDate()->format('Y-m-d') .
               '</body></html>'
            );
        }

        return $this->render('new-produce-item.html.twig', ['produce_item_form' => $form->createView()]);
    }
}