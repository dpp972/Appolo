<?php

namespace Appolo\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 *
 * @ORM\Table(name="categorie")
 * @ORM\Entity
 */
class Categorie
{
    /**
     * @var string
     *
     * @ORM\Column(name="libelleCategorie", type="text", nullable=true)
     */
    private $libellecategorie;

    /**
     * @var integer
     *
     * @ORM\Column(name="idCategorie", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcategorie;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Appolo\BackOfficeBundle\Entity\Modeleproduit", mappedBy="idcategorie")
     */
    private $idmdlp;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idmdlp = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
