<?php

namespace Appolo\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Modeleproduit
 *
 * @ORM\Table(name="modeleproduit")
 * @ORM\Entity
 */
class Modeleproduit
{
    /**
     * @var string
     *
     * @ORM\Column(name="nomMdlP", type="text", nullable=true)
     */
    private $nommdlp;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionMdlP", type="text", nullable=true)
     */
    private $descriptionmdlp;

    /**
     * @var string
     *
     * @ORM\Column(name="prixMdLP", type="text", nullable=true)
     */
    private $prixmdlp;

    /**
     * @var integer
     *
     * @ORM\Column(name="idMdLP", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmdlp;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Appolo\BackOfficeBundle\Entity\Categorie", inversedBy="idmdlp")
     * @ORM\JoinTable(name="associercategorie",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idMdLP", referencedColumnName="idMdLP")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idCategorie", referencedColumnName="idCategorie")
     *   }
     * )
     */
    private $idcategorie;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Appolo\BackOfficeBundle\Entity\Produit", inversedBy="idmdlp")
     * @ORM\JoinTable(name="appartenirmdlp",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idMdLP", referencedColumnName="idMdLP")
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
        $this->idcategorie = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idproduit = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
