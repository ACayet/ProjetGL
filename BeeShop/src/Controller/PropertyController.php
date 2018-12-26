<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Doctrine\Common\Persistence\ObjectManager;

class PropertyController extends AbstractController {

    /**
     * @Var ProduitRepository
     */
    private $repository;
    
    /**
     * @Var ObjectManager
     */
    private $em;

    
    public function __construct(ProduitRepository $repository, ObjectManager $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/produits", name="property.index")
     * @return Response
     */
    public function index():Response
    {
        $prod = $this-> repository ->produitsDispo();
        dump($prod);
        return $this->render("produits/index.html.twig", [
        "current_menu" => 'properties',
        "produits" => $prod
        ]);
    }

    // /**
    //  * @Route("/produits/{slug}-{id}", name="prop.show", requirements={"slug":"[a-z0-9\-]*"})
    //  * @return Response
    //  */
    // public function show($slug, $id):Response
    // {
    //     $prop = $this->repository->find($id);
    //     return $this->render("produits/show.html.twig",[
    //         'property' => $prop,
    //         'current_menu' => "properties"
    //     ]);
    // }
}
    