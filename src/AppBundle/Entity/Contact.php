<?php

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Contact
 *
 * @package AppBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="contact")
 */
class Contact
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id        = null;
    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank()
     * @Assert\Email(
     *     checkMX = true
     * )
     */
    private $email     = null;
    /**
     * @ORM\Column(type="string", length=400)
     *
     * @Assert\NotBlank()
     * @Assert\Length(
     *     max="400"
     * )
     */
    private $text      = null;
    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\Length(
     *     max="255"
     * )
     */
    private $firstName = null;
    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\Length(
     *     max="255"
     * )
     */
    private $lastName  = null;

    /**
     * @return null|string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return null|string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text)
    {
        $this->text = $text;
    }

    /**
     * @return null|string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return null|string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }
}