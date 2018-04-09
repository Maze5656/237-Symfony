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
        $icon = new Icon("new icon", "");

        $form = $this->createForm(IconType::class, $icon);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $iconFile = $icon->getIconImage();
            $fileName = md5(uniqid()) . '.' . $iconFile->guessExtension();

            $rootDirPath = $this->get('kernel')->getRootDir() . '/../public/uploads';
            $iconFile->move($rootDirPath, $fileName);

            $icon->setIconImage($fileName);

            return new Response(
                '<html><body>New Icon was added: ' . $icon->getIconName() . ' right now ' .
                ' Hashed file name: ' . $icon->getIconImage() . '<img src="/uploads/' . $icon->getIconImage() . '"/></body></html>'
            );
        }

        return $this->render('new-icon.html.twig', ['icon_form' => $form->createView()]);

    }
}