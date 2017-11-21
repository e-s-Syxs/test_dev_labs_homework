<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Form\ContactType;
use AppBundle\Handle\ContactHandle;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/contact/html", name="contact_html")
     */
    public function createContactHtmlAction(
        Request $request,
        ContactHandle $contactHandle
    )
    {
        $contact = new Contact();
        $form    = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            $contact = $form->getData();
            $errors  = $this->get('validator')->validate($contact);

            if (count($errors) > 0) {

                return $this->render(
                    'contact/contact-failed.html.twig',
                    ['errors' => $errors]
                );
            }

            $contactHandle->handle($contact);

            return $this->redirectToRoute('contact_created');
        }

        return $this->render(
            'contact/new-contact-form.html.twig',
            ['form' => $form->createView()]
        );
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/contact/created", name="contact_created")
     */
    public function contactCreateAction()
    {
        return $this->render(
            'contact/contact-created.html.twig'
        );
    }
}
