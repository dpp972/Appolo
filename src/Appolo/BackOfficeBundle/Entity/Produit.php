<?php

namespace Appolo\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit", indexes={@ORM\Index(name="FK_Produit_idMdlP", columns={"idMdlP"})})
 * @ORM\Entity
 */
class Produit
{
    /**
     * @var string
     *
     * @ORM\Column(name="refProduit", type="text", nullable=false)
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
     * @var \Appolo\BackOfficeBundle\Entity\Modeleproduit
     *
     * @ORM\ManyToOne(targetEntity="Appolo\BackOfficeBundle\Entity\Modeleproduit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idMdlP", referencedColumnName="idMdLP")
     * })
     */
    private $idmdlp;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Appolo\BackOfficeBundle\Entity\Panier", mappedBy="idproduit")
     */
    private $idpanier;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idpanier = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set idmdlp
     *
     * @param \Appolo\BackOfficeBundle\Entity\Modeleproduit $idmdlp
     * @return Produit
     */
    public function setIdmdlp(\Appolo\BackOfficeBundle\Entity\Modeleproduit $idmdlp = null)
    {
        $this->idmdlp = $idmdlp;

        return $this;
    }

    /**
     * Get idmdlp
     *
     * @return \Appolo\BackOfficeBundle\Entity\Modeleproduit 
     */
    public function getIdmdlp()
    {
        return $this->idmdlp;
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
}
