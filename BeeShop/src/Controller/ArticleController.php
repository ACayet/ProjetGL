<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Doctrine\Common\Persistence\ObjectManager;

class ArticleController extends Abstractcontroller{
    
    
    /**
     * @Route("/articles", name="article.index")
     * @return Response
     */
    public function index():Response
    {
        return $this->render("blog/article.html.twig", [
        "current_menu" => 'articles'
        ]);
    }
}
