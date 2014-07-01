<?php

namespace Appolo\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Panier
 *
 * @ORM\Table(name="panier")
 * @ORM\Entity
 */
class Panier
{
    /**
     * @var string
     *
     * @ORM\Column(name="ipPanier", type="text", nullable=true)
     */
    private $ippanier;

    /**
     * @var integer
     *
     * @ORM\Column(name="numSession", type="integer", nullable=true)
     */
    private $numsession;

    /**
     * @var integer
     *
     * @ORM\Column(name="idPanier", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpanier;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Appolo\BackOfficeBundle\Entity\Produit", inversedBy="idpanier")
     * @ORM\JoinTable(name="contenirproduit",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idPanier", referencedColumnName="idPanier")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idProduit", referencedColumnName="idProduit")
     *   }
     * )
     */
    private $idproduit;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idproduit = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
