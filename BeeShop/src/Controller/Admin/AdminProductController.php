<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\ProduitRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Produit;
use App\Form\ProduitType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\FormTypeInterface;

class AdminProductController extends AbstractController 
{
    /**
     * @var ProduitRepository
     */
    private $repository;

    /**
     * @var ObjectManager
     */
    private $em;

    public function __construct(ProduitRepository $repository, ObjectManager $em)
    {
        $this->repository=$repository;
        $this->em = $em;
    }

    /**
     * @Route("/admin/produit", name="admin.produit.index") 
     * @return Response
     */
    public function index()
    {
        $props = $this->repository->findAll();
        return $this->render('admin/produits/index.html.twig', [
            'produits'=> $props
        ]);

    }

    /**
     * @Route("/admin/produit/create", name="admin.produit.new")
     * @param Produit $prop
     * @param Request $request
     * @return Response
     */
    public function new(Request $request){
        $prop = new Produit();
        $form = $this->createForm(ProduitType::class, $prop);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($prop);
            $this->em->flush();
            $this->addFlash('success', "Produit ajouté avec succès");
            return $this->redirectToRoute('admin.produit.index');
        }

        return $this->render('admin/produits/new.html.twig', [
            'produits' => $prop,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/produit/{id}", name="admin.produit.edit", methods="GET|POST")
     * @param Produit $prop
     * @param Request $request
     * @return Response
     */
    public function edit(Produit $prop, Request $request )
    {
        $form = $this->createForm(ProduitType::class, $prop);
        $form->handleRequest($request);

        if ($form->isSubmitted()&& $form->isValid()) {
            $this->em->flush();
            $this->addFlash('success', "Produit modifié avec succès");
            return $this->redirectToRoute("admin.produit.index");
        }
        return $this->render('admin/produits/edit.html.twig', [
            'produits' => $prop,
            'form' => $form->createView()
        ]);

    }

    /**
     * @Route("/admin/produit/{id}", name="admin.produit.delete", methods="DELETE")
     */
    public function delete(Produit $produit, Request $request){
        //dump('suppression');
        if($this->isCsrfTokenValid('delete', $request->get('_token'))) {
            $this->em->remove($produit);
            $this->em->flush();
            $this->addFlash('success', "Produit supprimé avec succès");
        }
        return $this->redirectToRoute('admin.produit.index');
    }
}   