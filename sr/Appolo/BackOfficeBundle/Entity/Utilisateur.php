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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Appolo\BackOfficeBundle\Entity\Role", inversedBy="idutilisateur")
     * @ORM\JoinTable(name="avoirrole",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idUtilisateur", referencedColumnName="idUtilisateur")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idRole", referencedColumnName="idRole")
     *   }
     * )
     */
    private $idrole;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idadresse = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idrole = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
