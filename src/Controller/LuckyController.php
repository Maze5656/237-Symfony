<?php

namespace App\Controller;

use Doctrine\ORM\Query\Expr\Base;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;

class LuckyController extends BaseController {
    # This is a custom named route path
    /**
     * @Route("/lucky/number")
     */
    public function number()
    {
        $number = mt_rand(0, 100);

        return $this->render('lucky_number.html.twig', ['random_number' => $number,
            'users' => [
                [ 'username' => 'jack'],
                [ 'username' => 'ripp']
            ]
        ]);

//        return new Response(
//            '<html><body>Lucky number: '.$number.'</body></html>'
//        );
    }
}