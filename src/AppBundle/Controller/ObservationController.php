<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Form\ObservationType;
use AppBundle\Services\Optimizer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use AppBundle\Entity\Observation;
use AppBundle\Entity\Bird;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer; 
use Symfony\Component\Serializer\Encoder\XmlEncoder; 
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Doctrine\ORM\EntityManagerInterface;

class ObservationController extends Controller
{
    /**
     * @Route("/observation", name="app_observation")
	 * @Method({"GET", "POST"})
     */
    public function formAction(Request $request, Optimizer $optimizer)
    {
		$observation = new Observation();
		$formBuilder = $this->get('form.factory')->create(ObservationType::class, $observation);

		if ($request->isMethod('POST')) {


			$formBuilder->handleRequest($request);


			$image = $observation->getImage()->getFile();
			if (!$formBuilder->isValid()) {
				return new JsonResponse(array(
					'result' => 0,
					'data' => $this->getErrorMessages($formBuilder),
					'message' => 'Invalid form',  
				));

			} else {

				if (Null != $image) {
					$observation->getImage()->upload();
					$optimizer->optimize($observation);      
				}
				$observation->setSeen(0);
				$em = $this->getDoctrine()->getManager();
				$em->persist($observation);
				$em->flush();
				
				return new JsonResponse(array('status'=>'success'));
			}				  

		}
		
		return $this->render('observation/observation.html.twig', array(
		'form' => $formBuilder->createView()
		));
    }

   function getErrorMessages(\Symfony\Component\Form\Form $formBuilder) 
    {
        $errors = array();
        foreach ($formBuilder->getErrors() as $key => $error) {
            $errors[] = $error->getMessage();
        }

        foreach ($formBuilder->all() as $child) {
            if (!$child->isValid()) {
                $errors[$child->getName()] = $this->getErrorMessages($child);
            }
        }

        return $errors;
    }


    /**
     * @Route("/validate/{id}", requirements={"id" = "\d+"}, name="admin_obs_validate")
     * @Method("GET")
     */
    public function obsValidateAction(EntityManagerInterface $em, Observation $obs)
    {
        $obs->setStatus(true);

        $em->persist($obs);
        $em->flush();

        return $this->redirectToRoute('admin_home');
    }





    /**
     * @Route("/await/{id}", requirements={"id" = "\d+"}, name="admin_obs_await")
     * @Method("GET")
     */
    public function obsAwaitAction(EntityManagerInterface $em, Observation $obs)
    {
        $obs->setStatus(null);

        $em->persist($obs);
        $em->flush();

        return $this->redirectToRoute('admin_home');
    }





    /**
     * @Route("/refuse/{id}", requirements={"id" = "\d+"}, name="admin_obs_refuse")
     * @Method("GET")
     */
    public function obsRefuseAction(EntityManagerInterface $em, Observation $obs)
    {
        $obs->setStatus(false);

        $em->persist($obs);
        $em->flush();

        return $this->redirectToRoute('admin_home');
    }
}
