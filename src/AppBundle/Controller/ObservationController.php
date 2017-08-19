<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Form\ObservationType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use AppBundle\Entity\Observation;
use AppBundle\Service\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer; 
use Symfony\Component\Serializer\Encoder\XmlEncoder; 
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;


class ObservationController extends Controller
{
    /**
     * @Route("/observation", name="app_observation")
	 * @Method({"GET", "POST"})
     */
    public function formAction(Request $request, FileUploader $fileUploader)
    {
		$observation = new Observation();
		$formBuilder = $this->get('form.factory')->create(ObservationType::class, $observation);

			if ($request->isMethod('POST')) {
				$formBuilder->handleRequest($request);

				if ($formBuilder->isValid()) {
					if (!empty($observation->getImage())) {
						$observation->getImage()->upload();      
					}
					$observation->setSeen(0);
					$em = $this->getDoctrine()->getManager();
					$em->persist($observation);
					$em->flush();


					if (Null != $observation->getImage()) {
						$dir = '%kernel.project_dir%/web/uploads/images/';
						$image = $observation->getImage()->getImage();
						\Tinify\setKey("YN-tD6vaVHxYTx8XcfBLKFrlzXwwxgLi");
						$source = \Tinify\fromFile($dir.$image);
						$source->toFile($dir."/optimized/".$image);
						unlink('%kernel.project_dir%/web/uploads/images/'.$image ) ; 
					}
						return new JsonResponse(array('status'=>'success'));
				}
			}
			// return $this->redirectToRoute('');
		
		return $this->render('AppBundle:Observation:observation.html.twig', array(
		'form' => $formBuilder->createView()
		));
    }
}
