<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProduitRepository;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ApiResource(formats={"xml", "jsonld", "csv"={"text/csv"}})
 * @ORM\Entity(repositoryClass=ProduitRepository::class)

 * @Serializer\ExclusionPolicy("NONE")
 */
class Produit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Serializer\Until("1.2")
     */
    private $id;

    /**
     * @Serializer\Since("1.2")
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     *@Serializer\Since("1.1")
     * @ORM\Column(type="integer")
     */
    private $quantite;

    /**
     *@Serializer\Since("1.3")
     * @ORM\Column(type="float")
     */
    private $prix;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

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

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }
}
