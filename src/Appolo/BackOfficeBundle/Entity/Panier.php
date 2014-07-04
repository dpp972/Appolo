<?php

namespace Appolo\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Panier
 *
 * @ORM\Table(name="panier", indexes={@ORM\Index(name="FK_Panier_idUser", columns={"idUser"})})
 * @ORM\Entity
 */
class Panier
{
    /**
     * @var string
     *
     * @ORM\Column(name="ipUserPanier", type="text", nullable=true)
     */
    private $ipuserpanier;

    /**
     * @var string
     *
     * @ORM\Column(name="numSessPanier", type="text", nullable=true)
     */
    private $numsesspanier;

    /**
     * @var integer
     *
     * @ORM\Column(name="idPanier", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpanier;

    /**
     * @var \Appolo\BackOfficeBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Appolo\BackOfficeBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUser", referencedColumnName="idUser")
     * })
     */
    private $iduser;

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
     * Set ipuserpanier
     *
     * @param string $ipuserpanier
     * @return Panier
     */
    public function setIpuserpanier($ipuserpanier)
    {
        $this->ipuserpanier = $ipuserpanier;

        return $this;
    }

    /**
     * Get ipuserpanier
     *
     * @return string 
     */
    public function getIpuserpanier()
    {
        return $this->ipuserpanier;
    }

    /**
     * Set numsesspanier
     *
     * @param string $numsesspanier
     * @return Panier
     */
    public function setNumsesspanier($numsesspanier)
    {
        $this->numsesspanier = $numsesspanier;

        return $this;
    }

    /**
     * Get numsesspanier
     *
     * @return string 
     */
    public function getNumsesspanier()
    {
        return $this->numsesspanier;
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
     * Set iduser
     *
     * @param \Appolo\BackOfficeBundle\Entity\User $iduser
     * @return Panier
     */
    public function setIduser(\Appolo\BackOfficeBundle\Entity\User $iduser = null)
    {
        $this->iduser = $iduser;

        return $this;
    }

    /**
     * Get iduser
     *
     * @return \Appolo\BackOfficeBundle\Entity\User 
     */
    public function getIduser()
    {
        return $this->iduser;
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
