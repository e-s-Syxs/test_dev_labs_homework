<?php

namespace AppBundle\Storage;

use Doctrine\ORM\EntityManager;

/**
 * Class AbstractStorage
 *
 * @package AppBundle\Storage
 */
class AbstractStorage
{
    /** @var EntityManager */
    protected $doctrineEntityManager = null;

    /**
     * AbstractStorage constructor.
     *
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->doctrineEntityManager = $entityManager;
    }
}