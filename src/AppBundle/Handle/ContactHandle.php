<?php

namespace AppBundle\Handle;

use AppBundle\Entity\Contact;
use AppBundle\Storage\ContactStorage;

/**
 * Class ContactHandle
 *
 * @package AppBundle\Handle
 */
class ContactHandle
{
    private $contactStorage = null;

    /**
     * ContactHandle constructor.
     *
     * @param ContactStorage $contactStorage
     */
    public function __construct(ContactStorage $contactStorage)
    {
        $this->contactStorage = $contactStorage;
    }

    /**
     * @param Contact $contact
     */
    public function handle(Contact $contact)
    {
        $this->contactStorage->saveContact($contact);
    }
}