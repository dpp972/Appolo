<?php

namespace Appolo\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Typevoie
 *
 * @ORM\Table(name="typevoie")
 * @ORM\Entity
 */
class Typevoie
{
    /**
     * @var integer
     *
     * @ORM\Column(name="libelleType", type="integer", nullable=true)
     */
    private $libelletype;

    /**
     * @var integer
     *
     * @ORM\Column(name="idTypeV", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtypev;



    /**
     * Set libelletype
     *
     * @param integer $libelletype
     * @return Typevoie
     */
    public function setLibelletype($libelletype)
    {
        $this->libelletype = $libelletype;
    
        return $this;
    }

    /**
     * Get libelletype
     *
     * @return integer 
     */
    public function getLibelletype()
    {
        return $this->libelletype;
    }

    /**
     * Get idtypev
     *
     * @return integer 
     */
    public function getIdtypev()
    {
        return $this->idtypev;
    }
}
