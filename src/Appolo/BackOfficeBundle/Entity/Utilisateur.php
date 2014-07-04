<?php

namespace Appolo\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur", indexes={@ORM\Index(name="FK_Utilisateur_idCommande", columns={"idCommande"}), @ORM\Index(name="FK_Utilisateur_idAdresseLiv", columns={"idAdresseLiv"})})
 * @ORM\Entity
 */
class Utilisateur
{
    /**
     * @var string
     *
     * @ORM\Column(name="nomUtilisateur", type="text", nullable=true)
     */
    private $nomutilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomUtilisateur", type="text", nullable=true)
     */
    private $prenomutilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="pseudoUtilisateur", type="text", nullable=true)
     */
    private $pseudoutilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="dateNaissUtilisateur", type="text", nullable=true)
     */
    private $datenaissutilisateur;

    /**
     * @var integer
     *
     * @ORM\Column(name="idUtilisateur", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idutilisateur;

    /**
     * @var \Appolo\BackOfficeBundle\Entity\Adresse
     *
     * @ORM\ManyToOne(targetEntity="Appolo\BackOfficeBundle\Entity\Adresse")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idAdresseLiv", referencedColumnName="idAdresse")
     * })
     */
    private $idadresseliv;

    /**
     * @var \Appolo\BackOfficeBundle\Entity\Commande
     *
     * @ORM\ManyToOne(targetEntity="Appolo\BackOfficeBundle\Entity\Commande")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCommande", referencedColumnName="idCommande")
     * })
     */
    private $idcommande;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Appolo\BackOfficeBundle\Entity\Adresse", mappedBy="idcommande")
     */
    private $idadresse;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idadresse = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set nomutilisateur
     *
     * @param string $nomutilisateur
     * @return Utilisateur
     */
    public function setNomutilisateur($nomutilisateur)
    {
        $this->nomutilisateur = $nomutilisateur;

        return $this;
    }

    /**
     * Get nomutilisateur
     *
     * @return string 
     */
    public function getNomutilisateur()
    {
        return $this->nomutilisateur;
    }

    /**
     * Set prenomutilisateur
     *
     * @param string $prenomutilisateur
     * @return Utilisateur
     */
    public function setPrenomutilisateur($prenomutilisateur)
    {
        $this->prenomutilisateur = $prenomutilisateur;

        return $this;
    }

    /**
     * Get prenomutilisateur
     *
     * @return string 
     */
    public function getPrenomutilisateur()
    {
        return $this->prenomutilisateur;
    }

    /**
     * Set pseudoutilisateur
     *
     * @param string $pseudoutilisateur
     * @return Utilisateur
     */
    public function setPseudoutilisateur($pseudoutilisateur)
    {
        $this->pseudoutilisateur = $pseudoutilisateur;

        return $this;
    }

    /**
     * Get pseudoutilisateur
     *
     * @return string 
     */
    public function getPseudoutilisateur()
    {
        return $this->pseudoutilisateur;
    }

    /**
     * Set datenaissutilisateur
     *
     * @param string $datenaissutilisateur
     * @return Utilisateur
     */
    public function setDatenaissutilisateur($datenaissutilisateur)
    {
        $this->datenaissutilisateur = $datenaissutilisateur;

        return $this;
    }

    /**
     * Get datenaissutilisateur
     *
     * @return string 
     */
    public function getDatenaissutilisateur()
    {
        return $this->datenaissutilisateur;
    }

    /**
     * Get idutilisateur
     *
     * @return integer 
     */
    public function getIdutilisateur()
    {
        return $this->idutilisateur;
    }

    /**
     * Set idadresseliv
     *
     * @param \Appolo\BackOfficeBundle\Entity\Adresse $idadresseliv
     * @return Utilisateur
     */
    public function setIdadresseliv(\Appolo\BackOfficeBundle\Entity\Adresse $idadresseliv = null)
    {
        $this->idadresseliv = $idadresseliv;

        return $this;
    }

    /**
     * Get idadresseliv
     *
     * @return \Appolo\BackOfficeBundle\Entity\Adresse 
     */
    public function getIdadresseliv()
    {
        return $this->idadresseliv;
    }

    /**
     * Set idcommande
     *
     * @param \Appolo\BackOfficeBundle\Entity\Commande $idcommande
     * @return Utilisateur
     */
    public function setIdcommande(\Appolo\BackOfficeBundle\Entity\Commande $idcommande = null)
    {
        $this->idcommande = $idcommande;

        return $this;
    }

    /**
     * Get idcommande
     *
     * @return \Appolo\BackOfficeBundle\Entity\Commande 
     */
    public function getIdcommande()
    {
        return $this->idcommande;
    }

    /**
     * Add idadresse
     *
     * @param \Appolo\BackOfficeBundle\Entity\Adresse $idadresse
     * @return Utilisateur
     */
    public function addIdadresse(\Appolo\BackOfficeBundle\Entity\Adresse $idadresse)
    {
        $this->idadresse[] = $idadresse;

        return $this;
    }

    /**
     * Remove idadresse
     *
     * @param \Appolo\BackOfficeBundle\Entity\Adresse $idadresse
     */
    public function removeIdadresse(\Appolo\BackOfficeBundle\Entity\Adresse $idadresse)
    {
        $this->idadresse->removeElement($idadresse);
    }

    /**
     * Get idadresse
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdadresse()
    {
        return $this->idadresse;
    }
}
