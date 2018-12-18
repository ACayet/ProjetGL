<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController{
    
    /**
     * @Route("/blog", name="article.index", methods={"GET","HEAD"})
     * @return Response
     * */
    public function index():Response
    {
        return $this->render("blog/article.html.twig", [
        "current_menu" => 'articles'
        ]);
    }
}
