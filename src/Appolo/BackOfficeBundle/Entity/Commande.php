<?php

namespace Appolo\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande", indexes={@ORM\Index(name="FK_Commande_idAdresse", columns={"idAdresse"}), @ORM\Index(name="FK_Commande_idPanier", columns={"idPanier"})})
 * @ORM\Entity
 */
class Commande
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCmd", type="date", nullable=false)
     */
    private $datecmd;

    /**
     * @var integer
     *
     * @ORM\Column(name="idCmd", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcmd;

    /**
     * @var \Appolo\BackOfficeBundle\Entity\Panier
     *
     * @ORM\ManyToOne(targetEntity="Appolo\BackOfficeBundle\Entity\Panier")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idPanier", referencedColumnName="idPanier")
     * })
     */
    private $idpanier;

    /**
     * @var \Appolo\BackOfficeBundle\Entity\Adresse
     *
     * @ORM\ManyToOne(targetEntity="Appolo\BackOfficeBundle\Entity\Adresse")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idAdresse", referencedColumnName="idAdresse")
     * })
     */
    private $idadresse;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Appolo\BackOfficeBundle\Entity\User", mappedBy="idcmd")
     */
    private $iduser;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->iduser = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set datecmd
     *
     * @param \DateTime $datecmd
     * @return Commande
     */
    public function setDatecmd($datecmd)
    {
        $this->datecmd = $datecmd;
    
        return $this;
    }

    /**
     * Get datecmd
     *
     * @return \DateTime 
     */
    public function getDatecmd()
    {
        return $this->datecmd;
    }

    /**
     * Get idcmd
     *
     * @return integer 
     */
    public function getIdcmd()
    {
        return $this->idcmd;
    }

    /**
     * Set idpanier
     *
     * @param \Appolo\BackOfficeBundle\Entity\Panier $idpanier
     * @return Commande
     */
    public function setIdpanier(\Appolo\BackOfficeBundle\Entity\Panier $idpanier = null)
    {
        $this->idpanier = $idpanier;
    
        return $this;
    }

    /**
     * Get idpanier
     *
     * @return \Appolo\BackOfficeBundle\Entity\Panier 
     */
    public function getIdpanier()
    {
        return $this->idpanier;
    }

    /**
     * Set idadresse
     *
     * @param \Appolo\BackOfficeBundle\Entity\Adresse $idadresse
     * @return Commande
     */
    public function setIdadresse(\Appolo\BackOfficeBundle\Entity\Adresse $idadresse = null)
    {
        $this->idadresse = $idadresse;
    
        return $this;
    }

    /**
     * Get idadresse
     *
     * @return \Appolo\BackOfficeBundle\Entity\Adresse 
     */
    public function getIdadresse()
    {
        return $this->idadresse;
    }

    /**
     * Add iduser
     *
     * @param \Appolo\BackOfficeBundle\Entity\User $iduser
     * @return Commande
     */
    public function addIduser(\Appolo\BackOfficeBundle\Entity\User $iduser)
    {
        $this->iduser[] = $iduser;
    
        return $this;
    }

    /**
     * Remove iduser
     *
     * @param \Appolo\BackOfficeBundle\Entity\User $iduser
     */
    public function removeIduser(\Appolo\BackOfficeBundle\Entity\User $iduser)
    {
        $this->iduser->removeElement($iduser);
    }

    /**
     * Get iduser
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIduser()
    {
        return $this->iduser;
    }
}
