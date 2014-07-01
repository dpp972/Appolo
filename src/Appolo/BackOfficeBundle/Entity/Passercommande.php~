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


}
