<?php

namespace AppBundle\Service;

use Symfony\Component\Validator\ConstraintViolation;
use InvalidArgumentException;
use Symfony\Component\Validator\ConstraintViolationList;

/**
 * Class ResponseBuilder
 *
 * @package AppBundle\Service
 */
class ResponseBuilder
{
    /**
     * @param ConstraintViolationList $errors
     *
     * @throws InvalidArgumentException
     *
     * @return array
     */
    public function buildViolationResponse(ConstraintViolationList $errors)
    {
        $response = [
            'type' => 'validation_error',
            'title' => 'There was a validation error',
        ];

        /** @var ConstraintViolation $error */
        foreach ($errors as $key => $error) {

            if (false === ($error InstanceOf ConstraintViolation)) {
            throw new InvalidArgumentException('$error must be instance of ConstraintViolation');
            }

            $response['errors'][$key]['field'] = $error->getPropertyPath();
            $response['errors'][$key]['message'] = $error->getMessage();
        }

        return $response;
    }

}