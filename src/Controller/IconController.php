<?php

namespace App\Controller;

use App\Entity\Icon;
use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\IconType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IconController extends BaseController {

    /**
     * @Route("/new-icon", name="icon")
     */
    public function new(Request $request)
    {
        $icon = new Icon();

        $form = $this->createForm(IconType::class, $icon);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $file = $icon->getIconImage();
            $fileName = md5(uniqid()) . '.' . $file->guessExtension();
            $rootDirPath = $this->get('kernel')->getRootDir() . '/../public/uploads';
            $file->move($rootDirPath, $fileName);
            $icon->setIconImage($fileName);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($icon);
            $entityManager->flush();

            return new Response('New icon got added to the database.');
        }

        return $this->render('new-icon.html.twig', ['icon_form' => $form->createView()]);
    }

    /**
     * @Route("/icons", name="icon_list")
     */
    public function list() {
        $repository = $this->getDoctrine()->getRepository(Icon::class);

        $icons = $repository->findAll();

        return $this->render('icon/list.html.twig', ['icons' => $icons]);
    }

}
//            $iconFile = $icon->getIconImage();
//            $fileName = md5(uniqid()) . '.' . $iconFile->guessExtension();
//
//            $rootDirPath = $this->get('kernel')->getRootDir() . '/../public/uploads';
//            $iconFile->move($rootDirPath, $fileName);
//
//            $icon->setIconImage($fileName);
//
//            return new Response(
//                '<html><body>New Icon was added: ' . $icon->getIconName() . ' right now ' .
//                ' Hashed file name: ' . $icon->getIconImage() . '<img src="/uploads/' . $icon->getIconImage() . '"/></body></html>'
//            );
//        }
//
//        return $this->render('new-icon.html.twig', ['icon_form' => $form->createView()]);

