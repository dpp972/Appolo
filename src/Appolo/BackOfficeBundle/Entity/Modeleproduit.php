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
     * @ORM\Column(name="nomMdlP", type="text", nullable=false)
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
     * Constructor
     */
    public function __construct()
    {
        $this->idcategorie = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set nommdlp
     *
     * @param string $nommdlp
     * @return Modeleproduit
     */
    public function setNommdlp($nommdlp)
    {
        $this->nommdlp = $nommdlp;
    
        return $this;
    }

    /**
     * Get nommdlp
     *
     * @return string 
     */
    public function getNommdlp()
    {
        return $this->nommdlp;
    }

    /**
     * Set descriptionmdlp
     *
     * @param string $descriptionmdlp
     * @return Modeleproduit
     */
    public function setDescriptionmdlp($descriptionmdlp)
    {
        $this->descriptionmdlp = $descriptionmdlp;
    
        return $this;
    }

    /**
     * Get descriptionmdlp
     *
     * @return string 
     */
    public function getDescriptionmdlp()
    {
        return $this->descriptionmdlp;
    }

    /**
     * Set prixmdlp
     *
     * @param string $prixmdlp
     * @return Modeleproduit
     */
    public function setPrixmdlp($prixmdlp)
    {
        $this->prixmdlp = $prixmdlp;
    
        return $this;
    }

    /**
     * Get prixmdlp
     *
     * @return string 
     */
    public function getPrixmdlp()
    {
        return $this->prixmdlp;
    }

    /**
     * Get idmdlp
     *
     * @return integer 
     */
    public function getIdmdlp()
    {
        return $this->idmdlp;
    }

    /**
     * Add idcategorie
     *
     * @param \Appolo\BackOfficeBundle\Entity\Categorie $idcategorie
     * @return Modeleproduit
     */
    public function addIdcategorie(\Appolo\BackOfficeBundle\Entity\Categorie $idcategorie)
    {
        $this->idcategorie[] = $idcategorie;
    
        return $this;
    }

    /**
     * Remove idcategorie
     *
     * @param \Appolo\BackOfficeBundle\Entity\Categorie $idcategorie
     */
    public function removeIdcategorie(\Appolo\BackOfficeBundle\Entity\Categorie $idcategorie)
    {
        $this->idcategorie->removeElement($idcategorie);
    }

    /**
     * Get idcategorie
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdcategorie()
    {
        return $this->idcategorie;
    }
}
