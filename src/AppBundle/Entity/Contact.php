<?php

namespace AppBundle\Entity;

/**
 * Class Contact
 *
 * @package AppBundle\Entity
 */
class Contact
{
    private $id        = null;
    private $email     = null;
    private $text      = null;
    private $firstName = null;
    private $lastName  = null;

    /**
     * Contact constructor.
     *
     * @param string $email
     * @param string $text
     */
    public function __construct(string $email = 'aa', string $text = 'bb')
    {
        $this->email = $email;
        $this->text  = $text;
    }

    /**
     * @return string
     */
    public function getEmail() : string
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
     * @return string
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
     * @return string
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
     * @return string
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