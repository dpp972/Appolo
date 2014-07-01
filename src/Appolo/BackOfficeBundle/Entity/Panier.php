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


    /**
     * Set ippanier
     *
     * @param string $ippanier
     * @return Panier
     */
    public function setIppanier($ippanier)
    {
        $this->ippanier = $ippanier;

        return $this;
    }

    /**
     * Get ippanier
     *
     * @return string 
     */
    public function getIppanier()
    {
        return $this->ippanier;
    }

    /**
     * Set numsession
     *
     * @param integer $numsession
     * @return Panier
     */
    public function setNumsession($numsession)
    {
        $this->numsession = $numsession;

        return $this;
    }

    /**
     * Get numsession
     *
     * @return integer 
     */
    public function getNumsession()
    {
        return $this->numsession;
    }

    /**
     * Get idpanier
     *
     * @return integer 
     */
    public function getIdpanier()
    {
        return $this->idpanier;
    }

    /**
     * Add idproduit
     *
     * @param \Appolo\BackOfficeBundle\Entity\Produit $idproduit
     * @return Panier
     */
    public function addIdproduit(\Appolo\BackOfficeBundle\Entity\Produit $idproduit)
    {
        $this->idproduit[] = $idproduit;

        return $this;
    }

    /**
     * Remove idproduit
     *
     * @param \Appolo\BackOfficeBundle\Entity\Produit $idproduit
     */
    public function removeIdproduit(\Appolo\BackOfficeBundle\Entity\Produit $idproduit)
    {
        $this->idproduit->removeElement($idproduit);
    }

    /**
     * Get idproduit
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdproduit()
    {
        return $this->idproduit;
    }
}
