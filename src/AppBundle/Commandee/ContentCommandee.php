<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 11/19/17
 * Time: 2:18 PM
 */

namespace AppBundle\Commandee;


use AppBundle\Entity\Contact;

class ContentCommandee
{
    /** @var  Contact */
    private $contact = null;

    /**
     * @return Contact
     */
    public function getContact() : Contact
    {
        return $this->contact;
    }

    /**
     * @param Contact $contact
     */
    public function setContact(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function saveContact()
    {

    }
}