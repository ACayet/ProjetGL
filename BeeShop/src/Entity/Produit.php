<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Cocur\Slugify\Slugify;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 */
class Produit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $idProduit;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomProduit="";


    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     * @Assert\GreaterThan(0)
     */
    private $prix;


    /**
     * @ORM\Column(type="integer")
     */
    private $stock;

    /**
     * @ORM\Column(type="integer")
     * @Assert\GreaterThan(0)
     */
    private $quantite;

    private $slug;

    public function getSlug():string
    {
        return $this->slug = (new Slugify())->slugify($this->nomProduit);
    }

    // public function getSlug()
    // {
    //     return $this->slug;
    // }

    // public function setSlug(String $slug): self
    // {
    //     $this->slug = $slug;

    //     return $this;
    // }
    

    public function getIdProduit(): int
    {
        return $this->idProduit;
    }

    public function getNomProduit(): string
    {
        return $this->nomProduit;
    }



    public function setNomProduit(string $nomProduit): self
    {
        $this->nomProduit = $nomProduit;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function setPrix($prix): self
    {
        $this->prix = $prix;

        return $this;
    }
    
    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }
}
