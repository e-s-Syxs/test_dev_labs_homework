<?php

namespace AppBundle\Storage;

use AppBundle\Entity\Contact;

/**
 * Class ContactStorage
 *
 * @package AppBundle\Storage
 */
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