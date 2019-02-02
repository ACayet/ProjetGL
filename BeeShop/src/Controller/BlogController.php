<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;
use App\Entity\Article;
use Symfony\Component\HttpFoundation\Response;

/**
 * Controleur pour l'affichage du blog:
 * liste des articles et l'affichage d'un article 
 */
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
     * @Route("/{_locale}/blog", name="blog")
     * @return Response
     */
    public function index():Response
    {
        $article = $this-> repository ->articlesPublished();
        //dump($article);
        return $this->render("blog/index.html.twig", [
        'current_menu' => "articles",
        'articles' => $article
        ]);
    }

    /**
     * @Route("/{_locale}/blog/{slug}-{id}", name="art.show", requirements={"slug":"[a-z0-9\-]*"})
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
}
