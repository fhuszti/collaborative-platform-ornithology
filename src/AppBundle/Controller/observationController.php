<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Form\FormBuilder;

class ObservationController extends Controller
{
    /**
     * @Route("/observation", name="app_observation")
     * @Method("GET")
     */
    public function formAction()
    {
		$observation = new Observation();
		$formBuilder = $this->get('form.factory')->create(CommandeType::class, $observation);

		if ($request->isMethod('POST')) {
			$formBuilder->handleRequest($request);

			if ($formBuilder->isValid()) {
				$em = $this->getDoctrine()->getManager();

				$em->persist($commande);
				$em->flush();     
			}

			return $this->redirectToRoute('');
		}

		return $this->render('AppBundle:Observation:observation.html.twig', array(
		'form' => $formBuilder->createView()
		));
    }
}
