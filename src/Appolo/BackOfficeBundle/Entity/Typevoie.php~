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


}
