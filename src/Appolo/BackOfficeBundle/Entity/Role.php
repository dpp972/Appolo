<?php

namespace Appolo\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Role
 *
 * @ORM\Table(name="role")
 * @ORM\Entity
 */
class Role
{
    /**
     * @var string
     *
     * @ORM\Column(name="libelleRole", type="text", nullable=true)
     */
    private $libellerole;

    /**
     * @var integer
     *
     * @ORM\Column(name="idRole", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idrole;



    /**
     * Set libellerole
     *
     * @param string $libellerole
     * @return Role
     */
    public function setLibellerole($libellerole)
    {
        $this->libellerole = $libellerole;

        return $this;
    }

    /**
     * Get libellerole
     *
     * @return string 
     */
    public function getLibellerole()
    {
        return $this->libellerole;
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
