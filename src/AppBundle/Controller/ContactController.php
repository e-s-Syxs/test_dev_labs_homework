<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Handle\ContactHandle;
use AppBundle\Support\SerializerService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ContactController
 *
 * @package AppBundle\Controller
 */
class ContactController extends Controller
{
    /**
     * @param Request $request
     * @param ContactHandle $contactHandle
     * @param SerializerService $serializer
     * @return JsonResponse
     *
     * @Route("/contact/json", name="contact_json")
     */
    public function createContactJsonAction(
        Request $request,
        ContactHandle $contactHandle,
        SerializerService $serializer
    )
    {
        /** @var Contact $contact */
        $contact   = $serializer->deserializeJson($request->getContent(), Contact::class);
        $errors    = $this->get('validator')->validate($contact);

        if (count($errors) > 0) {

            $errorsString = (string)$errors;

            return new JsonResponse($errorsString);
        }

        $contactHandle->handle($contact);

        return new JsonResponse('contact-created', 201);
    }

    /**
     * @param Request $request
     * @param ContactHandle $contactHandle
     * @param SerializerService $serializer
     * @return JsonResponse
     *
     * @Route("/contact/html", name="contact_html")
     */
    public function createContactHtmlAction(
        Request $request,
        ContactHandle $contactHandle,
        SerializerService $serializer
    )
    {
        /** @var Contact $contact */
        $contact   = $serializer->deserializeJson($request->getContent(), Contact::class);

        $errors    = $this->get('validator')->validate($contact);

        if (count($errors) > 0) {

            $errorsString = (string)$errors;

            return new JsonResponse($errorsString);
        }

        $contactHandle->handle($contact);

        return new JsonResponse('contact-created', 201);
    }
}
