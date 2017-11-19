<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 11/19/17
 * Time: 2:27 PM
 */

namespace AppBundle\Storage;


use AppBundle\Entity\Contact;

class ContactStorage extends AbstractStorage
{

    /**
     * @param Contact $contact
     */
    public function saveContact(Contact $contact)
    {
        $this->doctrineEntityManager->persist($contact);
        $this->doctrineEntityManager->flush();
    }
}