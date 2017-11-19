<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Handle\ContentHandle;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ContentController
 * @package AppBundle\Controller
 */
class ContentController extends Controller
{
    /**
     * @param Request $request
     *
     * @Route("/contact/json", name="contact_json")
     */
    public function createContentAction(Request $request, ContentHandle $contentHandle)
    {
        dump(json_decode($request->getContent(), true));die;

    }
}
