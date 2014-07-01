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



    /**
     * Set nomdestinataire
     *
     * @param string $nomdestinataire
     * @return Commande
     */
    public function setNomdestinataire($nomdestinataire)
    {
        $this->nomdestinataire = $nomdestinataire;

        return $this;
    }

    /**
     * Get nomdestinataire
     *
     * @return string 
     */
    public function getNomdestinataire()
    {
        return $this->nomdestinataire;
    }

    /**
     * Set prenomdestinataire
     *
     * @param string $prenomdestinataire
     * @return Commande
     */
    public function setPrenomdestinataire($prenomdestinataire)
    {
        $this->prenomdestinataire = $prenomdestinataire;

        return $this;
    }

    /**
     * Get prenomdestinataire
     *
     * @return string 
     */
    public function getPrenomdestinataire()
    {
        return $this->prenomdestinataire;
    }

    /**
     * Get idcommande
     *
     * @return integer 
     */
    public function getIdcommande()
    {
        return $this->idcommande;
    }
}
