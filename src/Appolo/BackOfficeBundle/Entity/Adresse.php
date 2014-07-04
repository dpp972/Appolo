<?php

namespace Appolo\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Adresse
 *
 * @ORM\Table(name="adresse", indexes={@ORM\Index(name="FK_Adresse_idUser", columns={"idUser"}), @ORM\Index(name="FK_Adresse_idTypeV", columns={"idTypeV"})})
 * @ORM\Entity
 */
class Adresse
{
    /**
     * @var string
     *
     * @ORM\Column(name="nomVoie", type="text", nullable=true)
     */
    private $nomvoie;

    /**
     * @var string
     *
     * @ORM\Column(name="numeroVoie", type="text", nullable=true)
     */
    private $numerovoie;

    /**
     * @var integer
     *
     * @ORM\Column(name="idAdresse", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idadresse;

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
     * @var \Appolo\BackOfficeBundle\Entity\Typevoie
     *
     * @ORM\ManyToOne(targetEntity="Appolo\BackOfficeBundle\Entity\Typevoie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idTypeV", referencedColumnName="idTypeV")
     * })
     */
    private $idtypev;



    /**
     * Set nomvoie
     *
     * @param string $nomvoie
     * @return Adresse
     */
    public function setNomvoie($nomvoie)
    {
        $this->nomvoie = $nomvoie;
    
        return $this;
    }

    /**
     * Get nomvoie
     *
     * @return string 
     */
    public function getNomvoie()
    {
        return $this->nomvoie;
    }

    /**
     * Set numerovoie
     *
     * @param string $numerovoie
     * @return Adresse
     */
    public function setNumerovoie($numerovoie)
    {
        $this->numerovoie = $numerovoie;
    
        return $this;
    }

    /**
     * Get numerovoie
     *
     * @return string 
     */
    public function getNumerovoie()
    {
        return $this->numerovoie;
    }

    /**
     * Get idadresse
     *
     * @return integer 
     */
    public function getIdadresse()
    {
        return $this->idadresse;
    }

    /**
     * Set iduser
     *
     * @param \Appolo\BackOfficeBundle\Entity\User $iduser
     * @return Adresse
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
     * Set idtypev
     *
     * @param \Appolo\BackOfficeBundle\Entity\Typevoie $idtypev
     * @return Adresse
     */
    public function setIdtypev(\Appolo\BackOfficeBundle\Entity\Typevoie $idtypev = null)
    {
        $this->idtypev = $idtypev;
    
        return $this;
    }

    /**
     * Get idtypev
     *
     * @return \Appolo\BackOfficeBundle\Entity\Typevoie 
     */
    public function getIdtypev()
    {
        return $this->idtypev;
    }
}
