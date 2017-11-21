<?php

namespace AppBundle\Controller\Api;

use AppBundle\Entity\Contact;
use AppBundle\Handle\ContactHandle;
use AppBundle\Service\ResponseBuilder;
use AppBundle\Support\SerializerService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ApiContactController
 *
 * @package AppBundle\Controller\Api
 */
class ApiContactController extends Controller
{
    /**
     * @param Request $request
     * @param ContactHandle $contactHandle
     * @param SerializerService $serializer
     * @param ResponseBuilder $builder
     *
     * @return JsonResponse
     *
     * @Route("/contact/json", name="contact_json")
     */
    public function createContactJsonAction(
        Request $request,
        ContactHandle $contactHandle,
        SerializerService $serializer,
        ResponseBuilder $builder
    )
    {
        /** @var Contact $contact */
        $contact = $serializer->deserializeJson($request->getContent(), Contact::class);
        $errors  = $this->get('validator')->validate($contact);

        if (count($errors) > 0) {
            return new JsonResponse($builder->buildViolationResponse($errors), 400);
        }

        $contactHandle->handle($contact);

        return new JsonResponse('contact-created', 201);
    }
}