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


    /**
     * Set libellecategorie
     *
     * @param string $libellecategorie
     * @return Categorie
     */
    public function setLibellecategorie($libellecategorie)
    {
        $this->libellecategorie = $libellecategorie;
    
        return $this;
    }

    /**
     * Get libellecategorie
     *
     * @return string 
     */
    public function getLibellecategorie()
    {
        return $this->libellecategorie;
    }

    /**
     * Get idcategorie
     *
     * @return integer 
     */
    public function getIdcategorie()
    {
        return $this->idcategorie;
    }

    /**
     * Add idmdlp
     *
     * @param \Appolo\BackOfficeBundle\Entity\Modeleproduit $idmdlp
     * @return Categorie
     */
    public function addIdmdlp(\Appolo\BackOfficeBundle\Entity\Modeleproduit $idmdlp)
    {
        $this->idmdlp[] = $idmdlp;
    
        return $this;
    }

    /**
     * Remove idmdlp
     *
     * @param \Appolo\BackOfficeBundle\Entity\Modeleproduit $idmdlp
     */
    public function removeIdmdlp(\Appolo\BackOfficeBundle\Entity\Modeleproduit $idmdlp)
    {
        $this->idmdlp->removeElement($idmdlp);
    }

    /**
     * Get idmdlp
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdmdlp()
    {
        return $this->idmdlp;
    }

    /*----------------------------------------------------------------------------------------------------------------*/

    public function arrayView(){

        return array(
            'id' => $this->idcategorie,
            'libelle' => $this->libellecategorie,
        );
    }
}
