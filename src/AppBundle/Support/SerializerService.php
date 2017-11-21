<?php

namespace AppBundle\Support;

use AppBundle\Entity\Contact;
use Symfony\Component\Serializer\Encoder\JsonDecode;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Class Serializer
 *
 * @package AppBundle\Support
 */
class SerializerService
{
    private $encoders = [];
    private $normalizers = [];
    private $decode = [];
    /** @var Serializer $serializer */
    private $serializer = null;

    /**
     * Serializer constructor.
     */
    public function __construct()
    {
        $this->encoders[]    = new JsonEncoder();
        $this->normalizers[] = new ObjectNormalizer();
        $this->decode[]      = new JsonDecode();

        $this->serializer = new  Serializer($this->normalizers, $this->encoders);
    }

    /**
     * @param $input
     *
     * @return string
     */
    public function serializeJson($input)
    {
        return $this->serializer->serialize($input, 'json');
    }

    /**
     * @param string $json
     * @param string $type
     *
     * @return object
     */
    public function deserializeJson(string $json, string $type)
    {
        return $this->serializer->deserialize($json, $type, 'json');
    }
}