<?php

namespace Appolo\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Adresse
 *
 * @ORM\Table(name="adresse", indexes={@ORM\Index(name="FK_Adresse_idUtilisateur", columns={"idUtilisateur"}), @ORM\Index(name="FK_Adresse_idType", columns={"idType"})})
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
     * @var \Appolo\BackOfficeBundle\Entity\Typevoie
     *
     * @ORM\ManyToOne(targetEntity="Appolo\BackOfficeBundle\Entity\Typevoie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idType", referencedColumnName="idType")
     * })
     */
    private $idtype;

    /**
     * @var \Appolo\BackOfficeBundle\Entity\Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Appolo\BackOfficeBundle\Entity\Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUtilisateur", referencedColumnName="idUtilisateur")
     * })
     */
    private $idutilisateur;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Appolo\BackOfficeBundle\Entity\Utilisateur", inversedBy="idadresse")
     * @ORM\JoinTable(name="livrercommande",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idAdresse", referencedColumnName="idAdresse")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idCommande", referencedColumnName="idCommande")
     *   }
     * )
     */
    private $idcommande;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idcommande = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * Set idtype
     *
     * @param \Appolo\BackOfficeBundle\Entity\Typevoie $idtype
     * @return Adresse
     */
    public function setIdtype(\Appolo\BackOfficeBundle\Entity\Typevoie $idtype = null)
    {
        $this->idtype = $idtype;

        return $this;
    }

    /**
     * Get idtype
     *
     * @return \Appolo\BackOfficeBundle\Entity\Typevoie 
     */
    public function getIdtype()
    {
        return $this->idtype;
    }

    /**
     * Set idutilisateur
     *
     * @param \Appolo\BackOfficeBundle\Entity\Utilisateur $idutilisateur
     * @return Adresse
     */
    public function setIdutilisateur(\Appolo\BackOfficeBundle\Entity\Utilisateur $idutilisateur = null)
    {
        $this->idutilisateur = $idutilisateur;

        return $this;
    }

    /**
     * Get idutilisateur
     *
     * @return \Appolo\BackOfficeBundle\Entity\Utilisateur 
     */
    public function getIdutilisateur()
    {
        return $this->idutilisateur;
    }

    /**
     * Add idcommande
     *
     * @param \Appolo\BackOfficeBundle\Entity\Utilisateur $idcommande
     * @return Adresse
     */
    public function addIdcommande(\Appolo\BackOfficeBundle\Entity\Utilisateur $idcommande)
    {
        $this->idcommande[] = $idcommande;

        return $this;
    }

    /**
     * Remove idcommande
     *
     * @param \Appolo\BackOfficeBundle\Entity\Utilisateur $idcommande
     */
    public function removeIdcommande(\Appolo\BackOfficeBundle\Entity\Utilisateur $idcommande)
    {
        $this->idcommande->removeElement($idcommande);
    }

    /**
     * Get idcommande
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdcommande()
    {
        return $this->idcommande;
    }
}
