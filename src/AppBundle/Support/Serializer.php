<?php


namespace AppBundle\Support;


use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class Serializer
{
    private $encoder     = [];
    private $normalizers = [];

    public function __construct()
    {
        $this->encoder[] = new JsonEncoder();
        $this->normalizers[] = new ObjectNormalizer();
    }

    
}