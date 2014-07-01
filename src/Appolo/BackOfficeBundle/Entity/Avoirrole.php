<?php

namespace Appolo\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Avoirrole
 *
 * @ORM\Table(name="avoirrole")
 * @ORM\Entity
 */
class Avoirrole
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idUtilisateur", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idutilisateur;

    /**
     * @var integer
     *
     * @ORM\Column(name="idRole", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idrole;



    /**
     * Set idutilisateur
     *
     * @param integer $idutilisateur
     * @return Avoirrole
     */
    public function setIdutilisateur($idutilisateur)
    {
        $this->idutilisateur = $idutilisateur;

        return $this;
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
     * Set idrole
     *
     * @param integer $idrole
     * @return Avoirrole
     */
    public function setIdrole($idrole)
    {
        $this->idrole = $idrole;

        return $this;
    }

    /**
     * Get idrole
     *
     * @return integer 
     */
    public function getIdrole()
    {
        return $this->idrole;
    }
}
