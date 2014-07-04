<?php

namespace Appolo\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Roleuser
 *
 * @ORM\Table(name="roleuser")
 * @ORM\Entity
 */
class Roleuser
{
    /**
     * @var string
     *
     * @ORM\Column(name="libelleRoleUs", type="text", nullable=false)
     */
    private $libelleroleus;

    /**
     * @var integer
     *
     * @ORM\Column(name="idRoleUs", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idroleus;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Appolo\BackOfficeBundle\Entity\User", mappedBy="idroleus")
     */
    private $iduser;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->iduser = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set libelleroleus
     *
     * @param string $libelleroleus
     * @return Roleuser
     */
    public function setLibelleroleus($libelleroleus)
    {
        $this->libelleroleus = $libelleroleus;
    
        return $this;
    }

    /**
     * Get libelleroleus
     *
     * @return string 
     */
    public function getLibelleroleus()
    {
        return $this->libelleroleus;
    }

    /**
     * Get idroleus
     *
     * @return integer 
     */
    public function getIdroleus()
    {
        return $this->idroleus;
    }

    /**
     * Add iduser
     *
     * @param \Appolo\BackOfficeBundle\Entity\User $iduser
     * @return Roleuser
     */
    public function addIduser(\Appolo\BackOfficeBundle\Entity\User $iduser)
    {
        $this->iduser[] = $iduser;
    
        return $this;
    }

    /**
     * Remove iduser
     *
     * @param \Appolo\BackOfficeBundle\Entity\User $iduser
     */
    public function removeIduser(\Appolo\BackOfficeBundle\Entity\User $iduser)
    {
        $this->iduser->removeElement($iduser);
    }

    /**
     * Get iduser
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIduser()
    {
        return $this->iduser;
    }
}
