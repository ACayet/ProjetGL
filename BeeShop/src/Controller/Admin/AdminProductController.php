<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\ProduitRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Produit;
use App\Form\ProduitType;

class AdminProductController extends AbstractController

{
    /**
     * @var ProduitRepository
     */
    private $repository;

    public function __construct(ProduitRepository $repository)
    {
        $this->repository=$repository;
    }

    /**
     * @Route("/admin", name="admin.property.index") 
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
     * @Route("/admin/{id}", name="admin.property.edit")
     * @param Produit $prop
     * @return Response
     */
    public function edit(Produit $prop )
    {
        $form = $this->createForm(ProduitType::class, $prop);
        return $this->render('admin/produits/edit.html.twig', [
            'produits' => $prop,
            'form' => $form->createView()
        ]);

    }
}