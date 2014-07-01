<?php

namespace Appolo\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity
 */
class Produit
{
    /**
     * @var string
     *
     * @ORM\Column(name="refProduit", type="text", nullable=true)
     */
    private $refproduit;

    /**
     * @var integer
     *
     * @ORM\Column(name="idProduit", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idproduit;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Appolo\BackOfficeBundle\Entity\Panier", mappedBy="idproduit")
     */
    private $idpanier;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Appolo\BackOfficeBundle\Entity\Modeleproduit", mappedBy="idproduit")
     */
    private $idmdlp;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idpanier = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idmdlp = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
