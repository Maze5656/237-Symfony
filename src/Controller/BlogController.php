<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;

class BlogController extends BaseController {

    /**
     * @Route("/blogs/{page}", name="list_blogs", requirements={"page"="\d+"})
     */
    public function list($page = 1) {

        return $this->redirectToRoute('show_one_blog', ['slug' => 'i-am-a-redirect']);

        return new Response(
            '<html><body>You are on page ' . $page . '</body></html>'
        );
    }

    /**
     * @Route("/blogs/{slug}", name="show_one_blog")
     */
    public function getOneBlog($slug) {
        return new Response(
            '<html><body>'. $slug .'</body></html>'
        );
    }
}