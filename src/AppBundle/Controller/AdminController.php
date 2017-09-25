<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManagerInterface;

class AdminController extends Controller
{
    /**
     * @Route("/", name="admin_home")
     * @Method("GET")
     */
    public function indexAction(EntityManagerInterface $em)
    {
        $users = $em->getRepository('UserBundle:User')
                      ->findAll();

        $observations = $em->getRepository('AppBundle:Observation')
                     ->findAll();

        return $this->render('admin/index.html.twig', array(
            'users' => $users,
            'observations' => $observations
        ));
    }
}
