<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;
use App\Entity\Article;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends AbstractController
{

    /**
     * @Var ProduitRepository
     */
    private $repository;
    

    
    public function __construct(ArticleRepository $repository)
    {
        $this->repository = $repository;
 
    }

    /**
     * @Route("/blog", name="blog")
     * @return Response
     */
    public function index():Response
    {
        $article = $this-> repository ->articlesPublies();
        dump($article);
        return $this->render("blog/index.html.twig", [
        'current_menu' => "articles",
        'articles' => $article
        ]);
    }

    /**
     * @Route("/blog/{slug}-{id}", name="art.show", requirements={"slug":"[a-z0-9\-]*"})
     * @param Article $article
     * @return Response
     */
    public function show(Article $article, string $slug):Response{
        if ($article->getSlug() !== $slug){
            return $this->redirectToRoute('art.show',[
                'id'=> $article->getId(),
                'slug'=> $article->getSlug(),
            ],301);
        }
        return $this->render("blog/show.html.twig",[
            'article' => $article,
            'current_menu' => "articles"
        ]);
    }

    // /**
    //  * @Route("/blog", name="blog")
    //  */
    // public function index()
    // {
    //     return $this->render('blog/index.html.twig', [
    //         'controller_name' => 'BlogController',
    //     ]);
    // }

   
}
