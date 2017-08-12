<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\ContactType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer; 

class ContactController extends Controller
{
    /**
     * @Route("/contact", name="app_contact")
     * @Method({"GET", "POST"})
     */
    public function formAction(Request $request)
    {
		$contact = new Contact();
		$formBuilder = $this->get('form.factory')->create(ContactType::class, $contact);

		if ($request->isXmlHttpRequest()) {

			if ($request->isMethod('POST')) {
				$formBuilder->handleRequest($request);

				if ($formBuilder->isValid()) {
      
					$observation->setSeen(0);
					$em = $this->getDoctrine()->getManager();
					$em->persist($observation);
					$em->flush();
					return new JsonResponse(array('status'=>'success'));
				}
			}
			// return $this->redirectToRoute('');
		}

		return $this->render('AppBundle:Contact:contact.html.twig', array(
		'form' => $formBuilder->createView()
		));
    }

    }
}
