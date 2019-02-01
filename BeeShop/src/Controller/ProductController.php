<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Controleur pour l'affichage des produits :
 * liste des produits et l'affichage d'un produit 
 */
class ProductController extends AbstractController
{

    /**
     * @Var ProduitRepository
     */
    private $repository;

    public function __construct(ProduitRepository $repository)
    {
        $this->repository = $repository;
       
    }

    /**
     * @Route("/produits", name="produit.index")
     * @return Response
     */
    public function index(): Response
    {
        $prod = $this->repository->productsAvailable();
       // dump($prod);
        return $this->render("produits/index.html.twig", [
            "current_menu" => 'properties',
            "produits" => $prod,
        ]);
    }

    /**
     * @Route("/produits/{slug}-{id}", name="prop.show", requirements={"slug":"[a-z0-9\-]*"})
     * @param Produit $prop
     * @return Response
     */
    public function show(Produit $prop, string $slug): Response
    {
        if ($prop->getSlug() !== $slug) {
            return $this->redirectToRoute('prop.show', [
                'id' => $prop->getIdProduit(),
                'slug' => $prop->getSlug(),
            ], 301);
        }

        return $this->render("produits/show.html.twig", [
            'produit' => $prop,
            'current_menu' => "properties",
        ]);
    }
}
