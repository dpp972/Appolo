<?php

namespace Appolo\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Passercommande
 *
 * @ORM\Table(name="passercommande", indexes={@ORM\Index(name="FK_PasserCommande_idCommande", columns={"idCommande"}), @ORM\Index(name="FK_PasserCommande_idPanier", columns={"idPanier"}), @ORM\Index(name="IDX_3EF6F3DC5D419CCB", columns={"idUtilisateur"})})
 * @ORM\Entity
 */
class Passercommande
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCommande", type="datetime", nullable=true)
     */
    private $datecommande;

    /**
     * @var \Appolo\BackOfficeBundle\Entity\Utilisateur
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Appolo\BackOfficeBundle\Entity\Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUtilisateur", referencedColumnName="idUtilisateur")
     * })
     */
    private $idutilisateur;

    /**
     * @var \Appolo\BackOfficeBundle\Entity\Commande
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Appolo\BackOfficeBundle\Entity\Commande")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCommande", referencedColumnName="idCommande")
     * })
     */
    private $idcommande;

    /**
     * @var \Appolo\BackOfficeBundle\Entity\Panier
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Appolo\BackOfficeBundle\Entity\Panier")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idPanier", referencedColumnName="idPanier")
     * })
     */
    private $idpanier;



    /**
     * Set datecommande
     *
     * @param \DateTime $datecommande
     * @return Passercommande
     */
    public function setDatecommande($datecommande)
    {
        $this->datecommande = $datecommande;

        return $this;
    }

    /**
     * Get datecommande
     *
     * @return \DateTime 
     */
    public function getDatecommande()
    {
        return $this->datecommande;
    }

    /**
     * Set idutilisateur
     *
     * @param \Appolo\BackOfficeBundle\Entity\Utilisateur $idutilisateur
     * @return Passercommande
     */
    public function setIdutilisateur(\Appolo\BackOfficeBundle\Entity\Utilisateur $idutilisateur)
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
     * Set idcommande
     *
     * @param \Appolo\BackOfficeBundle\Entity\Commande $idcommande
     * @return Passercommande
     */
    public function setIdcommande(\Appolo\BackOfficeBundle\Entity\Commande $idcommande)
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
     * Set idpanier
     *
     * @param \Appolo\BackOfficeBundle\Entity\Panier $idpanier
     * @return Passercommande
     */
    public function setIdpanier(\Appolo\BackOfficeBundle\Entity\Panier $idpanier)
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
}
