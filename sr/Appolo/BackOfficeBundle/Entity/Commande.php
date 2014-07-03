<?php

namespace Appolo\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity
 */
class Commande
{
    /**
     * @var string
     *
     * @ORM\Column(name="nomDestinataire", type="text", nullable=true)
     */
    private $nomdestinataire;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomDestinataire", type="text", nullable=true)
     */
    private $prenomdestinataire;

    /**
     * @var integer
     *
     * @ORM\Column(name="idCommande", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcommande;


}
