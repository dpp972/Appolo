<?php

namespace Appolo\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Typevoie
 *
 * @ORM\Table(name="typevoie", indexes={@ORM\Index(name="FK_TypeVoie_idAdresse", columns={"idAdresse"})})
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
     * @ORM\Column(name="idType", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtype;

    /**
     * @var \Appolo\BackOfficeBundle\Entity\Adresse
     *
     * @ORM\ManyToOne(targetEntity="Appolo\BackOfficeBundle\Entity\Adresse")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idAdresse", referencedColumnName="idAdresse")
     * })
     */
    private $idadresse;



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
     * Get idtype
     *
     * @return integer 
     */
    public function getIdtype()
    {
        return $this->idtype;
    }

    /**
     * Set idadresse
     *
     * @param \Appolo\BackOfficeBundle\Entity\Adresse $idadresse
     * @return Typevoie
     */
    public function setIdadresse(\Appolo\BackOfficeBundle\Entity\Adresse $idadresse = null)
    {
        $this->idadresse = $idadresse;

        return $this;
    }

    /**
     * Get idadresse
     *
     * @return \Appolo\BackOfficeBundle\Entity\Adresse 
     */
    public function getIdadresse()
    {
        return $this->idadresse;
    }
}
