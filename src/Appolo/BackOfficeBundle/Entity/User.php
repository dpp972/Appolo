<?php

namespace Appolo\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\Role;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="user", indexes={@ORM\Index(name="FK_User_idAdresseLiv", columns={"idAdresseLiv"}), @ORM\Index(name="FK_User_idPanier", columns={"idPanier"})})
 * @ORM\Entity
 */
class User implements UserInterface, \Serializable
{
    /**
     * @var string
     *
     * @ORM\Column(name="nomUser", type="text", nullable=true)
     */
    private $nomuser;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomUser", type="text", nullable=true)
     */
    private $prenomuser;

    /**
     * @var string
     *
     * @ORM\Column(name="identifiantUser", type="text", nullable=true)
     */
    private $identifiantuser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateNaissUser", type="date", nullable=true)
     */
    private $datenaissuser;

    /**
     * @var string
     *
     * @ORM\Column(name="passwordUser", type="text", nullable=true)
     */
    private $passworduser;

    /**
     * @var string
     *
     * @ORM\Column(name="saltUser", type="text", nullable=true)
     */
    private $saltuser;

    /**
     * @var string
     *
     * @ORM\Column(name="emailUser", type="text", nullable=true)
     */
    private $emailuser;

    /**
     * @var integer
     *
     * @ORM\Column(name="idUser", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iduser;

    /**
     * @var \Appolo\BackOfficeBundle\Entity\Panier
     *
     * @ORM\ManyToOne(targetEntity="Appolo\BackOfficeBundle\Entity\Panier")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idPanier", referencedColumnName="idPanier")
     * })
     */
    private $idpanier;

    /**
     * @var \Appolo\BackOfficeBundle\Entity\Adresse
     *
     * @ORM\ManyToOne(targetEntity="Appolo\BackOfficeBundle\Entity\Adresse")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idAdresseLiv", referencedColumnName="idAdresse")
     * })
     */
    private $idadresseliv;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Appolo\BackOfficeBundle\Entity\Commande", inversedBy="iduser")
     * @ORM\JoinTable(name="passercommande",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idUser", referencedColumnName="idUser")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idCmd", referencedColumnName="idCmd")
     *   }
     * )
     */
    private $idcmd;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Appolo\BackOfficeBundle\Entity\Roleuser", inversedBy="iduser")
     * @ORM\JoinTable(name="avoirrole",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idUser", referencedColumnName="idUser")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idRoleUs", referencedColumnName="idRoleUs")
     *   }
     * )
     */
    private $idroleus;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idcmd = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idroleus = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set nomuser
     *
     * @param string $nomuser
     * @return User
     */
    public function setNomuser($nomuser)
    {
        $this->nomuser = $nomuser;

        return $this;
    }

    /**
     * Get nomuser
     *
     * @return string 
     */
    public function getNomuser()
    {
        return $this->nomuser;
    }

    /**
     * Set prenomuser
     *
     * @param string $prenomuser
     * @return User
     */
    public function setPrenomuser($prenomuser)
    {
        $this->prenomuser = $prenomuser;

        return $this;
    }

    /**
     * Get prenomuser
     *
     * @return string 
     */
    public function getPrenomuser()
    {
        return $this->prenomuser;
    }

    /**
     * Set identifiantuser
     *
     * @param string $identifiantuser
     * @return User
     */
    public function setIdentifiantuser($identifiantuser)
    {
        $this->identifiantuser = $identifiantuser;

        return $this;
    }

    /**
     * Get identifiantuser
     *
     * @return string 
     */
    public function getIdentifiantuser()
    {
        return $this->identifiantuser;
    }

    /**
     * Set datenaissuser
     *
     * @param \DateTime $datenaissuser
     * @return User
     */
    public function setDatenaissuser($datenaissuser)
    {
        $this->datenaissuser = $datenaissuser;

        return $this;
    }

    /**
     * Get datenaissuser
     *
     * @return \DateTime 
     */
    public function getDatenaissuser()
    {
        return $this->datenaissuser;
    }

    /**
     * Set passworduser
     *
     * @param string $passworduser
     * @return User
     */
    public function setPassworduser($passworduser)
    {
        $this->passworduser = $passworduser;

        return $this;
    }

    /**
     * Get passworduser
     *
     * @return string 
     */
    public function getPassworduser()
    {
        return $this->passworduser;
    }

    /**
     * Set saltuser
     *
     * @param string $saltuser
     * @return User
     */
    public function setSaltuser($saltuser)
    {
        $this->saltuser = $saltuser;

        return $this;
    }

    /**
     * Get saltuser
     *
     * @return string 
     */
    public function getSaltuser()
    {
        return $this->saltuser;
    }

    /**
     * Set emailuser
     *
     * @param string $emailuser
     * @return User
     */
    public function setEmailuser($emailuser)
    {
        $this->emailuser = $emailuser;

        return $this;
    }

    /**
     * Get emailuser
     *
     * @return string 
     */
    public function getEmailuser()
    {
        return $this->emailuser;
    }

    /**
     * Get iduser
     *
     * @return integer 
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * Set idpanier
     *
     * @param \Appolo\BackOfficeBundle\Entity\Panier $idpanier
     * @return User
     */
    public function setIdpanier(\Appolo\BackOfficeBundle\Entity\Panier $idpanier = null)
    {
        $this->idpanier = $idpanier;

        return $this;
    }

    /**
     * Get idpanier
     *
     * @return \Appolo\BackOfficeBundle\Entity\Panier 
     */
    public function getIdpanier()
    {
        return $this->idpanier;
    }

    /**
     * Set idadresseliv
     *
     * @param \Appolo\BackOfficeBundle\Entity\Adresse $idadresseliv
     * @return User
     */
    public function setIdadresseliv(\Appolo\BackOfficeBundle\Entity\Adresse $idadresseliv = null)
    {
        $this->idadresseliv = $idadresseliv;

        return $this;
    }

    /**
     * Get idadresseliv
     *
     * @return \Appolo\BackOfficeBundle\Entity\Adresse 
     */
    public function getIdadresseliv()
    {
        return $this->idadresseliv;
    }

    /**
     * Add idcmd
     *
     * @param \Appolo\BackOfficeBundle\Entity\Commande $idcmd
     * @return User
     */
    public function addIdcmd(\Appolo\BackOfficeBundle\Entity\Commande $idcmd)
    {
        $this->idcmd[] = $idcmd;

        return $this;
    }

    /**
     * Remove idcmd
     *
     * @param \Appolo\BackOfficeBundle\Entity\Commande $idcmd
     */
    public function removeIdcmd(\Appolo\BackOfficeBundle\Entity\Commande $idcmd)
    {
        $this->idcmd->removeElement($idcmd);
    }

    /**
     * Get idcmd
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdcmd()
    {
        return $this->idcmd;
    }

    /**
     * Add idroleus
     *
     * @param \Appolo\BackOfficeBundle\Entity\Roleuser $idroleus
     * @return User
     */
    public function addIdroleus(\Appolo\BackOfficeBundle\Entity\Roleuser $idroleus)
    {
        $this->idroleus[] = $idroleus;

        return $this;
    }

    /**
     * Remove idroleus
     *
     * @param \Appolo\BackOfficeBundle\Entity\Roleuser $idroleus
     */
    public function removeIdroleus(\Appolo\BackOfficeBundle\Entity\Roleuser $idroleus)
    {
        $this->idroleus->removeElement($idroleus);
    }

    /**
     * Get idroleus
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdroleus()
    {
        return $this->idroleus;
    }


    /*----------------------------------------------------------------------------------------------------------------*/


    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * String representation of object
     * @link http://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     */
    public function serialize()
    {
        return serialize(array(
            $this->iduser,
        ));
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Constructs the object
     * @link http://php.net/manual/en/serializable.unserialize.php
     * @param string $serialized <p>
     * The string representation of the object.
     * </p>
     * @return void
     */
    public function unserialize($serialized)
    {
        list( $this->iduser,) = unserialize($serialized);
    }

    /**
     * Returns the roles granted to the user.
     *
     * <code>
     * public function getRoles()
     * {
     *     return array('ROLE_USER');
     * }
     * </code>
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return Role[] The user roles
     */
    public function getRoles()
    {
        $roleObjects = $this->idroleus->toArray();

        $roles = array();
        foreach( $roleObjects as $obj){
            $roles[] = $obj->getLibelleroleus();
        }

        if( !count( $roles)){
            $roles[] = '';
        }

        return $roles;
    }

    /**
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string The password
     */
    public function getPassword()
    {
        return $this->getPassworduser();
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        return $this->getSaltuser();
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return $this->getIdentifiantuser();
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}
