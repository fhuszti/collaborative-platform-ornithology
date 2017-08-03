<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CoreController extends Controller
{
    /**
     * @Route("/", name="core_home")
     * @Method("GET")
     */
    public function indexAction()
    {
        return $this->render('core/index.html.twig');
    }

    /**
     * @Route("/find", name="find")
     */
    public function findAction(Request $request)
	{
	    $defaultData = array('message' => 'find here');
	    $form = $this->createFormBuilder($defaultData)
	        ->add('name', TextType::class)
	        ->add('find', SubmitType::class)
	        ->getForm();

	    $form->handleRequest($request);

	    if ($form->isSubmitted() && $form->isValid()) {
	        // data is an array with "name", "email", and "message" keys
	        $data = $form->getData();
	    }

	    return $this->render('core/find.html.twig', array('form' => $form->createView()));
	}
}
