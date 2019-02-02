<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\FormTypeInterface;
use App\Repository\ArticleRepository;
use App\Entity\Article;
use App\Form\ArticleType;

/**
 * Controleur pour l'administration des pages de blog
 * ajout, suppression, edition d'articles de blog
 */
class AdminBlogController extends AbstractController 
{
    /**
     * @var ProduitRepository
     */
    private $repository;

    /**
     * @var ObjectManager
     */
    private $em;

    public function __construct(ArticleRepository $repository, ObjectManager $em)
    {
        $this->repository=$repository;
        $this->em = $em;
    }

    /**
     * @Route("/{_locale}/admin/blog", name="admin.blog.index") 
     * @return Response
     */
    public function index()
    {
        $articles = $this->repository->findAll();
        return $this->render('admin/blog/index.html.twig', [
            'articles'=> $articles
        ]);

    }

    /**
     * @Route("/{_locale}/admin/blog/create", name="admin.blog.new")
     * @param Article $article
     * @param Request $request
     * @return Response
     */
    public function new(Request $request){
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($article);
            $this->em->flush();
            $this->addFlash('success', "Article ajouté avec succès");
            return $this->redirectToRoute('admin.blog.index');
        }

        return $this->render('admin/blog/new.html.twig', [
            'articles' => $article,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/{_locale}/admin/blog/{id}", name="admin.blog.edit", methods="GET|POST")
     * @param Article $article
     * @param Request $request
     * @return Response
     */
    public function edit(Article $article, Request $request  )
    {
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted()&& $form->isValid()) {
            $this->em->flush();
            $this->addFlash('success', "Produit modifié avec succès");
            return $this->redirectToRoute("admin.blog.index");
        }
        return $this->render('admin/blog/edit.html.twig', [
            'articles' => $article,
            'form' => $form->createView()
        ]);

    }

    /**
     * @Route("/{_locale}/admin/blog/{id}", name="admin.blog.delete", methods="DELETE")
     */
    public function delete(Article $article, Request $request){
       // dump('suppression');
        if($this->isCsrfTokenValid('delete', $request->get('_token'))) {
            $this->em->remove($article);
            $this->em->flush();
            $this->addFlash('success', "Article supprimé avec succès");
        }else{
            $this->addFlash('error', "Erreur token invalide");
        }
        return $this->redirectToRoute('admin.blog.index');
    }
}   