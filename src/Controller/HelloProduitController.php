<?php

namespace App\Controller;
use App\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;
class HelloProduitController extends AbstractController
{
  /**
 * @Rest\RouteResource("produitss")
 */
   /**
     * @param Produit $produit
     *
     * @return View
     */
    public function getAction(Produit $produit): View
    {
        return new View([$produit], Response::HTTP_OK);
    }

    /**
     * @return View
     */
    public function cgetAction(): View
    {
        $produits = $this->getDoctrine()
            ->getRepository(Produit::class)
            ->findAll();

        return new View($produits, Response::HTTP_OK);
    }
}
