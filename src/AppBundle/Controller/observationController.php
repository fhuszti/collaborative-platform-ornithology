<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Form\ObservationType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use AppBundle\Entity\Observation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Form\FormBuilder;

class ObservationController extends Controller
{
    /**
     * @Route("/observation", name="app_observation")
	 * @Method({"GET", "POST"})
     */
    public function formAction(Request $request)
    {
		$observation = new Observation();
		$formBuilder = $this->get('form.factory')->create(ObservationType::class, $observation);

		if ($request->isMethod('POST')) {
			$formBuilder->handleRequest($request);

			if ($formBuilder->isValid()) {
			$file = $observation->getImage();      
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move(
                $this->getParameter('images_directory'),
                $fileName
            );

            $observation->setImage($fileName);


				$em = $this->getDoctrine()->getManager();

				$em->persist($observation);
				$em->flush();     
			}

			// return $this->redirectToRoute('');
		}

		return $this->render('AppBundle:Observation:observation.html.twig', array(
		'form' => $formBuilder->createView()
		));
    }
}
