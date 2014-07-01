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

}
