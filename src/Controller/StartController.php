<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;
use Symfony\Component\Routing\Annotation\Route;

class StartController extends BaseController {

    /**
     * @Route("/", name="start")
     */
    public function index() {

        return $this->render('start.html.twig');
    }

}