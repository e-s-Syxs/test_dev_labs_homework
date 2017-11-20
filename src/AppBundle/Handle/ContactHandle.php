<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 11/19/17
 * Time: 2:54 PM
 */

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

    public function __construct(ContactStorage $contactStorage)
    {
        $this->contactStorage = $contactStorage;
    }

    public function handle(Contact $contact)
    {
        $this->contactStorage->saveContact($contact);
    }
}