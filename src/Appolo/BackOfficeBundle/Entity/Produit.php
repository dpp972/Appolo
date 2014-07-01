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


    /**
     * Set refproduit
     *
     * @param string $refproduit
     * @return Produit
     */
    public function setRefproduit($refproduit)
    {
        $this->refproduit = $refproduit;

        return $this;
    }

    /**
     * Get refproduit
     *
     * @return string 
     */
    public function getRefproduit()
    {
        return $this->refproduit;
    }

    /**
     * Get idproduit
     *
     * @return integer 
     */
    public function getIdproduit()
    {
        return $this->idproduit;
    }

    /**
     * Add idpanier
     *
     * @param \Appolo\BackOfficeBundle\Entity\Panier $idpanier
     * @return Produit
     */
    public function addIdpanier(\Appolo\BackOfficeBundle\Entity\Panier $idpanier)
    {
        $this->idpanier[] = $idpanier;

        return $this;
    }

    /**
     * Remove idpanier
     *
     * @param \Appolo\BackOfficeBundle\Entity\Panier $idpanier
     */
    public function removeIdpanier(\Appolo\BackOfficeBundle\Entity\Panier $idpanier)
    {
        $this->idpanier->removeElement($idpanier);
    }

    /**
     * Get idpanier
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdpanier()
    {
        return $this->idpanier;
    }

    /**
     * Add idmdlp
     *
     * @param \Appolo\BackOfficeBundle\Entity\Modeleproduit $idmdlp
     * @return Produit
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
}
