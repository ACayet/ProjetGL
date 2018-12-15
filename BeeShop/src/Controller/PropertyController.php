<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Produit;


class PropertyController extends AbstractController {

    private $repository;

    public function __construct()
    {
        $this->$repository = $repository;
    }

    /**
     * @Route("/produits", name="property.index")
     * @return Response
     */
    public function index():Response
    {
        $produit = $this->repository->findAll();
        dump($produit);

        return $this->render("property/index.html.twig", [
        "current_menu" => 'properties'
        ]);
    }
}
    